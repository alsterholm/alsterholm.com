<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\CommonMark\Node\Block\FencedCode;
use League\CommonMark\MarkdownConverter;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Tempest\Highlight\CommonMark\CodeBlockRenderer;
use Tempest\Highlight\CommonMark\InlineCodeBlockRenderer;

class Post
{
    public $contents;
    public $slug;
    public $body;
    public $frontmatter;

    public function __construct($path)
    {
        $this->slug = rtrim(str($path)->explode('/')->reverse()->take(2)->reverse()->join('/'), '.md');
        $this->frontmatter = YamlFrontMatter::parse(file_get_contents($path));
        $this->body = $this->getMarkdownParser()->convert($this->frontmatter->body());
    }

    public static function all()
    {
        $files = glob(base_path('data/blog/**/*'));

        rsort($files);

        return collect($files)->mapInto(self::class);
    }

    public static function find($slug)
    {
        $path = base_path('data/blog/'.$slug.'.md');

        if (! file_exists($path)) {
            throw new ModelNotFoundException("Could not find post with slug '$slug'.");
        }

        return new self($path);
    }

    public static function last()
    {
        return self::all()->first();
    }

    public function preview()
    {
        return str($this->body)->stripTags()->limit(250);
    }

    public function ogImageUrl()
    {
        [$year, $slug] = explode('/', $this->slug);

        return route('blog.ogimage', [
            'year' => $year,
            'slug' => $slug,
        ]);
    }

    public function estimatedReadingTime()
    {
        $wordsPerMinute = 200;

        return max(1, round(str($this->body)->stripTags()->wordCount() / $wordsPerMinute));
    }

    public function __get($key)
    {
        if ($this->frontmatter->{$key}) {
            $value = $this->frontmatter->{$key};

            if (str($key)->endsWith('_at') && $value !== null) {
                return Carbon::parse($value);
            }

            return $value;
        }

        if (property_exists($this, $key)) {
            return $this->{$key};
        }

        return null;
    }

    protected function getMarkdownParser()
    {
        $environment = new Environment();

        $environment
            ->addExtension(new CommonMarkCoreExtension())
            ->addRenderer(FencedCode::class, new CodeBlockRenderer())
            ->addRenderer(Code::class, new InlineCodeBlockRenderer());

        return new MarkdownConverter($environment);
    }
}

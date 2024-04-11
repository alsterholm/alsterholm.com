<?php

namespace App\Models;

use Carbon\Carbon;
use Exception;
use Symfony\Component\Yaml\Yaml;

class Book
{
    protected $data;

    public function __construct($path)
    {
        $this->data = Yaml::parse(file_get_contents($path));

        if ($this->data === null) {
            dd($path);
        }
    }

    public static function all()
    {
        return collect(glob(base_path('data/books/*')))->mapInto(self::class);
    }

    public static function current()
    {
        return self::all()
            ->first(fn (Book $book) => $book->isCurrentlyReading());
    }

    public static function finished()
    {
        return self::all()
            ->filter(fn (Book $book) => $book->isFinished());
    }

    public function isCurrentlyReading()
    {
        return $this->started_at !== null && $this->finished_at === null;
    }

    public function isFinished()
    {
        return $this->finished_at !== null;
    }

    public function expectedFinishDate(): Carbon
    {
        return $this->started_at->addDays($this->word_count / $this->wordsPerDay())->startOfDay();
    }

    public function scopeFinished($query): void
    {
        $query->whereNotNull('finished_at');
    }

    public function wordsPerPage(): float
    {
        return $this->word_count / $this->page_count;
    }

    public function wordsPerDay(): float
    {
        return round(($this->wordsPerPage() * $this->current_page) / $this->started_at->diffInDays($this->finished_at ?? now()));
    }

    public function __get($key)
    {
        if (array_key_exists($key, $this->data)) {
            $value = $this->data[$key];

            if (str($key)->endsWith('_at') && $value !== null) {
                return Carbon::parse($value);
            }

            return $value;
        }

        throw new Exception("Unknown property '$key'.");
    }
}

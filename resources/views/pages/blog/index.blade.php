<?php
    use App\Models\Post;
    use Illuminate\View\View;
    use Spatie\YamlFrontMatter\YamlFrontMatter;

    use function Laravel\Folio\render;

    render(function (View $view) {
        $view->with('posts', Post::all());
    });
?>

<x-layout.base>
    <x-heading>Blog</x-heading>

    <div class="space-y-8">
        <div class="leading-loose text-slate-700 dark:text-slate-200 space-y-4">
            <p>
                Every now and then, I decide to jot down some thoughts I've had that may or may not be interesting
                for others to read. You can find my musings down below.
            </p>
        </div>

        <div class="space-y-6">
            @foreach ($posts as $post)
                <x-blog.preview :$post />
            @endforeach
        </div>
    </div>
</x-layout.base>

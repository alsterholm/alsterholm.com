<?php
    use App\Models\Post;
    use Illuminate\View\View;

    use function Laravel\Folio\render;

    render(function (View $view) use ($slug) {
        $slug = implode('/', $slug);
        $post = Post::find($slug);

        $view->with('post', $post);
    });
?>

<x-layout.base>
    <article class="space-y-6">
        <div>
            <x-heading>{{ $post->title }}</x-heading>

            <div class="space-y-4">
                <div class="text-slate-500 text-base">
                    Posted on <x-date>{{ $post->published_at }}</x-date>
                </div>

                @if ($post->tags && count($post->tags) !== 0)
                    <div class="flex flex-wrap gap-2">
                        @foreach ($post->tags as $tag)
                            <x-tag>{{ $tag }}</x-tag>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <x-prose>
            {!! $post->body !!}
        </x-prose>
    </article>
</x-layout.base>

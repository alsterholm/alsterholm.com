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

@push('head')
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{{ $post->preview() }}">
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{ $post->ogImageUrl() }}">
    <meta property="og:url" content="{{ url('blog/'.$post->slug) }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@arcadianalpaca">
    <meta name="twitter:title" content="{{ $post->title }}">
@endpush

<x-layout.base title="{{ $post->title }} - Andreas Alsterholm">
    <article class="space-y-6">
        <div>
            <x-heading>{{ $post->title }}</x-heading>

            <div class="space-y-4">
                <div class="text-slate-500 text-base">
                    Posted on <x-date>{{ $post->published_at }}</x-date>
                    &centerdot;
                    {{ $post->estimatedReadingTime() }} minute read
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

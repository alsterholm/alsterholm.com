@props(['post'])

<article class="space-y-2">
    <div class="flex justify-between">
        <a href="{{ url('blog/'.$post->slug) }}" class="text-sky-800 dark:text-fuchsia-400 hover:text-sky-800/60 dark:hover:text-fuchsia-400/60">
            <h2 class="font-[Alata] font-bold text-base">
                {{ $post->title }}
            </h2>
        </a>

        <x-date class="text-slate-500 text-base">
            {{ $post->published_at }}
        </x-date>
    </div>

    @if ($post->tags && count($post->tags) !== 0)
        <div class="flex gap-2">
            @foreach ($post->tags as $tag)
                <x-tag>{{ $tag }}</x-tag>
            @endforeach
        </div>
    @endif

    <div>
        <span class="text-slate-500 dark:text-slate-400">
            {!! $post->preview() !!}
        </span>

        <x-link href="{{ url('blog/'.$post->slug )}}">
            Read more
        </x-link>
    </div>
</article>

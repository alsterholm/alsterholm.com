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

    <div class="space-y-4">
        <div class="text-slate-500 dark:text-slate-400">
            {!! $post->preview() !!}
        </div>

        <x-link href="{{ url('blog/'.$post->slug )}}">
            <div class="flex items-center space-x-1">
                <div>
                    Read more
                </div>

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 mt-0.5">
                    <path fill-rule="evenodd" d="M12.97 3.97a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 1 1-1.06-1.06l6.22-6.22H3a.75.75 0 0 1 0-1.5h16.19l-6.22-6.22a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                </svg>
            </div>
        </x-link>
    </div>
</article>

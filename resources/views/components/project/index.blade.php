@props([
    'name',
    'startYear',
    'endYear' => 'current',
    'tags' => [],
])

<div class="space-y-2">
    <h3 class="text-2xl font-semibold text-sky-800 dark:text-fuchsia-400 tracking-tighter">
        {{ $name }}

        <div class="text-base font-normal text-slate-400 dark:text-slate-600">
            {{ $startYear }}

            @if ($startYear !== $endYear)
                – {{ $endYear }}
            @endif
        </div>
    </h3>

    @if (! empty($tags))
        <div class="flex gap-1.5 flex-wrap">
            @foreach ($tags as $tag)
                <x-tag>{{ $tag }}</x-tag>
            @endforeach
        </div>
    @endif

    <div class="space-y-3 text-slate-800 dark:text-slate-200 leading-loose">
        {{ $slot }}
    </div>
</div>

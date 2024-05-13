@props(['book'])

<div class="space-y-4 text-left">
    <x-heading.h2>
        Currently reading
    </x-heading.h2>

    <div class="relative">
        <div class="absolute -left-[1%] h-full w-[102%] rotate-[-2deg] bg-rose-400 dark:bg-violet-800 z-10"></div>
        <div class="relative bg-white dark:bg-slate-950 p-4 space-y-2 z-20 border-8 border-rose-600 dark:border-violet-500">
            <div class="flex space-x-4">
                <div class="shrink-0 w-20">
                    <img src="{{ $book->cover_url }}">
                </div>

                <div class="flex-1">
                    <div class="border-b border-rose-800/20 dark:border-violet-900/40 mb-3 pb-3">
                        <h3 class="text-2xl font-bold text-rose-900/80 dark:text-violet-400/70">
                            {{ $book->title }}

                                <span class="font-normal text-rose-900/60 dark:text-violet-400/60">
                                    &centerdot;
                                    {{ $book->author }}
                                </span>
                        </h3>

                        @if ($book->series)
                            <div class="text-rose-900/60 dark:text-violet-400/60 font-semibold">
                                {{ $book->series }} #{{ $book->order_in_series }}
                            </div>
                        @endif
                    </div>

                    <div class="text-rose-800/70 dark:text-violet-300/70 text-base">
                        <div>
                            <strong>Started:</strong>
                            <x-date>{{ $book->started_at }}</x-date>

                            @if ($book->current_page)
                                &centerdot;
                                <strong>Expected to finish:</strong>
                                <x-date>{{ $book->expectedFinishDate() }}</x-date>
                                ({{ $book->started_at->diffInDays($book->expectedFinishDate()) }} days)
                            @endif
                        </div>

                        <div>
                            <strong>Word count:</strong>
                            <x-number>{{ $book->word_count }}</x-number>
                            @if ($book->current_page)
                                &centerdot;
                                <strong>Pace:</strong>
                                <x-number>{{ $book->wordsPerDay() }}</x-number> words per day
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

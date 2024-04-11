<h1 {{ $attributes->class('text-sky-800 dark:text-fuchsia-200/90 font-bold text-2xl font-[Alata] border-b-4 border-rose-600 dark:border-violet-800 pb-2 mb-4' )}}>
    <div class="flex justify-between">
        <div>
            {{ $slot }}
        </div>

        <div class="hidden md:block">
            <x-dark-mode-toggle />
        </div>
    </div>
</h1>

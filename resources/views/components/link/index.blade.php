<span class="relative inline-block group">
    <span class="absolute z-10 -left-[4%] -top-[3%] w-[108%] h-[106%] bg-rose-400/70 dark:bg-violet-800 rotate-[-4deg] group-hover:rotate-[3deg] group-hover:opacity-100 transition"></span>
    <a {{ $attributes->class('relative z-20 font-semibold inline-block bg-rose-600 dark:bg-violet-500 px-1 text-white') }}>
        {{ $slot }}
    </a>
</span>

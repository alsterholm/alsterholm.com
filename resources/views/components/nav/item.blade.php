@props([
    'href',
])

@php($active = str(url()->current())->startsWith($href))

<li
    {{ $attributes->class([
        'hover:text-slate-500' => ! $active,
    ])
}}>
    <span
        @class([
            'inline-block relative group font-semibold',
            'text-slate-500' => ! $active,
        ])
    >
        <div
            @class([
                'absolute z-10 ',
                '-top-[5%] -left-[5%] h-[110%] w-[110%] bg-rose-400/70 dark:bg-violet-800 rotate-[-4deg]' => $active,
                'inset-0 bg-rose-600 dark:bg-violet-500 scale-x-0 group-hover:scale-x-100 origin-left transition' => ! $active,
            ])
        ></div>

        <a
            href="{{ $href }}"
            @class([
                'relative z-20 inline-block px-2 py-1.5',
                'bg-rose-600 dark:bg-violet-500 text-white' => $active,
                'hover:text-white transition' => ! $active,
            ])
        >
            {{ $slot }}
        </a>
    </span>
</li>

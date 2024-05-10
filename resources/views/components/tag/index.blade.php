<div
    @php($backgrounds = ['bg-slate-700', 'bg-slate-600'])

    @class([
        'py-0.5 px-1.5 text-xs font-semibold text-white hover:-translate-y-0.5 transition',
        'hover:rotate-[6deg] origin-top' => strlen($slot) % 2 === 0,
        'hover:rotate-[-8deg] origin-bottom' => strlen($slot) % 2 !== 0,
        $backgrounds[mb_strlen((string) $slot) % count($backgrounds)],
    ])
>
    {{ $slot }}
</div>

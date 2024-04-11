@props([
    'role',
    'company',
    'tags' => [],
    'start',
    'end' => 'current',
])

<tr>
    <td class="w-24 text-sm align-top pt-0.5 text-slate-600 dark:text-slate-400 md:whitespace-nowrap tracking-tight hidden sm:block">
        {{ $start }}

        @if ($end && $end !== $start)
            – {{ $end }}
        @endif
    </td>

    <td>
        <h3 class="text-sky-800 dark:text-fuchsia-300 flex justify-between gap-x-2 sm:mb-1 tracking-tight">
            <div class="font-bold text-left">{{ $role }}</div>
            <div class="font-semibold text-right">{{ $company }}</div>
        </h3>

        <div class="sm:hidden text-base mb-2 text-slate-600 tracking-tight">
            {{ $start }}

            @if ($end && $end !== $start)
                – {{ $end }}
            @endif
        </div>

        <div>
            {{ $slot }}
        </div>
    </td>
</tr>

@props([
    'heading'
])

<div>
    <h2 class="text-xl font-semibold text-slate-600 dark:text-slate-300 tracking-tighter">
        {{ $heading }}
    </h2>

    <table class="table border-separate text-base text-slate-800 dark:text-slate-300 border-spacing-y-6 w-full">
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>

@use(Illuminate\Support\Facades\Date)

@props([
    'format' => 'Y-m-d',
])

<span {{ $attributes }}>{{ Date::parse(trim($slot))->format($format) }}</span>

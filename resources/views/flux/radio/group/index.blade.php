@props([
    'variant' => null,
])

@php
$variant = $variant === null ? 'default' : $variant;
@endphp

<x-dynamic-component :component="'flux::radio.group.variants.' . $variant" :$attributes>
    {{ $slot }}
</x-dynamic-component>

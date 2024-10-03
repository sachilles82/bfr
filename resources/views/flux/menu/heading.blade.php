@php
$classes = Flux::classes([
    'block px-4 py-2 w-full',
    'text-left text-xs',
    'text-gray-400 dark:text-gray-500',
]);
@endphp

<div {{ $attributes->class($classes) }} data-flux-menu-heading>
    <div class="w-7 hidden [[data-flux-menu]:has([data-flux-menu-item-icon])_&]:block"></div>

    <div>{{ $slot }}</div>
</div>


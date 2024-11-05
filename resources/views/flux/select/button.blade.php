@aware([ 'placeholder' ])

@props([
    'placeholder' => null,
    'invalid' => false,
    'size' => null,
])

@php
$classes = Flux::classes()
    ->add('group/select-button cursor-default py-1.5 block w-full')
    ->add('flex items-center')
    ->add('rounded-md shadow-sm border')
    ->add('bg-white dark:bg-white/5')
    // Make the placeholder match the text color of standard input placeholders...
    ->add('disabled:shadow-none')
    ->add(match ($size) {
        default => 'h-9 text-sm rounded-md px-3 block w-full',
        'sm' => 'h-8 text-sm rounded-md pl-3 pr-2 block w-full',
        'xs' => 'h-6 text-xs rounded-md pl-3 pr-2 block w-full',
    })
    ->add($invalid
        ? 'border border-red-500'
        : 'border border-gray-300 dark:border-white/10 shadow-sm'
    )
    ;
@endphp

<button type="button" {{ $attributes->class($classes) }} data-flux-select-button>
    <ui-selected wire:ignore class="truncate flex gap-2 [&>*:has(+_*)]:after:content-[',_'] text-left flex-1 text-gray-900 [[disabled]_&]:text-gray-500 dark:text-white dark:[[disabled]_&]:text-gray-400">
        <span class="text-gray-400">
            {{ $placeholder }}
        </span>
    </ui-selected>

    <flux:icon.chevron-down variant="mini" class="ml-2 -mr-1 text-gray-400 [[data-flux-select-button]:hover_&]:text-gray-800 [[disabled]_&]:!text-gray-200 dark:text-white/60 dark:[[data-flux-select-button]:hover_&]:text-white dark:[[disabled]_&]:!text-white/40" />
</button>

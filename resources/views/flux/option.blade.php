@aware([ 'variant' ])

@props([
    'variant' => null,
])

@php
$custom = $variant && $variant !== 'default';

$classes = Flux::classes()
    ->add('group/option data-[hidden]:hidden group flex items-center px-2 py-1.5 w-full focus:outline-none')
    ->add('rounded-md')
    ->add('text-left text-sm font-medium')
    ->add('text-gray-800 data-[active]:bg-gray-100 [&[disabled]]:text-gray-400 dark:text-gray-400 data-[active]:dark:bg-gray-700/50 data-[active]:dark:text-gray-300 dark:[&[disabled]]:text-gray-400')
    ->add('scroll-my-[.3125rem]') // This is here so that when a user scrolls to the top or bottom of the list, the padding is included...
    ;
@endphp

<?php if ($custom): ?>
    <ui-option {{ $attributes->class($classes) }} data-flux-option>
        <div class="w-6 [ui-selected_&]:hidden">
            <flux:icon variant="mini" icon="check" class="hidden group-data-[selected]/option:block" />
        </div>

        {{ $slot }}
    </ui-option>
<?php else: ?>
    <option {{ $attributes }}>{{ $slot }}</option>
<?php endif; ?>



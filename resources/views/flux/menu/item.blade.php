@props([
    'variant' => 'default',
    'suffix' => null,
    'value' => null,
    'icon' => null,
    'kbd' => null,
])

@php
if ($kbd) $suffix = $kbd;

$classes = Flux::classes()
    ->add('flex items-center gap-x-3 py-2 px-3 cursor-pointer w-full focus:outline-none')
    ->add('rounded-md')
    ->add('text-left text-sm')
    ->add('[&[disabled]]:opacity-50')
    ->add(match ($variant) {
        'danger' => [
            'text-gray-800 data-[active]:text-red-700 data-[active]:bg-red-50 dark:text-gray-400 dark:data-[active]:bg-red-400/10 dark:data-[active]:text-red-400',
            '[&_[data-flux-menu-item-icon]]:text-gray-400 dark:[&_[data-flux-menu-item-icon]]:text-white/60 [&[data-active]_[data-flux-menu-item-icon]]:text-current dark:[&[data-active]_[data-flux-menu-item-icon]]:text-red-400',
        ],
        'default' => [
            'text-gray-800 data-[active]:bg-gray-100 dark:data-[active]:bg-gray-700/50 dark:data-[active]:text-gray-300 dark:text-gray-400',
            '[&_[data-flux-menu-item-icon]]:text-gray-400 dark:[&_[data-flux-menu-item-icon]]:text-white/60 [&[data-active]_[data-flux-menu-item-icon]]:text-current',
        ]
    })
    ;

$suffixClasses = Flux::classes()
    ->add('ml-auto text-xs text-gray-400')
    ;
@endphp

<flux:button-or-link :attributes="$attributes->class($classes)" data-flux-menu-item :data-flux-menu-item-has-icon="!! $icon">
    <?php if ($icon): ?>
        <flux:icon :$icon variant="mini" class="mr-2" data-flux-menu-item-icon />
    <?php else: ?>
        <div class="w-7 hidden [[data-flux-menu]:has(>[data-flux-menu-item-has-icon])_&]:block"></div>
    <?php endif; ?>

    {{ $slot }}

    <?php if ($suffix): ?>
        <?php if (is_string($suffix)): ?>
            <div class="{{ $suffixClasses }}">
                {{ $suffix }}
            </div>
        <?php else: ?>
            {{ $suffix }}
        <?php endif; ?>
    <?php endif; ?>

    {{ $submenu ?? '' }}
</flux:button-or-link>

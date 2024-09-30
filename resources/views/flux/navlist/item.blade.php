@aware([ 'variant' ])

@props([
    'iconVariant' => 'outline',
    'iconTrailing' => null,
    'variant' => null,
    'iconDot' => null,
    'badge' => null,
    'icon' => null,
])

@php
    // Button should be a square if it has no text contents...
    $square ??= empty((string) $slot);

    // Size-up icons in square/icon-only buttons...
    $iconClasses = Flux::classes($square ? '!size-8 ' : '!size-6')
        ->add('text-gray-400 dark:text-gray-500 group-hover:text-indigo-600 group-hover:dark:text-white data-[current]:text-indigo-600');

    $classes = Flux::classes()
        ->add('h-12 lg:h-10 relative flex items-center gap-3 rounded-md mb-0.5')
        ->add('group')
        ->add($square ? '!px-2.5' : '')
        ->add('py-1 text-left w-full px-3 my-py border-gray-200')
        ->add('text-gray-700 dark:text-gray-400 hover:text-indigo-600 hover:dark:text-white')
        ->add('hover:bg-gray-100 hover:dark:bg-gray-800')
        ->add(match ($variant) {
            'outline' => '
            data-[current]:text-indigo-600
            data-[current]:bg-white
            data-[current]:border
            data-[current]:border-gray-200

            data-[current]:dark:border-white/10
            data-[current]:dark:text-white
            data-[current]:dark:bg-gray-800

            data-[current]:shadow-sm',
            default => '
            data-[current]:text-indigo-600
            data-[current]:bg-gray-100

            data-[current]:dark:text-gray-100
            data-[current]:dark:bg-gray-800',
        });
@endphp

<flux:button-or-link :attributes="$attributes->class($classes)" data-flux-navlist-item>
    @if ($icon)
        <div class="relative">
            <flux:icon :$icon :variant="$iconVariant" :class="$iconClasses"/><!-- Change 2: Add `group-hover` classes to icon -->
            @if ($iconDot)
                <div class="absolute top-[-2px] right-[-2px]">
                    <div class="size-[6px] rounded-full bg-gray-500 dark:bg-gray-400"></div>
                </div>
            @endif
        </div>
    @endif

    @if ((string)$slot)
        <div class="flex-1 text-sm font-semibold leading-none whitespace-nowrap [[data-nav-footer]_&]:hidden [[data-nav-sidebar]_[data-nav-footer]_&]:block" data-content>
            {{ $slot }}
        </div>
    @endif

    @if ($iconTrailing)
        <flux:icon :icon="$iconTrailing" :variant="$iconVariant" class="!size-4"/>
    @endif

    @if ($badge)
        <span class="text-xs rounded bg-gray-800/5 dark:bg-white/10 px-1 py-0.5">{{ $badge }}</span>
    @endif
</flux:button-or-link>

@aware([ 'placeholder' ])

@props([
    'placeholder' => null,
    'invalid' => false,
    'size' => null,
])

<flux:input :$invalid :$size :$placeholder :$attributes>
    <x-slot name="iconTrailing">
        <flux:button size="sm" square variant="subtle" tabindex="-1" class="-mr-1 [[disabled]_&]:pointer-events-none">
            <flux:icon.chevron-up-down variant="mini" class="text-gray-400 [[data-flux-input]:hover_&]:text-gray-900 [[disabled]_&]:!text-gray-200 dark:text-white/60 dark:[[data-flux-input]:hover_&]:text-white dark:[[disabled]_&]:!text-white/40" />
        </flux:button>
    </x-slot>
</flux:input>

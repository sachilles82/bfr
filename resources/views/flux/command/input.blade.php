@props([
    'closable' => null,
    'icon' => 'magnifying-glass',
])

@php
$classes = Flux::classes()
    ->add('h-12 w-full flex items-center px-3 py-2')
    ->add('font-medium text-sm text-gray-800 dark:text-white')
    ->add('pl-11') // Make room for magnifying glass icon...
    ->add($closable ? 'pr-11' : '') // Make room for close button...
    ->add('outline-none')
    ->add('border-b border-gray-300 dark:border-white/10')
    ->add('bg-white dark:bg-gray-800')
    ;
@endphp

<div class="relative" data-flux-command-input>
    <div class="absolute top-0 bottom-0 flex items-center justify-center text-xs text-gray-400 pl-3.5 left-0 [&:has(+input:focus)]:text-gray-800 [&:has(+input:focus)]:dark:text-gray-400">
        <flux:icon :$icon variant="mini" />
    </div>

    <input type="text" {{ $attributes->class($classes) }} />

    <?php if ($closable): ?>
        <div class="absolute top-0 bottom-0 flex items-center justify-center text-xs text-gray-400 pr-3.5 right-0 [&:has(+input:focus)]:text-gray-800 [&:has(+input:focus)]:dark:text-gray-400">
            <ui-close>
                <flux:button icon="x-mark" variant="subtle" size="xs" />
            </ui-close>
        </div>
    <?php endif; ?>
</div>


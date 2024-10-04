@props([
    'orientation' => null,
    'vertical' => false,
    'variant' => null,
    'faint' => false,
    'text' => null,
])

@php
$orientation ??= $vertical ? 'vertical' : 'horizontal';

$classes = Flux::classes('border-0')
    ->add(match ($variant) {
        'subtle' => 'bg-gray-200 dark:bg-white/10',
        default => 'bg-gray-200 dark:bg-white/10',
    })
    ->add(match ($orientation) {
        'horizontal' => 'h-px w-full',
        'vertical' => 'self-stretch self-center w-px',
    })
    ;
@endphp

<?php if ($text): ?>
    <div data-orientation="{{ $orientation }}" class="flex items-center w-full" role="none" data-flux-separator>
        <div {{ $attributes->class([$classes, 'grow']) }}></div>

        <span class="shrink mx-6 font-medium text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ $text }}</span>

        <div {{ $attributes->class([$classes, 'grow']) }}></div>
    </div>
<?php else: ?>
    <div data-orientation="{{ $orientation }}" role="none" {{ $attributes->class($classes, 'shrink-0') }} data-flux-separator></div>
<?php endif; ?>

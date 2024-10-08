@props([
    'iconTrailing' => null,
    'variant' => 'outline',
    'iconVariant' => null,
    'iconLeading' => null,
    'type' => 'button',
    'loading' => null,
    'size' => 'base',
    'square' => null,
    'inset' => null,
    'icon' => null,
    'kbd' => null,
])

@php
$iconLeading = $icon ??= $iconLeading;

// Button should be a square if it has no text contents...
$square ??= empty((string) $slot);

// Size-up icons in square/icon-only buttons... (xs buttons just get micro size/style...)
$iconVariant ??= ($size === 'xs')
    ? ($square ? 'micro' : 'micro')
    : ($square ? 'mini' : 'micro');

$loading ??= $loading ?? ($type === 'submit' || $attributes->whereStartsWith('wire:click')->isNotEmpty());

if ($loading && $type !== 'submit') {
    $attributes = $attributes->merge(['wire:loading.attr' => 'data-flux-loading']);
}

$classes = Flux::classes()
    ->add('relative inline-flex items-center font-medium justify-center gap-2 whitespace-nowrap')
    ->add('disabled:opacity-75 dark:disabled:opacity-75 disabled:cursor-default disabled:pointer-events-none')
    ->add(match ($size) { // Size...
        'base' => 'h-10 text-sm rounded-lg' . ' ' . ($square ? 'w-10' : 'px-4'),
        'sm' => 'h-8 text-sm rounded-md' . ' ' . ($square ? 'w-8' : 'px-3'),
        'xs' => 'h-6 text-xs rounded-md' . ' ' . ($square ? 'w-6' : 'px-2'),
    })
    ->add($inset ? match ($size) { // Inset...
        'base' => $square
            ? Flux::applyInset($inset, top: '-mt-2.5', right: '-mr-2.5', bottom: '-mb-2.5', left: '-ml-2.5')
            : Flux::applyInset($inset, top: '-mt-2.5', right: '-mr-4', bottom: '-mb-3', left: '-ml-4'),
        'sm' => $square
            ? Flux::applyInset($inset, top: '-mt-1.5', right: '-mr-1.5', bottom: '-mb-1.5', left: '-ml-1.5')
            : Flux::applyInset($inset, top: '-mt-1.5', right: '-mr-3', bottom: '-mb-1.5', left: '-ml-3'),
        'xs' => $square
            ? Flux::applyInset($inset, top: '-mt-1', right: '-mr-1', bottom: '-mb-1', left: '-ml-1')
            : Flux::applyInset($inset, top: '-mt-1', right: '-mr-2', bottom: '-mb-1', left: '-ml-2'),
    } : '')
    ->add(match ($variant) { // Background color...
        'primary' => 'bg-gray-800 hover:bg-gray-900 dark:bg-white dark:hover:bg-gray-100',
        'filled' => 'bg-gray-800/5 hover:bg-gray-800/10 dark:bg-white/10 dark:hover:bg-white/20',
        'outline' => 'bg-white hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600/75',
        'danger' => 'bg-red-500 hover:bg-red-600 dark:bg-red-600 dark:hover:bg-red-500',
        'ghost' => 'bg-transparent hover:bg-gray-100 dark:hover:bg-gray-800',
        'subtle' => 'bg-transparent hover:bg-gray-800/5 dark:hover:bg-white/15',
    })
    ->add(match ($variant) { // Text color...
        'primary' => 'text-white dark:text-gray-800',
        'filled' => 'text-gray-800 dark:text-gray-400',
        'outline' => 'text-gray-800 dark:text-gray-400',
        'danger' => 'text-white',
        'ghost' => 'text-gray-500 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-300',
        'subtle' => 'text-gray-500 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-300',
    })
    ->add(match ($variant) { // Border color...
        'outline' => 'border border-gray-200 hover:border-gray-200 border-b-gray-300/80 dark:border-gray-600 dark:hover:border-gray-600',
         default => '',
    })
    ->add(match ($variant) { // Shadows...
        'primary' => 'shadow-[inset_0px_1px_theme(colors.gray.900),inset_0px_2px_theme(colors.white/.15)] dark:shadow-none',
        'danger' => 'shadow-[inset_0px_1px_theme(colors.red.500),inset_0px_2px_theme(colors.white/.15)] dark:shadow-none',
        'outline' => match ($size) {
            'base' => 'shadow-sm',
            'sm' => 'shadow-sm',
            'xs' => 'shadow-none',
        },
        default => '',
    })
    ->add(match ($variant) { // Grouped border treatments...
        'outline' => 'group-[]/button:-ml-[1px] group-[]/button:first:ml-0',
        'ghost' => '',
        'subtle' => '',
        default => 'group-[]/button:border-r group-[]/button:last:border-r-0 group-[]/button:border-black group-[]/button:dark:border-gray-900/25',
    })
    ->add($loading ? [ // Loading states...
        '*:transition-opacity',
        $type === 'submit' ? '[&[disabled]>:not([data-flux-loading-indicator])]:opacity-0' : '[&[data-flux-loading]>:not([data-flux-loading-indicator])]:opacity-0',
        $type === 'submit' ? '[&[disabled]>[data-flux-loading-indicator]]:opacity-100' : '[&[data-flux-loading]>[data-flux-loading-indicator]]:opacity-100',
        $type === 'submit' ? '[&[disabled]]:pointer-events-none' : '[&[data-flux-loading]]:pointer-events-none',
    ] : [])
    ;
@endphp

<flux:with-tooltip :$attributes>
    <flux:button-or-link :$type :attributes="$attributes->class($classes)" data-flux-button>
        <?php if ($loading): ?>
            <div class="absolute inset-0 flex items-center justify-center opacity-0" data-flux-loading-indicator>
                <flux:icon icon="loading" :variant="$iconVariant" />
            </div>
        <?php endif; ?>

        <?php if (is_string($iconLeading)): ?>
            <flux:icon :icon="$iconLeading" :variant="$iconVariant" />
        <?php elseif ($iconLeading): ?>
            {{ $iconLeading }}
        <?php endif; ?>

        <?php if ($loading && ! $slot->isEmpty()): ?>
            {{-- If we have a loading indicator, we need to wrap it in a span so it can be a target of *:opacity-0... --}}
            <span>{{ $slot }}</span>
        <?php else: ?>
            {{ $slot }}
        <?php endif; ?>

        <?php if ($kbd): ?>
            <div class="text-xs text-gray-500 dark:text-gray-400">{{ $kbd }}</div>
        <?php endif; ?>

        <?php if (is_string($iconTrailing)): ?>
            <flux:icon :icon="$iconTrailing" :variant="$iconVariant" :class="$square ? '' : '-ml-1'" />
        <?php elseif ($iconTrailing): ?>
            {{ $iconTrailing }}
        <?php endif; ?>
    </flux:button-or-link>
</flux:with-tooltip>

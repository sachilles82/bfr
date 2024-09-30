@props([
    'direction' => null,
    'sorted' => false,
])

@php
$classes = Flux::classes()
    ->add('group/sortable flex items-center gap-1 -my-1 -ml-2 -mr-2 px-2 py-1 rounded-lg')
    ->add('hover:bg-zinc-800/5 dark:hover:bg-white/10')
    ->add('group-[]/right-align:flex-row-reverse group-[]/right-align:-mr-2 group-[]/right-align:-ml-8')
    ;
@endphp

<button type="button" {{ $attributes->class($classes) }} data-flux-table-sortable>
    {{ $slot }}

    @if ($sorted)
        @if ($direction === 'asc')
            <flux:icon.chevron-up variant="micro" class="text-zinc-400 dark:text-white/50" />
        @elseif ($direction === 'desc')
            <flux:icon.chevron-down variant="micro" class="text-zinc-400 dark:text-white/50" />
        @else
            <flux:icon.chevron-down variant="micro" class="text-zinc-400 dark:text-white/50" />
        @endif
    @else
        <div class="opacity-0 group-hover/sortable:opacity-100">
            <flux:icon.chevron-down variant="micro" class="text-zinc-400 dark:text-white/50" />
        </div>
    @endif
</button>

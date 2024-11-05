@php
$classes = Flux::classes()
    ->add('p-[.3125rem]')
    ->add('overflow-y-auto')
    ->add('bg-white dark:bg-gray-800')
    ;
@endphp

<ui-options {{ $attributes->class($classes) }} data-flux-command-items>
    {{ $slot }}

    <flux:command.empty>No results found</flux:command.empty>
</ui-options>

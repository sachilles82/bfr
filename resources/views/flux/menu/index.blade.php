@php
$classes = Flux::classes()
    ->add('[:where(&)]:min-w-48 p-[.3125rem]')
    ->add('rounded-md shadow-lg')
    ->add('p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700')
    ->add('bg-white dark:bg-gray-800')
    ;
@endphp

<ui-menu
    {{ $attributes->class($classes) }}
    popover
    data-flux-menu
>
    {{ $slot }}
</ui-menu>

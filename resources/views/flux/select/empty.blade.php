@php
$classes = Flux::classes()
    ->add('data-[hidden]:hidden block items-center px-2 py-1.5 w-full')
    ->add('rounded-md')
    ->add('text-left text-sm font-medium')
    ->add('text-gray-500 data-[active]:bg-gray-100 dark:text-gray-300 data-[active]:dark:bg-gray-600')
    ;
@endphp

<ui-empty {{ $attributes->class($classes) }}>
    {{ $slot }}
</ui-empty>

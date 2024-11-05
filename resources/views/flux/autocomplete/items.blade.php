@php
$classes = Flux::classes()
    ->add('[:where(&)]:max-h-[20rem]') // "[:where(&)]:" means it can be overriden without "!"...
    ->add('p-[.3125rem] overflow-y-auto rounded-md shadow-sm')
    ->add('border border-gray-300 dark:border-gray-700')
    ->add('bg-white dark:bg-gray-800')
    ->add('[&:not(:has(ui-empty[data-hidden]))]:hidden') // Hide this entire panel if there are no results...
    ;
@endphp

<ui-options popover {{ $attributes->class($classes) }} data-flux-autocomplete-items>
    {{ $slot }}

    <ui-empty class="contents"></ui-empty>
</ui-options>


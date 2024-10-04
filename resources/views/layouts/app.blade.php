<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{ darkMode: false }"
      x-cloak
      x-bind:class="{'dark' : darkMode === true}"
      x-init="if (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        localStorage.setItem('darkMode', JSON.stringify(true));
    }
    darkMode = JSON.parse(localStorage.getItem('darkMode'));
    $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
      class="dark h-full bg-gray-50"
>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    @fluxStyles
</head>
<body class="font-sans antialiased h-full overflow-hidden dark:bg-gray-900">
<div x-data="{menu : false}" class="flex h-full">
    <!-- Narrow sidebar -->
    <x-navigation.sidebar/>

    <!-- Content area -->
    <div class="flex flex-1 flex-col overflow-hidden">
        <!-- Top bar -->
        <x-navigation.header/>

        <!-- Main content -->
        <div class="flex flex-1 items-stretch overflow-hidden">
            <main class="flex-1 overflow-y-auto">
                <!-- Primary column -->
                <section aria-labelledby="primary-heading" class="flex h-full min-w-0 flex-1 flex-col lg:order-last">
                    <h1 id="primary-heading" class="sr-only">Photos</h1>
                    <!-- Your content -->
                </section>
            </main>

            <!-- Secondary column (hidden on smaller screens) -->
            <aside class="hidden w-96 overflow-y-auto border-l dark:border-white/5 border-gray-200 bg-white dark:bg-gray-900 lg:block">
                <!-- Your content -->
            </aside>
        </div>
    </div>
</div>
@stack('modals')

@livewireScripts
@fluxScripts
</body>
</html>

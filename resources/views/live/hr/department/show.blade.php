<x-app-layout>
    <div class="flex flex-col xl:flex-row overflow-hidden">
        <div
            class="2xl:min-h-screen xl:min-h-screen sticky top-0 z-98 bg-gray-100 dark:bg-gray-900 dark:border-gray-700/50 border-gray-200 px-4 py-6 sm:px-6 lg:pl-6 xl:w-64 xl:shrink-0 xl:border-r xl:pl-6">

            <x-navigation.settings.nav/>

        </div>
        <div
            class="w-full flex flex-col max-w-8xl px-0 py-10 sm:px-6 lg:px-8 text-gray-700 dark:text-gray-400 overflow-y-auto">

            <livewire:hr.department.department-update
                :department="$department"
            />

        </div>
    </div>
</x-app-layout>

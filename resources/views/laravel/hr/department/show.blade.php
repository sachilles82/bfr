<x-app-layout>
    <div class="flex flex-col xl:flex-row overflow-hidden">

        <div class="2xl:min-h-screen xl:min-h-screen sticky top-0 z-98 bg-gray-100 dark:bg-gray-900 dark:border-gray-700/50 border-gray-200 px-4 xl:py-6 sm:py-2 sm:px-2 lg:pl-6 xl:w-64 xl:shrink-0 xl:border-r xl:pl-6">
            <x-navigation.settings.nav/>
        </div>

        <div class="flex-1 overflow-y-auto">
            <div class="space-y-10 divide-y dark:divide-white/5 divide-gray-900/10">

                <livewire:hr.department.department-update
                    :department="$department"
                />

            </div>

        </div>
    </div>
</x-app-layout>



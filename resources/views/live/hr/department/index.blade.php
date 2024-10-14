<x-app-layout>
    <div class="flex flex-col xl:flex-row overflow-hidden">
        <div class="2xl:min-h-screen xl:min-h-screen sticky top-0 z-98 bg-gray-100 dark:bg-gray-900 dark:border-gray-700/50 border-gray-200 px-4 py-6 sm:px-6 lg:pl-6 xl:w-64 xl:shrink-0 xl:border-r xl:pl-6">
            <x-navigation.settings.nav/>
        </div>

        <div class="flex-1 overflow-y-auto">
            <!-- Primary column -->
            <div class="flex h-full min-w-0 flex-1 flex-col lg:order-last overflow-x-hidden">
                <div class="flex-1 xl:flex">
                    <div class="px-4 py-6 sm:px-6 lg:pl-8 xl:flex-1 xl:pl-6">
                        <div class="relative">
                            <div
                                class="flex flex-col items-center justify-between py-0 md:py-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                                <div class="w-full md:w-1/2">
                                    <div class="flex items-center">
                                        <div>
                                            <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">
                                                {{ __('Departments') }}
                                            </h1>
                                            <p class="mt-0 text-sm text-gray-700 dark:text-gray-300">
                                            {{ __('A list of all departments in this table') }}
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center">

                                    <livewire:hr.department.create-department/>


                                    <div class="flex items-center w-full space-x-3 md:w-auto">
                                        {{--                                    <livewire:admin.settings.auth.role.create-modal lazy />--}}
                                        {{--                                                                                  <x-app.order.filter-products :$filters/>--}}
                                        {{--                                                                                                                      <x-datepicker.date-range-picker/>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--                                                  <x-app.order.filter-status />--}}
                        {{--                                                  <livewire:order.index.chart lazy/>--}}
                        <livewire:hr.department.department-table/>
                        {{--                        <livewire:base-app.department.department-table :department="$department" />--}}

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>


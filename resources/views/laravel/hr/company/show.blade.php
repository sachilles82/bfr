<x-app-layout>
    <div class="flex flex-col xl:flex-row overflow-hidden">
        <div
            class="2xl:min-h-screen xl:min-h-screen sticky top-0 z-98 bg-gray-100 dark:bg-gray-900 dark:border-gray-700/50 border-gray-200 px-4 xl:py-6 sm:py-2 sm:px-2 lg:pl-6 xl:w-64 xl:shrink-0 xl:border-r xl:pl-6">
            <x-navigation.settings.nav/>
        </div>

        <div class="flex-1 overflow-y-auto">

{{--            <header>--}}
{{--                <!-- Secondary navigation -->--}}
{{--                <nav class="flex overflow-x-auto border-b dark:border-white/5 border-gray-200 py-4">--}}
{{--                    <ul role="list"--}}
{{--                        class="flex min-w-full flex-none gap-x-6 px-4 text-sm font-semibold leading-6 dark:text-gray-400 text-gray-500 sm:px-6 lg:px-8">--}}

{{--                        --}}{{--                            <li>--}}
{{--                        --}}{{--                                <a wire:navigate.hover--}}
{{--                        --}}{{--                                   href="{{ route('permission.auth', $user) }}"--}}
{{--                        --}}{{--                                   class="{{ request()->routeIs('permission.auth') ? 'dark:text-indigo-400 text-indigo-600' : 'hover:text-indigo-600 dark:hover:text-indigo-400' }}">--}}
{{--                        --}}{{--                                    {{ __('Authorization')}}</a>--}}
{{--                        --}}{{--                            </li>--}}
{{--                        --}}{{--                            <li>--}}
{{--                        --}}{{--                                <a wire:navigate.hover--}}
{{--                        --}}{{--                                   href="{{ route('permission.report', $user) }}"--}}
{{--                        --}}{{--                                   class="{{ request()->routeIs('permission.report') ? 'dark:text-indigo-400 text-indigo-600' : 'hover:text-indigo-600 dark:hover:text-indigo-400' }}">--}}
{{--                        --}}{{--                                    {{ __('Report')}}</a>--}}
{{--                        --}}{{--                            </li>--}}

{{--                        <li>--}}
{{--                            <a href="#"--}}
{{--                               class="hover:text-indigo-600 dark:hover:text-indigo-400">{{ __('Overview')}}</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#"--}}
{{--                               class="hover:text-indigo-600 dark:hover:text-indigo-400">{{ __('Activity')}}</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#"--}}
{{--                               class="hover:text-indigo-600 dark:hover:text-indigo-400">{{ __('Settings')}}</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </nav>--}}

{{--            </header>--}}


{{--            <livewire:hr.company.company-update--}}
{{--                :company="$company"--}}
{{--            />--}}

            <div class="space-y-10 border-t border-gray-900/10 dark:border-white/5">
                <div class="grid max-w-8xl grid-cols-1 gap-x-8 gap-y-10 px-4 py-16 sm:px-6 md:grid-cols-3 lg:px-8">

                    <div class="px-4 sm:px-0">
                        <h2 class="text-base/7 font-semibold dark:text-white text-gray-900">{{ __('Comapany Information')}}</h2>
                        <p class="mt-1 text-sm/6 text-gray-600 dark:text-gray-400">{{ __('Here are stored the main company informations')}}</p>
                    </div>

                    <livewire:address.address-form :addressable="$company" />


                </div>
            </div>
        </div>
    </div>

</x-app-layout>


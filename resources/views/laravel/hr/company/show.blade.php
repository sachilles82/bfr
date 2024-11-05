<x-app-layout>
    <div class="flex flex-col xl:flex-row overflow-hidden">
        <div
            class="2xl:min-h-screen xl:min-h-screen sticky top-0 z-98 bg-gray-100 dark:bg-gray-900 dark:border-gray-700/50 border-gray-200 px-4 py-6 sm:px-6 lg:pl-6 xl:w-64 xl:shrink-0 xl:border-r xl:pl-6">
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


            <livewire:hr.company.company-update
                :company="$company"
            />


{{--            <div class="space-y-10 border-t border-gray-900/10 dark:border-white/5">--}}
{{--                <div class="grid max-w-8xl grid-cols-1 gap-x-8 gap-y-10 px-4 py-16 sm:px-6 md:grid-cols-3 lg:px-8">--}}


{{--                    <div class="px-4 sm:px-0">--}}
{{--                        <h2 class="text-base/7 font-semibold dark:text-white text-gray-900">{{ __('Comapany Information')}}</h2>--}}
{{--                        <p class="mt-1 text-sm/6 text-gray-600 dark:text-gray-400">{{ __('Here are stored the main company informations')}}</p>--}}
{{--                    </div>--}}

{{--                    <form--}}
{{--                        class="bg-white dark:bg-gray-900 shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">--}}
{{--                        <div class="px-4 py-6 sm:p-8 border-b dark:border-white/10 border-white">--}}
{{--                            <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">--}}

{{--                                <div class="sm:col-span-4">--}}
{{--                                    <x-input.group label="{{ __('Name')}}"--}}
{{--                                                   for="name"--}}
{{--                                                   :error="$errors->first('name')"--}}
{{--                                                   help-text="{{ __('') }}">--}}
{{--                                        <x-input.text autofocus wire:model="name"--}}
{{--                                                      name="name" id="name"--}}
{{--                                                      placeholder="{{ __('Name')}}"/>--}}
{{--                                    </x-input.group>--}}
{{--                                </div>--}}
{{--                                <div class="sm:col-span-4">--}}
{{--                                    <flux:field>--}}
{{--                                        <flux:label>Website</flux:label>--}}

{{--                                        <flux:input.group>--}}
{{--                                            <flux:input placeholder="meinefirma" sm/>--}}

{{--                                            <flux:input.group.suffix>.reportix.ch</flux:input.group.suffix>--}}
{{--                                        </flux:input.group>--}}

{{--                                        <flux:error name="website"/>--}}
{{--                                    </flux:field>--}}

{{--                                    <flux:input wire:model="username" label="Username"--}}
{{--                                                description="This will be publicly displayed."/>--}}
{{--                                    --}}{{--                                                <label for="website"--}}
{{--                                    --}}{{--                                                       class="block text-sm/6 font-medium dark:text-white text-gray-900">Website</label>--}}
{{--                                    --}}{{--                                                <div class="mt-2">--}}
{{--                                    --}}{{--                                                    <div--}}
{{--                                    --}}{{--                                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">--}}
{{--                                    --}}{{--                                                <span--}}
{{--                                    --}}{{--                                                    class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">http://</span>--}}
{{--                                    --}}{{--                                                        <input type="text" name="website" id="website"--}}
{{--                                    --}}{{--                                                               class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm/6"--}}
{{--                                    --}}{{--                                                               placeholder="www.example.com">--}}
{{--                                    --}}{{--                                                    </div>--}}
{{--                                    --}}{{--                                                </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-span-full">--}}
{{--                                    <label for="about"--}}
{{--                                           class="block text-sm/6 font-medium text-gray-900">About</label>--}}
{{--                                    <div class="mt-2">--}}
{{--                                            <textarea id="about" name="about" rows="3"--}}
{{--                                                      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"></textarea>--}}
{{--                                    </div>--}}
{{--                                    <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about--}}
{{--                                        yourself.</p>--}}
{{--                                </div>--}}

{{--                                <div class="col-span-full">--}}
{{--                                    <label for="photo"--}}
{{--                                           class="block text-sm/6 font-medium text-gray-900">Photo</label>--}}
{{--                                    <div class="mt-2 flex items-center gap-x-3">--}}
{{--                                        <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"--}}
{{--                                             aria-hidden="true" data-slot="icon">--}}
{{--                                            <path fill-rule="evenodd"--}}
{{--                                                  d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"--}}
{{--                                                  clip-rule="evenodd"/>--}}
{{--                                        </svg>--}}
{{--                                        <button type="button"--}}
{{--                                                class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">--}}
{{--                                            Change--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-span-full">--}}
{{--                                    <label for="cover-photo" class="block text-sm/6 font-medium text-gray-900">Cover--}}
{{--                                        photo</label>--}}
{{--                                    <div--}}
{{--                                        class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">--}}
{{--                                        <div class="text-center">--}}
{{--                                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24"--}}
{{--                                                 fill="currentColor" aria-hidden="true" data-slot="icon">--}}
{{--                                                <path fill-rule="evenodd"--}}
{{--                                                      d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"--}}
{{--                                                      clip-rule="evenodd"/>--}}
{{--                                            </svg>--}}
{{--                                            <div class="mt-4 flex text-sm/6 text-gray-600">--}}
{{--                                                <label for="file-upload"--}}
{{--                                                       class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">--}}
{{--                                                    <span>Upload a file</span>--}}
{{--                                                    <input id="file-upload" name="file-upload" type="file"--}}
{{--                                                           class="sr-only">--}}
{{--                                                </label>--}}
{{--                                                <p class="pl-1">or drag and drop</p>--}}
{{--                                            </div>--}}
{{--                                            <p class="text-xs/5 text-gray-600">PNG, JPG, GIF up to 10MB</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div--}}
{{--                            class="flex items-center justify-end gap-x-1 border-t border-gray-900/10 px-4 py-4 sm:px-8">--}}
{{--                            <x-button.back wire:navigate.hover href="{{ route('settings.departments') }}">--}}
{{--                                {{ __('Back')}}--}}
{{--                            </x-button.back>--}}
{{--                            <x-button.save>--}}
{{--                                {{ __('Update')}}--}}
{{--                            </x-button.save>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>

</x-app-layout>


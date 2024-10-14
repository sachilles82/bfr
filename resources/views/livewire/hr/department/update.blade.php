<div class="space-y-10 divide-y divide-gray-900/10">
    <div class="grid grid-cols-1 gap-x-8 gap-y-8 md:grid-cols-3">
        <div class="px-4 sm:px-0">
            <h2 class="text-base font-semibold leading-7 dark:text-white text-gray-900">{{ __('Department ')}}{{$department->name}}</h2>
            <p class="mt-1 text-sm leading-6 dark:text-gray-400 text-gray-600">{{ __('You can update the department here')}}</p>
        </div>

        <form wire:submit.prevent="updateDepartment"
            class="bg-white dark:bg-gray-900 shadow-sm ring-1 ring-gray-900/5 sm:rounded-md md:col-span-2">
            <div class="px-4 py-6 sm:p-8">
                <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <div class="sm:col-span-4">
                        <x-input.group label="{{ __('Name')}}"
                                       for="name"
                                       :error="$errors->first('name')"
                                       help-text="{{ __('') }}">
                            <x-input.text autofocus wire:model="name"
                                          name="name" id="name"
                                          placeholder="{{ __('Name')}}"/>
                        </x-input.group>
                    </div>
                </div>
            </div>
            <div
                class="flex items-center justify-end gap-x-1 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                <x-button.back wire:navigate.hover href="{{ route('settings.departments') }}">
                    {{ __('Back')}}
                </x-button.back>
                <x-button.save>
                    {{ __('Update')}}
                </x-button.save>

            </div>
        </form>
    </div>
</div>

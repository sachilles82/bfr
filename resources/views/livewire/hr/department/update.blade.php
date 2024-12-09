<div class="grid max-w-8xl grid-cols-1 gap-x-8 gap-y-10 px-4 py-10 sm:px-6 lg:grid-cols-3 lg:px-8">
    <div class="px-4 sm:px-0">
        <h2 class="text-base/7 font-semibold dark:text-white text-gray-900">
            {{ __('Company Address Information')}}
        </h2>
        <p class="mt-1 text-sm/6 text-gray-600 dark:text-gray-400">
            {{ __('Here are stored the main company information')}}
        </p>
    </div>

    <form wire:submit.prevent="updateDepartment"
          class="bg-white dark:bg-gray-900 shadow-sm ring-1 ring-gray-900/5 sm:rounded-md md:col-span-2">

        <flux:profile name="{{ Auth::user()->name }}"
                      avatar="{{ Auth::user()->profile_photo_url }}"
                      class="p-4 border-b border-gray-200 dark:border-gray-800"/>

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
        <!-- Update Button -->
        <x-button.update>
            {{ __('Update')}}
        </x-button.update>
    </form>
</div>

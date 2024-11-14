<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo/>
        </x-slot>

        <x-validation-errors class="mb-4"/>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="space-y-4">
                <div>
                    <flux:select label="{{ __('Branche') }}" variant="listbox" searchable
                                 placeholder="Wähle Branche...">
                        @foreach(\App\Models\HR\Industry::all() as $industry)
                            <flux:option value="{{ $industry->id }}">{{ $industry->name }}</flux:option>
                        @endforeach
                    </flux:select>
                </div>

{{--                                <flux:field>--}}
{{--                                    <flux:label badge="{{ __('Required') }}">{{ __('Company Size') }}</flux:label>--}}
{{--                                    <flux:select variant="listbox"--}}
{{--                                                 placeholder="{{ __('Company Size') }}">--}}
{{--                                        @foreach(App\Enums\Company\CompanySize::options() as $value => $label)--}}
{{--                                            <flux:option value="{{ $value }}">{{ $label }}</flux:option>--}}
{{--                                        @endforeach--}}
{{--                                    </flux:select>--}}
{{--                                    <flux:error name="company_size"/>--}}
{{--                                    <flux:input type="hidden" name="company_size" :value="$label"/>--}}

{{--                                </flux:field>--}}

{{--                <div x-data="{--}}
{{--                        open: false,--}}
{{--                        selectedOption: 'Choose company size...',--}}
{{--                        options: [--}}
{{--                            @foreach(App\Enums\Company\CompanySize::options() as $value => $label)--}}
{{--                                { value: '{{ $value }}', label: '{{ $label }}' },--}}
{{--                            @endforeach--}}
{{--                        ]--}}
{{--                    }">--}}
{{--                    <label id="listbox-label" class="block text-sm font-medium text-gray-900">Company Size</label>--}}
{{--                    <div class="relative mt-2">--}}
{{--                        <button @click="open = !open" type="button"--}}
{{--                                class="relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm"--}}
{{--                                aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label">--}}
{{--                            <span class="flex items-center">--}}
{{--                                <span class="ml-3 block truncate" x-text="selectedOption"></span>--}}
{{--                            </span>--}}
{{--                                            <span class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">--}}
{{--                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
{{--                                    <path fill-rule="evenodd"--}}
{{--                                          d="M10.53 3.47a.75.75 0 0 0-1.06 0L6.22 6.72a.75.75 0 0 0 1.06 1.06L10 5.06l2.72 2.72a.75.75 0 1 0 1.06-1.06l-3.25-3.25Zm-4.31 9.81 3.25 3.25a.75.75 0 0 0 1.06 0l3.25-3.25a.75.75 0 1 0-1.06-1.06L10 14.94l-2.72-2.72a.75.75 0 0 0-1.06 1.06Z"--}}
{{--                                          clip-rule="evenodd"/>--}}
{{--                                </svg>--}}
{{--                            </span>--}}
{{--                        </button>--}}

{{--                        <!-- Options dropdown -->--}}
{{--                        <ul x-show="open" @click.outside="open = false"--}}
{{--                            class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black/5 focus:outline-none sm:text-sm"--}}
{{--                            tabindex="-1" role="listbox" aria-labelledby="listbox-label">--}}
{{--                            <template x-for="option in options" :key="option.value">--}}
{{--                                <li @click="selectedOption = option.label; open = false; $refs.companySizeInput.value = option.value"--}}
{{--                                    class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900 hover:bg-indigo-600 hover:text-white"--}}
{{--                                    role="option">--}}
{{--                                    <span class="ml-3 block truncate" x-text="option.label"></span>--}}
{{--                                    <span x-show="selectedOption === option.label"--}}
{{--                                          class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600">--}}
{{--                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
{{--                            <path fill-rule="evenodd"--}}
{{--                                  d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"--}}
{{--                                  clip-rule="evenodd"/>--}}
{{--                        </svg>--}}
{{--                    </span>--}}
{{--                                </li>--}}
{{--                            </template>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <!-- Hidden input to submit the selected value -->--}}
{{--                    <input type="hidden" name="company_size" x-ref="companySizeInput"--}}
{{--                           :value="selectedOption === 'Choose company size...' ? '' : selectedOption">--}}
{{--                </div>--}}


                <flux:field>
                    <flux:label>{{ __('Meine App URL') }}</flux:label>

                    <flux:input.group>
                        <flux:input placeholder="meinefirma"/>

                        <flux:input.group.suffix>.reportix.app</flux:input.group.suffix>
                    </flux:input.group>

                    <flux:error name="website"/>
                </flux:field>
            </div>

            <fieldset>
                <div class="mt-6 space-y-6 sm:flex sm:items-center sm:space-x-10 sm:space-y-0">
                    @foreach(\App\Enums\Company\CompanyType::options() as $value => $label)
                        <div class="flex items-center">
                            <input id="{{ $value }}" name="company_type" type="radio" value="{{ $value }}"
                                   class="size-4 border-gray-300 text-indigo-600 focus:ring-indigo-600"
                                   {{ $value === 'gmbh' ? 'checked' : '' }} required>
                            <label for="{{ $value }}"
                                   class="ml-3 block text-sm/6 font-medium text-gray-900">{{ $label }}</label>
                        </div>
                    @endforeach
                </div>
            </fieldset>

            <div class="mt-4">
                <x-label for="name" value="{{ __('Firma') }}"/>
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                         autofocus autocomplete="name"/>
            </div>

            <div class="mt-4">
                <x-label for="name" value="{{ __('Name') }}"/>
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                         autofocus autocomplete="name"/>
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}"/>
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                         autocomplete="username"/>
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}"/>
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                         autocomplete="new-password"/>
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}"/>
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                         name="password_confirmation" required autocomplete="new-password"/>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required/>

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                   href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

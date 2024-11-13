<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <flux:fieldset>
                <flux:legend>Shipping address</flux:legend>

                <div class="space-y-4">
                    <flux:input label="Street address line 1" placeholder="123 Main St" class="max-w-sm" />
                    <flux:input label="Street address line 2" placeholder="Apartment, studio, or floor" class="max-w-sm" />

                    <div class="grid grid-cols-2 gap-x-4 gap-y-6">
                        <flux:input label="City" placeholder="San Francisco" />
                        <flux:input label="State / Province" placeholder="CA" />
                        <flux:input label="Postal / Zip code" placeholder="12345" />
                        <flux:select label="Country">
                            <option selected>United States</option>
                            <!-- ... -->
                        </flux:select>
                    </div>
                </div>
            </flux:fieldset>

            <div class="space-y-4">
            <div>
                <flux:select label="{{ __('Branche') }}" variant="listbox" searchable placeholder="Wähle Branche...">
                    @foreach(\App\Models\HR\Industry::all() as $industry)
                        <flux:option value="{{ $industry->id }}">{{ $industry->name }}</flux:option>
                    @endforeach
                </flux:select>
            </div>

            <div>
                <flux:select label="{{ __('Company Size') }}" variant="listbox" placeholder="{{ __('Company Size') }}">
                    @foreach(App\Enums\Company\CompanySize::options() as $value => $label)
                        <flux:option value="{{ $value }}">{{ $label }}</flux:option>
                    @endforeach
                </flux:select>
            </div>
            </div>

            <flux:radio.group wire:model="role" label="Role" variant="cards">
                <flux:radio label="AG" />
                <flux:radio label="GmbH" />
                <flux:radio label="Einzelfirma" />
            </flux:radio.group>


            <div class="mt-4">
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

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
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

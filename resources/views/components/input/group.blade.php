@props([
    'label',
    'error' => false,
    'helpText' => false,
    'for'
])
<div class="col-span-2 mt-0">
    <div>
        <label for="{{ $for}}" class="block text-sm font-medium leading-6 dark:text-white text-gray-900">
            {{ $label}}
        </label>

        {{--    der Slot ist das input element--}}
        <div class="mt-0">
            {{ $slot }}
        </div>

        @if ($error)
            @error($for)
            <x-input.error-danger for="{{ $for }}"/>
            @enderror
        @endif

        @if($helpText)
            <p class="mt-2 text-sm text-gray-500" id="">
                {{ $helpText }}
            </p>
        @endif
    </div>
</div>

<!-- Input Group example -->
{{--<x-input.group label="{{ __('Country Code')}} " for="code" :error="$errors->first('code')" help-text="{{ __('Country ISO Code') }}" >--}}
{{--    hier kann jedes input element eingefügt werden, textarea input datepicker etc
    <x-input.text wire:model.live="code" name="code" id="code" placeholder="{{ __('') }}"/>--}}
{{--</x-input.group>--}}

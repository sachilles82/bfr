<x-input.group
    label="{{ __('Street / Number')}}"
    for="street_number"
    badge="{{ __('* Required') }}"
    :error="$errors->first('street_number')"
    help-text="{{ __('') }}"
>
    <x-input.text-1
        wire:model="street_number"
        name="street_number"
        id="street_number"
        placeholder="{{ __('Street & Number')}}"/>
</x-input.group>

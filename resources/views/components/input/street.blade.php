<x-input.group
    label="{{ __('Street / Number')}}"
    for="street"
    badge="{{ __('* Required') }}"
    :error="$errors->first('street')"
    help-text="{{ __('') }}"
>
    <x-input.text-1
        wire:model="street"
        name="street"
        id="street"
        placeholder="{{ __('Street & Number')}}"/>
</x-input.group>

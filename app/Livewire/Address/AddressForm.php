<?php

namespace App\Livewire\Address;

use App\Models\Address\City;
use App\Models\Address\Country;
use App\Models\Address\State;
use Flux\Flux;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Livewire\Component;

class AddressForm extends Component
{
    public Model $addressable;
    public Collection $countries;
    public Collection $states;
    public Collection $cities;

    public $country_id = '';
    public $state_id = '';
    public $city_id = '';
    public string $street_number = '';

    // Namen für State und City
    public string $state_name = '';
    public string $city_name = '';

    public function mount(Model $addressable): void
    {
        $this->addressable = $addressable;

        // Daten aus der Datenbank laden
        $this->countries = Country::select('id', 'name', 'code')->get();
        $this->states = State::select('id', 'name', 'code', 'country_id')->get();
        $this->cities = City::select('id', 'zip_city', 'state_id')->get();

        // Vorhandene Adresse initialisieren
        if ($address = $this->addressable->address) {
            $this->street_number = $address->street_number ?? '';
            $this->country_id = $address->country_id ?? '';
            $this->state_id = $address->state_id ?? '';
            $this->city_id = $address->city_id ?? '';
        }
    }

    public function save(): void
    {

//        dd($this->country_id, $this->state_id, $this->city_id);

//        $this->validate([
//            'street_number' => 'required|string|max:255',
//            'country_id' => 'required|exists:countries,id',
//            'state_id' => 'required|exists:states,id',
//            'city_id' => 'required|exists:cities,id',
//        ]);

        $this->addressable->address()->updateOrCreate([], [
            'street_number' => $this->street_number,
            'country_id' => $this->country_id,
            'state_id' => $this->state_id,
            'city_id' => $this->city_id,
        ]);

        Flux::toast(
            text: 'Address updated successfully.',
            heading: 'Success',
            variant: 'success'
        );

        $this->dispatch('addressUpdated', $this->addressable->id);
    }

    public function render(): View
    {
        return view('livewire.address.address-form', [
            'countries' => $this->countries,
            'states' => $this->states,
            'cities' => $this->cities,
        ]);
    }
}

<?php

namespace App\Livewire\Address;

use App\Models\Address\City;
use App\Models\Address\Country;
use App\Models\Address\State;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Form extends Component
{
    public Collection $countries;
    public Collection $states;
    public Collection $cities;

    public ?int $selectedCountry = null;
    public ?int $selectedState = null;
    public ?int $selectedCity = null;

    /**
     * Initializes and caches country, state, and city data for 100 days.
     */
    public function mount(): void
    {
        $this->countries = Cache::remember('countries', 8640000, function () {
            return Country::select('id', 'name', 'code')->orderBy('id')->get();
        });

        $this->states = Cache::remember('states', 864000, function () {
            return State::where('user_id', 1)
                ->orWhere('user_id', Auth::id()) // States mit user_id = 1 oder Auth User ID
                ->select('id', 'name', 'country_id', 'code')
                ->get();
        });

        $this->cities = Cache::remember('cities', 864000, function () {
            return City::where('user_id', 1)
                ->orWhere('user_id', Auth::id()) // Cities mit user_id = 1 oder Auth User ID
                ->select('id', 'zip_city', 'state_id')
                ->get();
        });
    }


    public function render(): View
    {
        return view('livewire.address.form', [
            'countries' => $this->countries,
            'states' => $this->states,
            'cities' => $this->cities,
        ]);
    }
}

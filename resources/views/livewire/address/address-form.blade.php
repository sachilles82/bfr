<form wire:submit.prevent="save">
    <div x-data="countryDropdown()" x-init="init()" class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <!-- Country Dropdown -->
        <div class="sm:col-span-6 flex">
            <div class="mt-4 relative w-full">
                <div class="flex items-center">
                    <label class="block text-sm font-medium leading-6 text-gray-700 dark:text-white" for="country">{{ __('Country') }}</label>
                    <span x-show="!selectedCountryId" x-cloak class="ml-2 inline-flex items-center rounded-md bg-gray-100 dark:bg-gray-400/10 px-1.5 py-0.5 text-xs font-medium text-gray-600 dark:text-gray-400">
                        {{ __('* Required') }}
                    </span>
                </div>
                <div autofocus class="mt-2 block w-min-[200px] relative content-center w-full py-1.5 text-left dark:bg-white/5 border-0 rounded-l-none ring-1 ring-inset ring-gray-300 dark:ring-white/10 rounded-md sm:text-sm sm:leading-5 dark:text-white dark:placeholder-gray-400 dark:focus:ring-white/10 dark:ring-inset dark:ring-gray-700/50 dark:bg-gray-800 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus-within:ring-inset dark:focus-within:ring-indigo-500 bg-gray-200 cursor-default"
                     @click.prevent="toggleSelectCountry()" @click.away="closeSelectCountry()" @keydown.escape="closeSelectCountry()" @keydown.arrow-down.prevent="increaseIndex()" @keydown.arrow-up.prevent="decreaseIndex()" @keydown.enter="selectCountry(filteredCountries()[highlightIndex])">
                    <div class="inline-block m-1 pl-2 text-sm text-gray-400 cursor-pointer" x-show="!selectedCountryName" x-text="'{{ __('Select a country') }}'">&nbsp;</div>
                    <div class="ml-2 flex flex-wrap cursor-pointer" x-cloak x-show="selectedCountryName">
                        <div class="text-gray-800 dark:text-gray-400 truncate px-2 py-0.5 my-0.5 flex items-center">
                            <template x-if="selectedCountry && selectedCountry.code">
                                <img :src="'/flags/country-' + selectedCountry.code.toLowerCase() + '.svg'" alt="Flag" class="h-5 w-5 me-2 flex-none rounded-b-2xl shadow-md dark:shadow-sm-light object-cover ring-1 ring-gray-700/20 dark:ring-white/10 bg-gray-500 dark:bg-gray-800 text-gray-700 dark:text-gray-400">
                            </template>
                            <div class="px-2 truncate" x-text="selectedCountryName"></div>
                            <svg class="w-2.5 h-2.5 ms-2.5 justify-end" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-1 w-full dark:bg-gray-800 shadow-md dark:border dark:border-gray-700 bg-white rounded-b-md absolute top-full left-0 z-30" x-show="openCountryDropdown" x-cloak>
                        <div class="relative z-30 w-full p-2 bg-white dark:bg-gray-800">
                            <div class="relative w-full">
                                <x-icon.search />
                                <input type="search" x-model="searchCountry" placeholder="{{ __('Search..') }}" class="block w-full px-2.5 pl-10 text-gray-900 placeholder:text-gray-400 placeholder:dark:text-gray-500 rounded-md text-sm border-0 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 dark:ring-gray-700/50 dark:bg-white/5 dark:text-white" @click.stop>
                            </div>
                        </div>
                        <div x-ref="dropdown" class="relative z-30 p-2 overflow-y-auto max-h-60">
                            <div x-cloak x-show="filteredCountries().length === 0" class="text-gray-400 dark:text-gray-400 flex justify-center items-center">
                                {{ __('No results match your search') }}
                            </div>

                            <template x-for="(country, index) in filteredCountries()" :key="country.id">
                                <div class="relative">
                                    <div class="py-1.5 px-3 mb-1 rounded-lg text-sm cursor-pointer" :class="{'dark:bg-gray-700/50 dark:text-gray-300 bg-gray-100 text-gray-800': selectedCountryId === country.id, 'text-gray-600 hover:text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700/50 dark:hover:text-gray-300': selectedCountryId !== country.id}"
                                         @click.prevent.stop="selectCountry(country)" @mouseenter="highlightIndex = index" :class="{'bg-gray-100': highlightIndex === index}">
                                        <span class="absolute inset-y-0 right-0 flex items-center pr-2 text-gray-700 dark:text-gray-300">
                                            <svg x-show="selectedCountryId === country.id" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                      d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </span>
                                        <div class="inline-flex items-center mt-1">
                                            <template x-if="country.code">
                                                <img :src="'/flags/country-' + country.code.toLowerCase() + '.svg'" alt="Flag" class="h-5 w-5 me-2 flex-none rounded-b-2xl shadow-md dark:shadow-sm-light object-cover ring-1 ring-gray-700/20 dark:ring-white/10 bg-gray-500 dark:bg-gray-800 text-gray-700 dark:text-gray-400">
                                            </template>
                                            <span class="ml-2" x-text="country.name"></span>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                        <a href="#" class="flex items-center p-3 text-sm font-medium text-gray-700 border-t border-gray-200 rounded-b-md bg-gray-50 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700/50 dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300 hover:underline">
                            <x-icon.plus class="w-4 h-4 -ml-1 mr-2" />
                            {{ __('Add new Country') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- State Dropdown -->
        <div class="sm:col-span-6 flex">
            <div class="mt-4 relative w-full">
                <div class="flex items-center">
                    <label class="block text-sm font-medium leading-6 text-gray-700 dark:text-white" for="state">{{ __('State') }}</label>
                    <span x-show="!selectedStateId" x-cloak class="ml-2 inline-flex items-center rounded-md bg-gray-100 dark:bg-gray-400/10 px-1.5 py-0.5 text-xs font-medium text-gray-600 dark:text-gray-400">
                        {{ __('* Required') }}
                    </span>
                </div>
                <div autofocus class="mt-2 block w-min-[200px] relative content-center w-full py-1.5 text-left dark:bg-white/5 border-0 rounded-l-none ring-1 ring-inset ring-gray-300 dark:ring-white/10 rounded-md sm:text-sm sm:leading-5 dark:text-white dark:placeholder-gray-400 dark:focus:ring-white/10 dark:ring-inset dark:ring-gray-700/50 dark:bg-gray-800 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus-within:ring-inset dark:focus-within:ring-indigo-500 bg-gray-200 cursor-default"
                     @click.prevent="toggleSelectState()" @click.away="closeSelectState()" @keydown.escape="closeSelectState()" @keydown.arrow-down.prevent="increaseIndex()" @keydown.arrow-up.prevent="decreaseIndex()" @keydown.enter="selectState(filteredStates()[highlightIndex])">
                    <div class="inline-block m-1 pl-2 text-sm text-gray-400 cursor-pointer" x-show="!selectedStateName" x-text="'{{ __('Select a state') }}'">&nbsp;</div>
                    <div class="ml-2 flex flex-wrap cursor-pointer" x-cloak x-show="selectedStateName">
                        <div class="text-gray-800 dark:text-gray-400 truncate px-2 py-0.5 my-0.5 flex items-center">
                            <template x-if="selectedState && selectedState.code">
                                <img :src="'/flags/state/' + selectedState.code.toLowerCase() + '.svg'" alt="Flag" class="h-5 w-5 me-2 flex-none rounded-b-2xl shadow-md dark:shadow-sm-light object-cover ring-1 ring-gray-700/20 dark:ring-white/10 bg-gray-500 dark:bg-gray-800 text-gray-700 dark:text-gray-400">
                            </template>
                            <div class="px-2 truncate" x-text="selectedStateName"></div>
                            <svg class="w-2.5 h-2.5 ms-2.5 justify-end" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-1 w-full dark:bg-gray-800 shadow-md dark:border dark:border-gray-700 bg-white rounded-b-md absolute top-full left-0 z-30" x-show="openStateDropdown" x-cloak>
                        <div class="relative z-30 w-full p-2 bg-white dark:bg-gray-800">
                            <div class="relative w-full">
                                <x-icon.search />
                                <input type="search" x-model="searchState" placeholder="{{ __('Search..') }}" class="block w-full px-2.5 pl-10 text-gray-900 placeholder:text-gray-400 placeholder:dark:text-gray-500 rounded-md text-sm border-0 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 dark:ring-gray-700/50 dark:bg-white/5 dark:text-white" @click.stop>
                            </div>
                        </div>
                        <div x-ref="dropdown" class="relative z-30 p-2 overflow-y-auto max-h-60">
                            <div x-cloak x-show="filteredStates().length === 0" class="text-gray-400 dark:text-gray-400 flex justify-center items-center">
                                {{ __('No results match your search') }}
                            </div>

                            <template x-for="(state, index) in filteredStates()" :key="state.id">
                                <div class="relative">
                                    <div class="py-1.5 px-3 mb-1 rounded-lg text-sm cursor-pointer" :class="{'dark:bg-gray-700/50 dark:text-gray-300 bg-gray-100 text-gray-800': selectedStateId === state.id, 'text-gray-600 hover:text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700/50 dark:hover:text-gray-300': selectedStateId !== state.id}" @click.prevent.stop="selectState(state)" @mouseenter="highlightIndex = index" :class="{'bg-gray-100': highlightIndex === index}">
                                        <span class="absolute inset-y-0 right-0 flex items-center pr-2 text-gray-700 dark:text-gray-300">
                                            <svg x-show="selectedStateId === state.id" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"/>
                                            </svg>
                                        </span>
                                        <div class="inline-flex items-center mt-1">
                                            <template x-if="state.code">
                                                <img :src="'/flags/state/' + state.code.toLowerCase() + '.svg'" alt="Flag" class="h-5 w-5 me-2 flex-none rounded-b-2xl shadow-md dark:shadow-sm-light object-cover ring-1 ring-gray-700/20 dark:ring-white/10 bg-gray-500 dark:bg-gray-800 text-gray-700 dark:text-gray-400">
                                            </template>
                                            <span class="ml-2" x-text="state.name"></span>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                        <a href="#" class="flex items-center p-3 text-sm font-medium text-gray-700 border-t border-gray-200 rounded-b-md bg-gray-50 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700/50 dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300 hover:underline">
                            <x-icon.plus class="w-4 h-4 -ml-1 mr-2" />
                            {{ __('Add new State') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>





        <div class="sm:col-span-6 flex">
            <div class="mt-4 relative w-full">
                <div class="flex items-center">
                    <label class="block text-sm font-medium leading-6 text-gray-700 dark:text-white" for="city">{{ __('City') }}</label>
                    <span x-show="!selectedCityId" x-cloak class="ml-2 inline-flex items-center rounded-md bg-gray-100 dark:bg-gray-400/10 px-1.5 py-0.5 text-xs font-medium text-gray-600 dark:text-gray-400">
                        {{ __('* Required') }}
                    </span>
                </div>
                <div autofocus class="mt-2 block w-min-[200px] relative content-center w-full py-1.5 text-left dark:bg-white/5 border-0 rounded-l-none ring-1 ring-inset ring-gray-300 dark:ring-white/10 rounded-md sm:text-sm sm:leading-5 dark:text-white dark:placeholder-gray-400 dark:focus:ring-white/10 dark:ring-inset dark:ring-gray-700/50 dark:bg-gray-800 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus-within:ring-inset dark:focus-within:ring-indigo-500 bg-gray-200 cursor-default"
                     @click.prevent="toggleSelectCity()" @click.away="closeSelectCity()" @keydown.escape="closeSelectCity()" @keydown.arrow-down.prevent="increaseIndex()" @keydown.arrow-up.prevent="decreaseIndex()" @keydown.enter="selectCity(filteredCities()[highlightIndex])">
                    <div class="inline-block m-1 pl-2 text-sm text-gray-400 cursor-pointer" x-show="!selectedCityName" x-text="'{{ __('Select a city') }}'">&nbsp;</div>
                    <div class="ml-2 flex flex-wrap cursor-pointer" x-cloak x-show="selectedCityName">
                        <div class="text-gray-800 dark:text-gray-400 truncate px-2 py-0.5 my-0.5 flex items-center">
                            <div class="px-2 truncate" x-text="selectedCityName"></div>
                            <svg class="w-2.5 h-2.5 ms-2.5 justify-end" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-1 w-full dark:bg-gray-800 shadow-md dark:border dark:border-gray-700 bg-white rounded-b-md absolute top-full left-0 z-30" x-show="openCityDropdown" x-cloak>
                        <div class="relative z-30 w-full p-2 bg-white dark:bg-gray-800">
                            <div class="relative w-full">
                                <x-icon.search />
                                <input type="search" x-model="searchCity" placeholder="{{ __('Search..') }}" class="block w-full px-2.5 pl-10 text-gray-900 placeholder:text-gray-400 placeholder:dark:text-gray-500 rounded-md text-sm border-0 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 dark:ring-gray-700/50 dark:bg-white/5 dark:text-white" @click.stop>
                            </div>
                        </div>
                        <div x-ref="dropdown" class="relative z-30 p-2 overflow-y-auto max-h-60">
                            <div x-cloak x-show="filteredCities().length === 0" class="text-gray-400 dark:text-gray-400 flex justify-center items-center">
                                {{ __('No results match your search') }}
                            </div>

                            <template x-for="(city, index) in filteredCities()" :key="city.id">
                                <div class="relative">
                                    <div class="py-1.5 px-3 mb-1 rounded-lg text-sm cursor-pointer" :class="{'dark:bg-gray-700/50 dark:text-gray-300 bg-gray-100 text-gray-800': selectedCityId === city.id, 'text-gray-600 hover:text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700/50 dark:hover:text-gray-300': selectedCityId !== city.id}" @click.prevent.stop="selectCity(city)" @mouseenter="highlightIndex = index" :class="{'bg-gray-100': highlightIndex === index}">
                                        <span class="ml-2" x-text="city.name"></span>
                                    </div>
                                </div>
                            </template>
                        </div>
                        <a href="#" class="flex items-center p-3 text-sm font-medium text-gray-700 border-t border-gray-200 rounded-b-md bg-gray-50 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700/50 dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300 hover:underline">
                            <x-icon.plus class="w-4 h-4 -ml-1 mr-2" />
                            {{ __('Add new City') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Street Number -->
        <div class="sm:col-span-6 sm:col-start-1">
            <x-input.text-1
                wire:model="street_number"
                name="street_number"
                id="street_number"
                placeholder="{{ __('Street & Number') }}"/>
        </div>


        <input type="hidden" wire:model="country_id" x-ref="countryIdInput">
        <input type="hidden" wire:model="state_id" x-ref="stateIdInput">
        <input type="hidden" wire:model="city_id" x-ref="cityIdInput">

    </div>


    <div class="flex items-center justify-end gap-x-1 border-t border-gray-900/10 px-4 py-4 sm:px-8">
        <x-button.back wire:navigate.hover href="{{ route('settings.departments') }}">
            {{ __('Back')}}
        </x-button.back>
        <x-button.save>
            {{ __('Update')}}
        </x-button.save>
    </div>
</form>

<!-- Scripts -->
<script>
    function countryDropdown() {
        return {
            countries: @json($countries),
            selectedCountryId: @json($country_id),
            selectedCountry: null,
            selectedCountryName: '',
            searchCountry: '',
            openCountryDropdown: false,

            states: @json($states),
            selectedStateId: @json($state_id),
            selectedState: null,
            selectedStateName: '',
            searchState: '',
            openStateDropdown: false,

            cities: @json($cities),  // Assuming $cities is provided
            selectedCityId: @json($city_id),
            selectedCity: null,
            selectedCityName: '',
            searchCity: '',
            openCityDropdown: false,

            init() {
                // Handle pre-selection for countries
                const preselectedCountry = this.countries.find(c => c.id === this.selectedCountryId);
                if (preselectedCountry) {
                    this.selectedCountryName = preselectedCountry.name;
                    this.selectedCountry = preselectedCountry;
                    this.searchCountry = '';
                }

                // Handle pre-selection for states
                const preselectedState = this.states.find(s => s.id === this.selectedStateId);
                if (preselectedState) {
                    this.selectedStateName = preselectedState.name;
                    this.selectedState = preselectedState;
                    this.searchState = '';
                }

                // Handle pre-selection for cities
                const preselectedCity = this.cities.find(city => city.id === this.selectedCityId);
                if (preselectedCity) {
                    this.selectedCityName = preselectedCity.name;
                    this.selectedCity = preselectedCity;
                    this.searchCity = '';
                }
            },

            filteredCountries() {
                return this.countries.filter(country =>
                    country.name.toLowerCase().includes(this.searchCountry.toLowerCase())
                );
            },

            filteredStates() {
                if (!this.selectedCountry) return [];
                return this.states.filter(state =>
                    state.country_id === this.selectedCountry.id &&
                    state.name.toLowerCase().includes(this.searchState.toLowerCase())
                );
            },

            filteredCities() {
                // Ensure 'selectedState' is defined before proceeding with filtering
                if (!this.selectedState || !this.cities) return [];

                // Filter cities based on selected state and search term
                return this.cities.filter(city =>
                    city.state_id === this.selectedState.id && // Ensure city belongs to the selected state
                    city.name && city.name.toLowerCase().includes(this.searchCity.toLowerCase()) // Check if 'name' contains the search term
                );
            },

            toggleSelectCountry() {
                this.openCountryDropdown = !this.openCountryDropdown;
                if (this.openCountryDropdown) this.searchCountry = '';
            },

            closeSelectCountry() {
                this.openCountryDropdown = false;
            },

            toggleSelectState() {
                this.openStateDropdown = !this.openStateDropdown;
                if (this.openStateDropdown) this.searchState = '';
            },

            closeSelectState() {
                this.openStateDropdown = false;
            },

            toggleSelectCity() {
                this.openCityDropdown = !this.openCityDropdown;
                if (this.openCityDropdown) this.searchCity = '';
            },

            closeSelectCity() {
                this.openCityDropdown = false;
            },

            selectCountry(country) {
                this.selectedCountryId = country.id;
                this.selectedCountryName = country.name;
                this.selectedCountry = country;
                this.openCountryDropdown = false;
                this.searchCountry = '';

                // Aktualisiere das verbundene Livewire-Modell durch versteckten Input
                if (this.$refs.countryIdInput._x_model) {
                    this.$refs.countryIdInput._x_model.set(country.id);
                }



                // Clear selected state when the country changes
                this.selectedStateId = null;
                this.selectedState = null;
                this.selectedStateName = '';

                // Clear selected city when the country changes
                this.selectedCityId = null;
                this.selectedCity = null;
                this.selectedCityName = '';
            },

            selectState(state) {
                this.selectedStateId = state.id;
                this.selectedStateName = state.name;
                this.selectedState = state;
                this.openStateDropdown = false;
                this.searchState = '';

                if (this.$refs.stateIdInput._x_model) {
                    this.$refs.stateIdInput._x_model.set(state.id);
                }

                // Clear selected city when the country changes
                this.selectedCityId = null;
                this.selectedCity = null;
                this.selectedCityName = '';
            },

            selectCity(city) {
                this.selectedCityId = city.id;
                this.selectedCityName = city.name;
                this.selectedCity = city;
                this.openCityDropdown = false;
                this.searchCity = '';

                if (this.$refs.cityIdInput._x_model) {
                    this.$refs.cityIdInput._x_model.set(city.id);
                }
            },
        };
    }

    document.addEventListener('alpine:init', () => {
        Alpine.data('countryDropdown', countryDropdown);
    });
</script>

<form wire:submit.prevent="save"
      class="bg-white dark:bg-gray-900 shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
    <div class="px-4 py-6 sm:p-8 border-b dark:border-white/10 border-white">
        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

            <div class="col-span-full">
                <div x-data="dropdownHandler()">

                    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4 flex">
                            <div class="mt-4">
                                <label class="block text-sm font-medium leading-6 dark:text-white text-gray-700"
                                       for="country">
                                    {{ __('Country') }}
                                </label>
                                <div class="relative mt-2">
                                    <div
                                        class="cursor-pointer flex-shrink-0 z-10 inline-flex min-w-[120px] items-center py-1.5 text-left px-2 text-sm font-medium sm:text-sm sm:leading-5 text-gray-500 bg-gray-100 border-0 border-gray-300 rounded-s-lg dark:bg-white/5 ring-1 ring-inset ring-gray-300 dark:ring-white/10"
                                        :class="{'focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus-within:ring-inset dark:focus-within:ring-indigo-500': openCountry, 'bg-gray-200': disabled}"
                                        @click.prevent="toggleSelect('country')"
                                        @click.away="closeSelect('country')"
                                        @keydown.escape="closeSelect('country')"
                                        @keydown.arrow-down.prevent="increaseIndex('country')"
                                        @keydown.arrow-up.prevent="decreaseIndex('country')"
                                        @keydown.enter="selectOption('country')">

                                        <!-- Dummy Country Flag-->
                                        <div class="flex flex-wrap" x-show="!selectedCountry">
                                            <div
                                                class="text-gray-800 dark:text-gray-400 truncate px-2 py-0.5 my-0.5 flex items-center">
                                                <svg
                                                    class="h-5 w-5 me-2 flex-none rounded-b-2xl shadow-md dark:shadow-sm-light object-cover ring-1 ring-gray-700/20 dark:ring-white/10 bg-gray-500 dark:bg-gray-800 text-gray-700 dark:text-gray-400"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 5 36 26">
                                                    <path
                                                        d="M36 27c0 2.209-2.48 4-5.538 4H5.538C2.48 31 0 29.209 0 27V9c0-2.209 2.48-4 5.538-4h24.924C33.52 5 36 6.791 36 9v18Z"
                                                        fill="#D32D27"/>
                                                    <path d="M25 16.063h-5v-5h-4v5h-5V20h5v5.063h4V20h5v-3.937Z"
                                                          fill="#fff"/>
                                                </svg>
                                                <div class="px-2 truncate">CH</div>
                                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          stroke-width="2" d="m1 1 4 4 4-4"/>
                                                </svg>
                                            </div>
                                        </div>

                                        <div class="flex flex-wrap" x-cloak x-show="selectedCountry">
                                            <div
                                                class="text-gray-800 dark:text-gray-400 truncate px-2 py-0.5 my-0.5 flex items-center">
                                                <img
                                                    :src="'/flags/country-' + selectedCountry.code.toLowerCase() + '.svg'"
                                                    alt="Flag"
                                                    class="h-5 w-5 me-2 flex-none rounded-b-2xl shadow-md dark:shadow-sm-light object-cover ring-1 ring-gray-700/20 dark:ring-white/10 bg-gray-500 dark:bg-gray-800 text-gray-700 dark:text-gray-400">
                                                <div class="px-2 truncate"
                                                     x-text="selectedCountry.code.toUpperCase()"></div>
                                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          stroke-width="2" d="m1 1 4 4 4-4"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div
                                            class="mt-1 min-w-[200px] dark:bg-gray-800 shadow-md dark:border dark:border-gray-700 bg-white rounded-b-md absolute top-full left-0 z-30"
                                            x-show="openCountry" x-cloak>
                                            <div class="relative z-30 w-full p-2 bg-white dark:bg-gray-800">
                                                <div class="relative w-full">
                                                    <x-icon.search/>
                                                    <input type="search" x-model="searchCountry"
                                                           @click.prevent.stop="openCountry=true"
                                                           placeholder="{{ __('Search..') }}"
                                                           class="block w-full px-2.5 pl-10 text-gray-900 placeholder:dark:text-gray-500 placeholder:text-gray-400 rounded-md text-sm border-0 ring-1 ring-inset ring-gray-300 focus:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 dark:focus:ring-indigo-500 dark:ring-gray-700/50 dark:bg-white/5 dark:text-white">
                                                </div>
                                            </div>
                                            <div x-ref="dropdown" class="relative z-30 p-2 overflow-y-auto max-h-60">
                                                <div x-cloak x-show="filteredCountries().length === 0"
                                                     class="text-gray-400 dark:text-gray-400 flex justify-center items-center">
                                                    {{ __('No results match your search') }}
                                                </div>
                                                <template x-for="country in filteredCountries()" :key="country.id">
                                                    <div class="relative">
                                                        <div class="py-1.5 px-3 mb-1 rounded-lg text-sm cursor-pointer"
                                                             :class="{'dark:bg-gray-700/50 dark:text-gray-300 bg-gray-50 text-gray-800': selectedCountryId === country.id, 'text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700/50 dark:hover:text-gray-300': selectedCountryId !== country.id}"
                                                             @click.prevent.stop="selectCountry(country)">
                                                            <span
                                                                class="absolute inset-y-0 right-0 flex items-center pr-2 text-gray-700 dark:text-gray-300">
                                                                  <svg
                                                                      :class="{'w-4 h-4': selectedCountryId === country.id}"
                                                                      viewBox="0 0 20 20" fill="currentColor"
                                                                      aria-hidden="true">
                                                                    <path fill-rule="evenodd"
                                                                          d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                                          clip-rule="evenodd"/>
                                                                  </svg>
                                                            </span>
                                                            <div class="inline-flex items-center mt-1">
                                                                <img
                                                                    class="h-5 w-5 me-2 flex-none rounded-b-2xl shadow-md dark:shadow-sm-light object-cover ring-1 ring-gray-700/20 dark:ring-white/10 bg-gray-500 dark:bg-gray-800 text-gray-700 dark:text-gray-400"
                                                                    :src="'/flags/country-' + country.code.toLowerCase() + '.svg'"
                                                                    alt="Flag">
                                                                <span class="ml-2" x-text="country.name"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="text" wire:model.defer="country_id">
                                <input type="text" wire:model.defer="state_id">
                                <input type="text" wire:model.defer="city_id">


                            </div>
                            <!-- Country Dropdown End-->


                            <div class="mt-4 relative w-full">

                                <div class="flex items-center ">
                                    <label class="block text-sm font-medium leading-6 dark:text-white text-gray-700"
                                           for="state">
                                        {{ __('State') }}
                                    </label>
                                    <span
                                        x-show="!selectedStateId"
                                        x-cloak
                                        class="ml-2 inline-flex items-center rounded-md bg-gray-100 dark:bg-gray-400/10 px-1.5 py-0.5 text-xs font-medium dark:text-gray-400 text-gray-600">
                        {{ __('* Required') }}
                    </span>
                                </div>
                                <div autofocus
                                     class="mt-2 block w-min-[200px] relative content-center w-full py-1.5 text-left bg-white dark:bg-white/5 border-0 rounded-l-none ring-1 ring-inset ring-gray-300 dark:ring-white/10 rounded-md sm:text-sm sm:leading-5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus-within:ring-inset dark:focus-within:ring-indigo-500"
                                     :class="{'focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus-within:ring-inset dark:focus-within:ring-indigo-500': openState, 'bg-gray-200 cursor-default': disabled}"
                                     @click.prevent="toggleSelect('state')"
                                     @click.away="closeSelect('state')"
                                     @keydown.escape="closeSelect('state')"
                                     @keydown.arrow-down.prevent="increaseIndex('state')"
                                     @keydown.arrow-up.prevent="decreaseIndex('state')"
                                     @keydown.enter="selectOption('state')">
                                    <div class="inline-block m-1 pl-2 text-sm text-gray-400 cursor-pointer"
                                         x-show="!selectedState"
                                         x-text="'{{ __('Select a state') }}'">&nbsp;
                                    </div>
                                    <div class="ml-2 flex flex-wrap cursor-pointer" x-cloak x-show="selectedState">
                                        <div
                                            class="text-gray-800 dark:text-gray-400 truncate px-2 py-0.5 my-0.5 flex items-center">

                                            <template x-if="selectedState && selectedState.code">
                                                <img :src="'/flags/state/' + selectedState.code.toLowerCase() + '.svg'"
                                                     alt="Flag"
                                                     class="h-5 w-5 me-2 flex-none rounded-b-2xl shadow-md dark:shadow-sm-light object-cover ring-1 ring-gray-700/20 dark:ring-white/10 bg-gray-500 dark:bg-gray-800 text-gray-700 dark:text-gray-400">
                                            </template>

                                            <div class="px-2 truncate" x-text="selectedStateName"></div>

                                            <svg class="w-2.5 h-2.5 ms-2.5 justify-end" aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2" d="m1 1 4 4 4-4"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div
                                        class="mt-1 w-full dark:bg-gray-800 shadow-md dark:border dark:border-gray-700 bg-white rounded-b-md absolute top-full left-0 z-30"
                                        x-show="openState" x-cloak>
                                        <div class="relative z-30 w-full p-2 bg-white dark:bg-gray-800">
                                            <div class="relative w-full">
                                                <x-icon.search/>
                                                <input type="search" x-model="searchState"
                                                       @click.prevent.stop="openState=true"
                                                       placeholder="{{ __('Search..') }}"
                                                       class="block w-full px-2.5 pl-10 text-gray-900 placeholder:dark:text-gray-500 placeholder:text-gray-400 rounded-md text-sm border-0 ring-1 ring-inset ring-gray-300 focus:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 dark:focus:ring-indigo-500 dark:ring-gray-700/50 dark:bg-white/5 dark:text-white">
                                            </div>
                                        </div>
                                        <div x-ref="dropdown" class="relative z-30 p-2 overflow-y-auto max-h-60">
                                            <div x-cloak x-show="filteredStates().length === 0"
                                                 class="text-gray-400 dark:text-gray-400 flex justify-center items-center">
                                                {{ __('No results match your search') }}
                                            </div>

                                            <template x-for="state in filteredStates()" :key="state.id">
                                                <div class="relative">
                                                    <div class="py-1.5 px-3 mb-1 rounded-lg text-sm cursor-pointer"
                                                         :class="{'dark:bg-gray-700/50 dark:text-gray-300 bg-gray-100 text-gray-800': selectedStateId === state.id, 'text-gray-600 hover:text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700/50 dark:hover:text-gray-300': selectedStateId !== state.id}"
                                                         @click.prevent.stop="selectState(state)">
                                <span
                                    class="absolute inset-y-0 right-0 flex items-center pr-2 text-gray-700 dark:text-gray-300">
                                    <svg :class="{'w-4 h-4': selectedStateId === state.id}"
                                         viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </span>
                                                        <div class="inline-flex items-center mt-1">
                                                            <template x-if="state.code">
                                                                <img
                                                                    class="h-5 w-5 me-2 flex-none rounded-b-2xl shadow-md dark:shadow-sm-light object-cover ring-1 ring-gray-700/20 dark:ring-white/10 bg-gray-500 dark:bg-gray-800 text-gray-700 dark:text-gray-400"
                                                                    :src="'/flags/state/' + state.code.toLowerCase() + '.svg'"
                                                                    alt="Flag">
                                                            </template>
                                                            <span class="ml-2" x-text="state.name"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                        <a href="#"
                                           class="flex items-center p-3 text-sm font-medium text-gray-700 border-t border-gray-200 rounded-b-md bg-gray-50 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700/50 dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300 hover:underline">
                                            <x-icon.plus class="w-4 h-4 -ml-1 mr-2"/>
                                            {{ __('Add new Zip & City') }}
                                        </a>
                                        {{--                            <livewire:address.state.create-state/>--}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-3 sm:col-start-1">


                            <!-- Street Number Input -->
                            <div class="sm:col-span-3 sm:col-start-1">
                                <x-input.text-1
                                    wire:model="street_number"
                                    name="street_number"
                                    id="street_number"
                                    placeholder="{{ __('Street & Number') }}"/>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <!-- City Dropdown -->
                            <div class="flex items-center ">
                                <label class="block text-sm font-medium leading-6 dark:text-white text-gray-700"
                                       for="Zip City">
                                    {{ __('ZIP & State / Province') }}
                                </label>
                                <span
                                    x-show="!selectedCity"
                                    x-cloak
                                    class="ml-2 inline-flex items-center rounded-md bg-gray-100 dark:bg-gray-400/10 px-1.5 py-0.5 text-xs font-medium dark:text-gray-400 text-gray-600">
                        {{ __('* Required') }}
                    </span>
                            </div>
                            <div class="relative mt-2">
                                <div
                                    class="block relative content-center w-full py-1.5 text-left bg-white dark:bg-white/5 border-0 ring-1 ring-inset ring-gray-300 dark:ring-white/10 rounded-md sm:text-sm sm:leading-5 focus:ring-2 focus-within:ring-inset focus:ring-indigo-600 dark:focus-within:ring-inset dark:focus-within:ring-indigo-500"
                                    :class="{'focus:ring-2 focus-within:ring-inset focus:ring-indigo-600 dark:focus-within:ring-inset dark:focus-within:ring-indigo-500': openCity, 'bg-gray-200 cursor-default': disabled}"
                                    @click.prevent="toggleSelect('city')"
                                    @click.away="closeSelect('city')"
                                    @keydown.escape="closeSelect('city')"
                                    @keydown.arrow-down.prevent="increaseIndex('city')"
                                    @keydown.arrow-up.prevent="decreaseIndex('city')"
                                    @keydown.enter="selectOption('city')">
                                    <div class="inline-block m-1 pl-2 text-sm text-gray-400" x-show="!selectedCity"
                                         x-text="'{{ __('Select a city') }}'">&nbsp;
                                    </div>
                                    <div class="flex flex-wrap" x-cloak x-show="selectedCity">
                                        <div
                                            class="text-gray-800 dark:text-gray-400 truncate px-2 py-0.5 my-0.5 flex items-center">

                                            <div class="px-2 truncate" x-text="selectedCityName"></div>

                                            <svg class="w-2.5 h-2.5 ms-2.5 justify-end" aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2" d="m1 1 4 4 4-4"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div
                                        class="mt-1 w-full dark:bg-gray-800 shadow-md dark:border dark:border-gray-700 bg-white rounded-b-md absolute top-full left-0 z-30"
                                        x-show="openCity" x-cloak>
                                        <div class="relative z-30 w-full p-2 bg-white dark:bg-gray-800">
                                            <div class="relative w-full">
                                                <x-icon.search/>
                                                <input type="search" x-model="searchCity"
                                                       @click.prevent.stop="openCity=true"
                                                       placeholder="{{ __('Search..') }}"
                                                       class="block w-full px-2.5 pl-10 text-gray-900 placeholder:dark:text-gray-500 placeholder:text-gray-400 rounded-md text-sm border-0 ring-1 ring-inset ring-gray-300 focus:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 dark:focus:ring-indigo-500 dark:ring-gray-700/50 dark:bg-white/5 dark:text-white">
                                            </div>
                                        </div>
                                        <div x-ref="dropdown" class="relative z-30 p-2 overflow-y-auto max-h-60">
                                            <div x-cloak x-show="filteredCities().length === 0"
                                                 class="text-gray-400 dark:text-gray-400 flex justify-center items-center">
                                                {{ __('No results match your search') }}
                                            </div>
                                            <template x-for="city in filteredCities()" :key="city.id">
                                                <div class="relative">
                                                    <div class="py-1.5 px-3 mb-1 rounded-lg text-sm cursor-pointer"
                                                         :class="{'dark:bg-gray-700/50 dark:text-gray-600 bg-gray-50 text-gray-800': selectedCity === city.id, 'text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700/50 dark:hover:text-gray-300': selectedCity !== city.id}"
                                                         @click.prevent.stop="selectCity(city)">
                                                        <span x-text="city.zip_city"></span>
                                                        <span
                                                            class="absolute inset-y-0 right-0 flex items-center pr-2 text-gray-700 dark:text-gray-300">
                                                            <svg :class="{'w-4 h-4': selectedCity === city.id}"
                                                                 viewBox="0 0 20 20"
                                                                 fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd"
                                                                      d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                                      clip-rule="evenodd"/>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                        <a href="#"
                                           class="flex items-center p-3 text-sm font-medium text-gray-700 border-t border-gray-200 rounded-b-md bg-gray-50 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700/50 dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300 hover:underline">
                                            <x-icon.plus class="w-4 h-4 -ml-1 mr-2"/>
                                            {{ __('Add new Zip & City') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <label for="country_name" class="block text-sm font-medium leading-6 dark:text-white text-gray-700">
            {{ __('Selected Country Name') }}
        </label>
        <input
            type="text"
            id="country_name"
            readonly
            x-bind:value="selectedCountryId"
            class="mt-2 block w-full px-2.5 py-1.5 text-gray-900 placeholder:dark:text-gray-500 placeholder:text-gray-400 rounded-md text-sm border-0 ring-1 ring-inset ring-gray-300 focus:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 dark:focus:ring-indigo-500 dark:ring-gray-700/50 dark:bg-white/5 dark:text-white"
            placeholder="{{ __('No country selected') }}"
        >
    </div>

    <input type="" wire:model="state_id" :value="selectedStateId">
    <input type="" wire:model="city_id" :value="selectedCity">
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


<script>
    function dropdownHandler() {
        const capitalize = (s) => s.charAt(0).toUpperCase() + s.slice(1);

        return {
            countries: @json($countries),
            states: @json($states),
            cities: @json($cities),
            selectedCountryId: @entangle('country_id') ? @entangle('country_id') : null,
            selectedStateId: @entangle('state_id') ? @entangle('state_id') : null,
            selectedCityId: @entangle('city_id') ? @entangle('city_id') : null,
            selectedStateName:'',
            selectedCityName: '',

            selectedCountry: null,
            selectedState: '',
            selectedCity:'',
            searchCountry: '',
            searchState: '',
            searchCity: '',
            openCountry: false,
            openState: false,
            openCity: false,
            disabled: false,
            currentIndexCountry: -1,
            currentIndexState: -1,
            currentIndexCity: -1,

            init() {
                // Initialisiere ausgewählte Werte basierend auf Livewire-gebundenen IDs
                if (this.selectedCountryId) {
                    const selectedCountry = this.countries.find(country => country.id === this.selectedCountryId);
                    if (selectedCountry) {
                        this.selectCountry(selectedCountry);
                    }
                }

                if (this.selectedStateId) {
                    const state = this.states.find((state) => state.id === this.selectedStateId);
                    if (state) {
                        this.selectState(state);
                    }
                }

                if (this.selectedCityId) {
                    const city = this.cities.find((city) => city.id === this.selectedCityId);
                    if (city) {
                        this.selectCity(city);
                    }
                }
            },


            initializeDefaultCountry() {
                const defaultCountry = this.countries.find(country => country.id === 1);
                if (defaultCountry) {
                    this.selectCountry(defaultCountry);
                }
            },

            filteredCountries() {
                return this.searchCountry
                    ? this.countries.filter(country => country.name.toLowerCase().includes(this.searchCountry.toLowerCase()))
                    : this.countries;
            },

            filteredStates() {
                if (!this.selectedCountry) return [];
                return this.searchState
                    ? this.states.filter(state => state.country_id === this.selectedCountry.id && state.name.toLowerCase().includes(this.searchState.toLowerCase()))
                    : this.states.filter(state => state.country_id === this.selectedCountry.id);
            },

            filteredCities() {
                if (!this.selectedState) return [];
                return this.searchCity
                    ? this.cities.filter(city => city.state_id === this.selectedState.id && city.zip_city.toLowerCase().includes(this.searchCity.toLowerCase()))
                    : this.cities.filter(city => city.state_id === this.selectedState.id);
            },

            selectCountry(country) {
                this.selectedCountry = country;
                this.selectedCountryId = country.id;
                this.selectedCountryName = country.name;

                // Update Livewire property
                $wire.set('country_id', country.id);

                this.filterStates();
                this.closeSelect('country');
            },

            selectState(state) {
                this.selectedState = state; // Das gesamte Objekt speichern
                this.selectedStateId = state.id; // ID speichern
                this.selectedStateName = state.name; // Name für die Anzeige speichern

                // Update Livewire properties
                $wire.set('state_id', state.id);
                $wire.set('state_name', state.name);

                this.filterCities(); // Filter die Städte basierend auf der Auswahl
                this.closeSelect('state');
            },


            selectCity(city) {
                this.selectedCity = city;
                this.selectedCityId = city.id;
                this.selectedCityName = city.zip_city;

                // Update Livewire property
                $wire.set('city_id', city.id);
                $wire.set('city_name', city.name);

                this.closeSelect('city');
            },

            filterStates() {
                this.selectedState = null;
                this.selectedStateId = null;
                this.selectedStateName = '';
                this.selectedCity = null;
                this.selectedCityName = '';
            },

            filterCities() {
                this.selectedCity = null;
                this.selectedCityName = '';
            },

            closeSelect(type) {
                this[`open${capitalize(type)}`] = false;
                this[`currentIndex${capitalize(type)}`] = -1;
            },

            toggleSelect(type) {
                this.closeAllSelects();
                this[`open${capitalize(type)}`] = !this[`open${capitalize(type)}`];
                this.deleteSearchField();
            },

            deleteSearchField() {
                this.searchCountry = '';
                this.searchState = '';
                this.searchCity = '';
            },

            closeAllSelects() {
                this.openCountry = false;
                this.openState = false;
                this.openCity = false;
            },

            increaseIndex(type) {
                const items = this[`filtered${capitalize(type)}s`]();
                const currentIndex = this[`currentIndex${capitalize(type)}`];
                if (currentIndex < items.length - 1) {
                    this[`currentIndex${capitalize(type)}`]++;
                }
            },

            decreaseIndex(type) {
                const currentIndex = this[`currentIndex${capitalize(type)}`];
                if (currentIndex > 0) {
                    this[`currentIndex${capitalize(type)}`]--;
                }
            },

            selectOption(type) {
                const items = this[`filtered${capitalize(type)}s`]();
                const currentIndex = this[`currentIndex${capitalize(type)}`];
                if (currentIndex >= 0 && currentIndex < items.length) {
                    this[`select${capitalize(type)}`](items[currentIndex]);
                }
            }
        };
    }

    document.addEventListener('alpine:init', () => {
        Alpine.data('dropdownHandler', dropdownHandler);
    });
</script>

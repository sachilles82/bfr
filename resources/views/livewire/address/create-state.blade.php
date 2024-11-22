<form wire:submit.prevent="save" class="bg-white dark:bg-gray-900 shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
    <div class="px-4 py-6 sm:p-8 border-b dark:border-white/10 border-white">
        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

            <!-- Country Dropdown -->
            <div class="sm:col-span-4">
                <label for="country" class="block text-sm font-medium text-gray-700 dark:text-white">Country</label>
                <div class="relative mt-2" x-data="dropdownHandler">
                    <div class="block w-full py-1.5 px-3 text-left bg-white dark:bg-gray-800 border rounded-md sm:text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" @click.prevent="toggleSelect('country')" @keydown.escape="closeSelect('country')">
                        <span x-text="selectedCountry ? selectedCountry.name : 'Select a country'"></span>
                    </div>

                    <!-- Dropdown Options -->
                    <div class="absolute z-10 mt-2 w-full bg-white dark:bg-gray-700 shadow-lg rounded-md" x-show="openCountry" @click.away="closeSelect('country')">
                        <input type="text" x-model="searchCountry" placeholder="Search..." class="w-full px-3 py-2 border-b focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <div class="max-h-60 overflow-y-auto">
                            <template x-for="country in filteredCountries()" :key="country.id">
                                <div class="cursor-pointer px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-800" @click="selectCountry(country)">
                                    <span x-text="country.name"></span>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>

            <!-- State Dropdown -->
            <div class="sm:col-span-4">
                <label for="state" class="block text-sm font-medium text-gray-700 dark:text-white">State</label>
                <div class="relative mt-2" x-data="dropdownHandler">
                    <div class="block w-full py-1.5 px-3 text-left bg-white dark:bg-gray-800 border rounded-md sm:text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" @click.prevent="toggleSelect('state')" @keydown.escape="closeSelect('state')">
                        <span x-text="selectedState ? selectedState.name : 'Select a state'"></span>
                    </div>

                    <!-- Dropdown Options -->
                    <div class="absolute z-10 mt-2 w-full bg-white dark:bg-gray-700 shadow-lg rounded-md" x-show="openState" @click.away="closeSelect('state')">
                        <input type="text" x-model="searchState" placeholder="Search..." class="w-full px-3 py-2 border-b focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <div class="max-h-60 overflow-y-auto">
                            <template x-for="state in filteredStates()" :key="state.id">
                                <div class="cursor-pointer px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-800" @click="selectState(state)">
                                    <span x-text="state.name"></span>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>

            <!-- City Dropdown -->
            <div class="sm:col-span-4">
                <label for="city" class="block text-sm font-medium text-gray-700 dark:text-white">City</label>
                <div class="relative mt-2" x-data="dropdownHandler">
                    <div class="block w-full py-1.5 px-3 text-left bg-white dark:bg-gray-800 border rounded-md sm:text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" @click.prevent="toggleSelect('city')" @keydown.escape="closeSelect('city')">
                        <span x-text="selectedCity ? selectedCity.name : 'Select a city'"></span>
                    </div>

                    <!-- Dropdown Options -->
                    <div class="absolute z-10 mt-2 w-full bg-white dark:bg-gray-700 shadow-lg rounded-md" x-show="openCity" @click.away="closeSelect('city')">
                        <input type="text" x-model="searchCity" placeholder="Search..." class="w-full px-3 py-2 border-b focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <div class="max-h-60 overflow-y-auto">
                            <template x-for="city in filteredCities()" :key="city.id">
                                <div class="cursor-pointer px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-800" @click="selectCity(city)">
                                    <span x-text="city.name"></span>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hidden Inputs -->
        <input type="hidden" wire:model.defer="country_id">
        <input type="hidden" wire:model.defer="state_id">
        <input type="hidden" wire:model.defer="city_id">

        <!-- Form Actions -->
        <div class="mt-6 flex justify-end">
            <button type="submit" class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
        </div>
    </div>
</form>

<script>
    function dropdownHandler() {
        return {
            countries: @json($countries),
            states: @json($states),
            cities: @json($cities),

            selectedCountry: null,
            selectedState: null,
            selectedCity: null,

            openCountry: false,
            openState: false,
            openCity: false,

            searchCountry: '',
            searchState: '',
            searchCity: '',

            // Filtered Lists
            filteredCountries() {
                return this.searchCountry
                    ? this.countries.filter(country => country.name.toLowerCase().includes(this.searchCountry.toLowerCase()))
                    : this.countries;
            },
            filteredStates() {
                return this.selectedCountry
                    ? this.states.filter(state => state.country_id === this.selectedCountry.id && state.name.toLowerCase().includes(this.searchState.toLowerCase()))
                    : [];
            },
            filteredCities() {
                return this.selectedState
                    ? this.cities.filter(city => city.state_id === this.selectedState.id && city.name.toLowerCase().includes(this.searchCity.toLowerCase()))
                    : [];
            },

            // Selection Handlers
            selectCountry(country) {
                this.selectedCountry = country;
                $wire.set('country_id', country.id);
                this.selectedState = null;
                this.selectedCity = null;
                this.closeSelect('country');
            },
            selectState(state) {
                this.selectedState = state;
                $wire.set('state_id', state.id);
                this.selectedCity = null;
                this.closeSelect('state');
            },
            selectCity(city) {
                this.selectedCity = city;
                $wire.set('city_id', city.id);
                this.closeSelect('city');
            },

            // UI Controls
            toggleSelect(type) {
                this[`open${type.charAt(0).toUpperCase() + type.slice(1)}`] = !this[`open${type.charAt(0).toUpperCase() + type.slice(1)}`];
            },
            closeSelect(type) {
                this[`open${type.charAt(0).toUpperCase() + type.slice(1)}`] = false;
            },
        };
    }
</script>

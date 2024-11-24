<form wire:submit.prevent="save">
    <div x-data="dependentDropdownHandler({{ $countries }}, {{ $states }}, {{ $cities }})" x-init="init()">
        <!-- Country Dropdown -->
        <div class="mt-4">
            <label class="block text-sm font-medium leading-6 dark:text-white text-gray-700" for="country">
                {{ __('Country') }}
            </label>
            <div class="relative mt-2">
                <select x-model="selectedCountryId" name="country_id" id="country_id"
                        @change="filterStates()"
                        class="block w-full py-1.5 text-left bg-white dark:bg-white/5 border-0 rounded-md sm:text-sm sm:leading-5 focus:ring-2 focus:ring-indigo-600 dark:focus-within:ring-indigo-500">
                    <option value="">{{ __('Select a country') }}</option>
                    <template x-for="country in countries" :key="country.id">
                        <option :value="country.id" x-text="country.name" :selected="country.id == selectedCountryId"></option>
                    </template>
                </select>
            </div>
        </div>

        <!-- State Dropdown -->
        <div class="sm:col-span-2">
            <label class="block text-sm font-medium leading-6 dark:text-white text-gray-700" for="state">
                {{ __('State') }}
            </label>
            <div class="relative mt-2">
                <select x-model="selectedStateId" name="state_id" id="state_id"
                        @change="filterCities()"
                        class="block w-full py-1.5 text-left bg-white dark:bg-white/5 border-0 rounded-md sm:text-sm sm:leading-5 focus:ring-2 focus:ring-indigo-600 dark:focus-within:ring-indigo-500">
                    <option value="">{{ __('Select a state') }}</option>
                    <template x-for="state in filteredStates" :key="state.id">
                        <option :value="state.id" x-text="state.name" :selected="state.id == selectedStateId"></option>
                    </template>
                </select>
            </div>
        </div>

        <!-- City Dropdown -->
        <div class="sm:col-span-2">
            <label class="block text-sm font-medium leading-6 dark:text-white text-gray-700" for="city">
                {{ __('City') }}
            </label>
            <div class="relative mt-2">
                <select x-model="selectedCityId" name="city_id" id="city_id"
                        class="block w-full py-1.5 text-left bg-white dark:bg-white/5 border-0 rounded-md sm:text-sm sm:leading-5 focus:ring-2 focus:ring-indigo-600 dark:focus-within:ring-indigo-500">
                    <option value="">{{ __('Select a city') }}</option>
                    <template x-for="city in filteredCities" :key="city.id">
                        <option :value="city.id" x-text="city.zip_city" :selected="city.id == selectedCityId"></option>
                    </template>
                </select>
            </div>
        </div>

        <!-- Street Number -->
        <div class="sm:col-span-3 sm:col-start-1">
            <x-input.text-1
                    wire:model="street_number"
                    name="street_number"
                    id="street_number"
                    placeholder="{{ __('Street & Number') }}"/>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end gap-x-1 border-t border-gray-900/10 px-4 py-4 sm:px-8">
            <x-button.back wire:navigate.hover href="{{ route('settings.departments') }}">
                {{ __('Back') }}
            </x-button.back>
            <x-button.save>
                {{ __('Update') }}
            </x-button.save>
        </div>
    </div>
</form>


<script>
    function dependentDropdownHandler(countries, states, cities) {
        return {
            countries: countries,
            states: states,
            cities: cities,

            selectedCountryId: @entangle('country_id'),
            selectedStateId: @entangle('state_id'),
            selectedCityId: @entangle('city_id'),

            filteredStates: [],
            filteredCities: [],

            init() {
                this.$nextTick(() => {
                    this.filterStates();
                    this.filterCities();
                });
            },

            filterStates() {
                this.filteredStates = this.states.filter(state => state.country_id == this.selectedCountryId);
                if (!this.filteredStates.some(state => state.id == this.selectedStateId)) {
                    this.selectedStateId = null;
                    this.selectedCityId = null;
                }
            },

            filterCities() {
                this.filteredCities = this.cities.filter(city => city.state_id == this.selectedStateId);
                if (!this.filteredCities.some(city => city.id == this.selectedCityId)) {
                    this.selectedCityId = null;
                }
            }
        };
    }

</script>

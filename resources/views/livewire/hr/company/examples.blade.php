<!-- Settings forms -->
<div class="divide-y divide-gray-900/10 dark:divide-white/5">
    <div class="grid max-w-8xl grid-cols-1 gap-x-8 gap-y-10 px-4 py-10 sm:px-6 md:grid-cols-3 lg:px-8">
        <div class="px-4 sm:px-0">
            <h2 class="text-base/7 font-semibold dark:text-white text-gray-900">{{ __('Company Information')}}</h2>
            <p class="mt-1 text-sm/6 text-gray-600 dark:text-gray-400">{{ __('Here are stored the main company information')}}</p>
        </div>

        <form
            class="bg-white dark:bg-gray-900 shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
            <div class="px-4 py-6 sm:p-8 border-b dark:border-white/10 border-white">
                <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <div class="sm:col-span-4">
                        <x-input.group label="{{ __('Company Name')}}" for="name"
                                       :error="$errors->first('company_name')"
                                       help-text="{{ __('bitte füge einen name') }}">
                            <x-input.text wire:model="company_name" name="company_name" id="company_name"
                                          placeholder="{{ __('Company Name')}}"/>
                        </x-input.group>
                    </div>




                    <div class="sm:col-span-3">
                        <label for="first-name" class="block text-sm/6 font-medium text-gray-900">First name</label>
                        <div class="mt-2">
                            <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="last-name" class="block text-sm/6 font-medium text-gray-900">Last name</label>
                        <div class="mt-2">
                            <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="country" class="block text-sm/6 font-medium text-gray-900">Country</label>
                        <div class="mt-2">
                            <select id="country" name="country" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm/6">
                                <option>United States</option>
                                <option>Canada</option>
                                <option>Mexico</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="street-address" class="block text-sm/6 font-medium text-gray-900">Street address</label>
                        <div class="mt-2">
                            <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="city" class="block text-sm/6 font-medium text-gray-900">City</label>
                        <div class="mt-2">
                            <input type="text" name="city" id="city" autocomplete="address-level2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="region" class="block text-sm/6 font-medium text-gray-900">State / Province</label>
                        <div class="mt-2">
                            <input type="text" name="region" id="region" autocomplete="address-level1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="postal-code" class="block text-sm/6 font-medium text-gray-900">ZIP / Postal code</label>
                        <div class="mt-2">
                            <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                </div>





                <!-- Include these scripts somewhere on the page: -->
                <script defer src="https://unpkg.com/@alpinejs/ui@3.14.3-beta.0/dist/cdn.min.js"></script>
                <script defer src="https://unpkg.com/@alpinejs/focus@3.14.3/dist/cdn.min.js"></script>
                <script defer src="https://unpkg.com/alpinejs@3.14.3/dist/cdn.min.js"></script>
                <div class="sm:col-span-4">
                    <div class="relative text-black" x-data="selectmenu(datalist())" @click.away="close()">
                        <input type="text" x-model="selectedkey" name="selectfield" id="selectfield"
                               class="hidden">
                        <span class="inline-block w-full rounded-md shadow-sm"
                              @click="toggle(); $nextTick(() => $refs.filterinput.focus());">
                                    <button
                                        class="relative z-0 w-full py-2 pl-3 pr-10 text-left transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md cursor-default focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                        <span class="block truncate" x-text="selectedlabel ?? 'Please Select'"></span>

                                        <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                                                <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                    </button>
                                </span>

                        <div x-show="state" class="absolute z-10 w-full mt-1 bg-white rounded-md shadow-lg p-2">
                            <input type="text" class="w-full rounded-md py-1 px-2 mb-1 border border-gray-400"
                                   x-model="filter" x-ref="filterinput">
                            <ul
                                class="py-1 overflow-auto text-base leading-6 rounded-md shadow-xs max-h-60 focus:outline-none sm:text-sm sm:leading-5">

                                <template x-for="(value, key) in getlist()" :key="key">

                                    <li @click="select(value, key)" :class="{'bg-gray-100': isselected(key)}"
                                        class="relative py-1 pl-3 mb-1 text-gray-900 select-none pr-9 hover:bg-gray-100 cursor-pointer rounded-md">
                                        <span x-text="value" class="block font-normal truncate"></span>

                                        <span x-show="isselected(key)"
                                              class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-700">
                                                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                                </span>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>

                    <script>

                        function selectmenu(datalist) {
                            return {
                                state: false,
                                filter: '',
                                list: datalist,
                                selectedkey: null,
                                selectedlabel: null,
                                toggle: function () {
                                    this.state = !this.state;
                                    this.filter = '';
                                },
                                close: function () {
                                    this.state = false;
                                },
                                select: function (value, key) {
                                    if (this.selectedkey == key) {
                                        this.selectedlabel = null;
                                        this.selectedkey = null;
                                    } else {
                                        this.selectedlabel = value;
                                        this.selectedkey = key;
                                        this.state = false;
                                    }
                                },
                                isselected: function (key) {
                                    return this.selectedkey == key;
                                },
                                getlist: function () {
                                    if (this.filter == '') {
                                        return this.list;
                                    }
                                    var filtered = Object.entries(this.list).filter(([key, value]) => value.toLowerCase().includes(this.filter.toLowerCase()));

                                    var result = Object.fromEntries(filtered);
                                    return result;
                                }
                            };
                        }

                        function datalist() {
                            return {
                                AF: 'Afghanistan',
                                AX: 'Aland Islands',
                                AL: 'Albania',
                                DZ: 'Algeria',
                                AS: 'American Samoa',
                                AD: 'Andorra',
                                AO: 'Angola',
                                AI: 'Anguilla',
                                AQ: 'Antarctica',
                                AG: 'Antigua And Barbuda',
                                AR: 'Argentina',
                                AM: 'Armenia',
                                AW: 'Aruba',
                                AU: 'Australia',
                                AT: 'Austria',
                                AZ: 'Azerbaijan',
                                BS: 'Bahamas',
                                BH: 'Bahrain',
                                BD: 'Bangladesh',
                                BB: 'Barbados',
                                BY: 'Belarus',
                                BE: 'Belgium',
                                BZ: 'Belize',
                                BJ: 'Benin',
                                BM: 'Bermuda',
                                BT: 'Bhutan',
                                BO: 'Bolivia',
                                BA: 'Bosnia And Herzegovina',
                                BW: 'Botswana',
                                BV: 'Bouvet Island',
                                BR: 'Brazil',
                                IO: 'British Indian Ocean Territory',
                                BN: 'Brunei Darussalam',
                                BG: 'Bulgaria',
                                BF: 'Burkina Faso',
                                BI: 'Burundi',
                                KH: 'Cambodia',
                                CM: 'Cameroon',
                                CA: 'Canada',
                                CV: 'Cape Verde',
                                KY: 'Cayman Islands',
                                CF: 'Central African Republic',
                                TD: 'Chad',
                                CL: 'Chile',
                                CN: 'China',
                                CX: 'Christmas Island',
                                CC: 'Cocos (Keeling) Islands',
                                CO: 'Colombia',
                                KM: 'Comoros',
                                CG: 'Congo',
                                CD: 'Congo, Democratic Republic',
                                CK: 'Cook Islands',
                                CR: 'Costa Rica',
                                CI: 'Cote D\'Ivoire',
                                HR: 'Croatia',
                                CU: 'Cuba',
                                CY: 'Cyprus',
                                CZ: 'Czech Republic',
                                DK: 'Denmark',
                                DJ: 'Djibouti',
                                DM: 'Dominica',
                                DO: 'Dominican Republic',
                                EC: 'Ecuador',
                                EG: 'Egypt',
                                SV: 'El Salvador',
                                GQ: 'Equatorial Guinea',
                                ER: 'Eritrea',
                                EE: 'Estonia',
                                ET: 'Ethiopia',
                                FK: 'Falkland Islands (Malvinas)',
                                FO: 'Faroe Islands',
                                FJ: 'Fiji',
                                FI: 'Finland',
                                FR: 'France',
                                GF: 'French Guiana',
                                PF: 'French Polynesia',
                                TF: 'French Southern Territories',
                                GA: 'Gabon',
                                GM: 'Gambia',
                                GE: 'Georgia',
                                DE: 'Germany',
                                GH: 'Ghana',
                                GI: 'Gibraltar',
                                GR: 'Greece',
                                GL: 'Greenland',
                                GD: 'Grenada',
                                GP: 'Guadeloupe',
                                GU: 'Guam',
                                GT: 'Guatemala',
                                GG: 'Guernsey',
                                GN: 'Guinea',
                                GW: 'Guinea-Bissau',
                                GY: 'Guyana',
                                HT: 'Haiti',
                                HM: 'Heard Island & Mcdonald Islands',
                                VA: 'Holy See (Vatican City State)',
                                HN: 'Honduras',
                                HK: 'Hong Kong',
                                HU: 'Hungary',
                                IS: 'Iceland',
                                IN: 'India',
                                ID: 'Indonesia',
                                IR: 'Iran, Islamic Republic Of',
                                IQ: 'Iraq',
                                IE: 'Ireland',
                                IM: 'Isle Of Man',
                                IL: 'Israel',
                                IT: 'Italy',
                                JM: 'Jamaica',
                                JP: 'Japan',
                                JE: 'Jersey',
                                JO: 'Jordan',
                                KZ: 'Kazakhstan',
                                KE: 'Kenya',
                                KI: 'Kiribati',
                                KR: 'Korea',
                                KW: 'Kuwait',
                                KG: 'Kyrgyzstan',
                                LA: 'Lao People\'s Democratic Republic',
                                LV: 'Latvia',
                                LB: 'Lebanon',
                                LS: 'Lesotho',
                                LR: 'Liberia',
                                LY: 'Libyan Arab Jamahiriya',
                                LI: 'Liechtenstein',
                                LT: 'Lithuania',
                                LU: 'Luxembourg',
                                MO: 'Macao',
                                MK: 'Macedonia',
                                MG: 'Madagascar',
                                MW: 'Malawi',
                                MY: 'Malaysia',
                                MV: 'Maldives',
                                ML: 'Mali',
                                MT: 'Malta',
                                MH: 'Marshall Islands',
                                MQ: 'Martinique',
                                MR: 'Mauritania',
                                MU: 'Mauritius',
                                YT: 'Mayotte',
                                MX: 'Mexico',
                                FM: 'Micronesia, Federated States Of',
                                MD: 'Moldova',
                                MC: 'Monaco',
                                MN: 'Mongolia',
                                ME: 'Montenegro',
                                MS: 'Montserrat',
                                MA: 'Morocco',
                                MZ: 'Mozambique',
                                MM: 'Myanmar',
                                NA: 'Namibia',
                                NR: 'Nauru',
                                NP: 'Nepal',
                                NL: 'Netherlands',
                                AN: 'Netherlands Antilles',
                                NC: 'New Caledonia',
                                NZ: 'New Zealand',
                                NI: 'Nicaragua',
                                NE: 'Niger',
                                NG: 'Nigeria',
                                NU: 'Niue',
                                NF: 'Norfolk Island',
                                MP: 'Northern Mariana Islands',
                                NO: 'Norway',
                                OM: 'Oman',
                                PK: 'Pakistan',
                                PW: 'Palau',
                                PS: 'Palestinian Territory, Occupied',
                                PA: 'Panama',
                                PG: 'Papua New Guinea',
                                PY: 'Paraguay',
                                PE: 'Peru',
                                PH: 'Philippines',
                                PN: 'Pitcairn',
                                PL: 'Poland',
                                PT: 'Portugal',
                                PR: 'Puerto Rico',
                                QA: 'Qatar',
                                RE: 'Reunion',
                                RO: 'Romania',
                                RU: 'Russian Federation',
                                RW: 'Rwanda',
                                BL: 'Saint Barthelemy',
                                SH: 'Saint Helena',
                                KN: 'Saint Kitts And Nevis',
                                LC: 'Saint Lucia',
                                MF: 'Saint Martin',
                                PM: 'Saint Pierre And Miquelon',
                                VC: 'Saint Vincent And Grenadines',
                                WS: 'Samoa',
                                SM: 'San Marino',
                                ST: 'Sao Tome And Principe',
                                SA: 'Saudi Arabia',
                                SN: 'Senegal',
                                RS: 'Serbia',
                                SC: 'Seychelles',
                                SL: 'Sierra Leone',
                                SG: 'Singapore',
                                SK: 'Slovakia',
                                SI: 'Slovenia',
                                SB: 'Solomon Islands',
                                SO: 'Somalia',
                                ZA: 'South Africa',
                                GS: 'South Georgia And Sandwich Isl.',
                                ES: 'Spain',
                                LK: 'Sri Lanka',
                                SD: 'Sudan',
                                SR: 'Suriname',
                                SJ: 'Svalbard And Jan Mayen',
                                SZ: 'Swaziland',
                                SE: 'Sweden',
                                CH: 'Switzerland',
                                SY: 'Syrian Arab Republic',
                                TW: 'Taiwan',
                                TJ: 'Tajikistan',
                                TZ: 'Tanzania',
                                TH: 'Thailand',
                                TL: 'Timor-Leste',
                                TG: 'Togo',
                                TK: 'Tokelau',
                                TO: 'Tonga',
                                TT: 'Trinidad And Tobago',
                                TN: 'Tunisia',
                                TR: 'Turkey',
                                TM: 'Turkmenistan',
                                TC: 'Turks And Caicos Islands',
                                TV: 'Tuvalu',
                                UG: 'Uganda',
                                UA: 'Ukraine',
                                AE: 'United Arab Emirates',
                                GB: 'United Kingdom',
                                US: 'United States',
                                UM: 'United States Outlying Islands',
                                UY: 'Uruguay',
                                UZ: 'Uzbekistan',
                                VU: 'Vanuatu',
                                VE: 'Venezuela',
                                VN: 'Viet Nam',
                                VG: 'Virgin Islands, British',
                                VI: 'Virgin Islands, U.S.',
                                WF: 'Wallis And Futuna',
                                EH: 'Western Sahara',
                                YE: 'Yemen',
                                ZM: 'Zambia',
                                ZW: 'Zimbabwe'
                            };
                        }
                    </script>
                </div>



                <div class="sm:col-span-4">
                    <flux:label badge="Required">{{ __('Telefon')}}</flux:label>
                    <x-input.group label="" for="phone" :error="$errors->first('phone')"
                                   help-text="{{ __('bitte füge einen name') }}">
                        <x-input.phone x-mask="(+99) 999 99 99" wire:model="phone" name="phone" id="phone"
                                       placeholder="(+41) 401 11 42"/>
                    </x-input.group>
                </div>


                {{--                    x-mask="(999) 999-9999" name="phone" autocomplete="tel-national" placeholder="(999) 999-9999"--}}
                <div class="sm:col-span-4">
                    <flux:select variant="listbox" searchable placeholder="Wähle Branche...">
                        @foreach(\App\Models\HR\Industry::all() as $industry)
                            <flux:option value="{{ $industry->id }}">{{ $industry->name }}</flux:option>
                        @endforeach
                    </flux:select>
                </div>

                <flux:radio.group variant="segmented" label="Unternehmen">
                    <flux:radio label="AG"/>
                    <flux:radio label="GmbH"/>
                    <flux:radio label="Einzelfirma"/>
                </flux:radio.group>
                <div class="sm:col-span-3">
                    <label for="first-name" class="block text-sm/6 font-medium text-white">First name</label>
                    <div class="mt-2">
                        <input type="text" name="first-name" id="first-name" autocomplete="given-name"
                               class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm/6">
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="last-name" class="block text-sm/6 font-medium text-white">Last name</label>
                    <div class="mt-2">
                        <input type="text" name="last-name" id="last-name" autocomplete="family-name"
                               class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm/6">
                    </div>
                </div>

                <div class="col-span-full">
                    <flux:field>
                        <flux:label badge="Required">Email</flux:label>

                        <flux:input type="email" required/>

                        <flux:error name="email"/>
                    </flux:field>
                </div>

                <div class="sm:col-span-4">

                    <div x-data class="flex w-full max-w-xs flex-col gap-1 text-slate-700 dark:text-slate-300">
                        <label for="phoneInput" class="w-fit pl-0.5 text-sm">Phone</label>
                        <input id="phoneInput" type="text"
                               class="w-full rounded-xl border border-slate-300 bg-slate-100 px-2 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:focus-visible:outline-blue-600"
                               x-mask="(999) 999-9999" name="phone" autocomplete="tel-national"
                               placeholder="(999) 999-9999"/>
                    </div>

                    {{--                        <flux:field>--}}
                    {{--                            <flux:label badge="Optional">Phone number</flux:label>--}}

                    {{--                            <flux:input type="phone" placeholder="(+41) 44 492 70 73" mask="(+99) 99 999 99 99"/>--}}

                    {{--                            <flux:description>Must be at least 8 characters long, include an uppercase letter, a number, and a special character.</flux:description>--}}


                    {{--                            <flux:error name="phone"/>--}}
                    {{--                        </flux:field>--}}
                    <x-datepicker.date-range-picker/>

                    {{--                                                <x-datepicker.date-single-picker/>--}}
                </div>

                <div class="col-span-full">
                    <livewire:address.depend-dropdown/>
                </div>

                <div class="col-span-full">
                    <label for="photo"
                           class="block text-sm/6 font-medium text-gray-900">Photo</label>
                    <div class="mt-2 flex items-center gap-x-3">
                        <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                             aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                  d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                                  clip-rule="evenodd"/>
                        </svg>
                        <button type="button"
                                class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                            Change
                        </button>
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="cover-photo" class="block text-sm/6 font-medium text-gray-900">Cover
                        photo</label>
                    <div
                        class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                        <div class="text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24"
                                 fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd"
                                      d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                      clip-rule="evenodd"/>
                            </svg>
                            <div class="mt-4 flex text-sm/6 text-gray-600">
                                <label for="file-upload"
                                       class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="file-upload" name="file-upload" type="file"
                                           class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs/5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
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
</div>
</div>

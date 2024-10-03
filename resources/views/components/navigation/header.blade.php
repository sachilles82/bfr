{{--<flux:header container class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700 w-full">--}}
{{--    <div class="relative z-10 flex h-16 flex-shrink-0 border-b border-gray-200 bg-white shadow-sm">--}}
{{--        <button x-on:click="document.body.hasAttribute('data-show-stashed-sidebar') ? document.body.removeAttribute('data-show-stashed-sidebar') : document.body.setAttribute('data-show-stashed-sidebar', '')"--}}
{{--                type="button" class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">--}}
{{--            <span class="sr-only">Open sidebar</span>--}}
{{--            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">--}}
{{--                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />--}}
{{--            </svg>--}}
{{--        </button>--}}
{{--        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />--}}
{{--        <div class="flex flex-1 justify-between px-4 sm:px-6">--}}
{{--            <div class="flex flex-1">--}}
{{--                <form class="flex w-full md:ml-0" action="#" method="GET">--}}
{{--                    <label for="search-field" class="sr-only">Search all files</label>--}}
{{--                    <div class="relative w-full text-gray-400 focus-within:text-gray-600">--}}
{{--                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center">--}}
{{--                            <svg class="h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
{{--                                <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <input name="search-field" id="search-field" class="h-full w-full border-0 py-2 pl-8 pr-3 text-gray-900 focus:outline-none focus:ring-0 focus:placeholder:text-gray-400 sm:text-sm" placeholder="Search" type="search">--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--            <div class="ml-2 flex items-center space-x-4 sm:ml-6 sm:space-x-6">--}}
{{--                <!-- Profile dropdown -->--}}
{{--                <div class="relative flex-shrink-0">--}}
{{--                    <div>--}}
{{--                        <button type="button" class="flex rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" id="user-menu-button" aria-expanded="false" aria-haspopup="true">--}}
{{--                            <span class="sr-only">Open user menu</span>--}}
{{--                            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="">--}}
{{--                        </button>--}}
{{--                    </div>--}}

{{--                    <!----}}
{{--                      Dropdown menu, show/hide based on menu state.--}}

{{--                      Entering: "transition ease-out duration-100"--}}
{{--                        From: "transform opacity-0 scale-95"--}}
{{--                        To: "transform opacity-100 scale-100"--}}
{{--                      Leaving: "transition ease-in duration-75"--}}
{{--                        From: "transform opacity-100 scale-100"--}}
{{--                        To: "transform opacity-0 scale-95"--}}
{{--                    -->--}}
{{--                    <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">--}}
{{--                        <!-- Active: "bg-gray-100", Not Active: "" -->--}}
{{--                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>--}}
{{--                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Sign out</a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <button type="button" class="flex items-center justify-center rounded-full bg-indigo-600 p-1 text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">--}}
{{--                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />--}}
{{--                    </svg>--}}
{{--                    <span class="sr-only">Add file</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</flux:header>--}}


<flux:header container class="bg-gray-50 dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700 dark:border-white/5">
    <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left"/>

    {{--    <flux:brand href="#" logo="https://fluxui.dev/img/demo/logo.png" name="Acme Inc." class="max-lg:hidden dark:hidden" />--}}
    {{--    <flux:brand href="#" logo="https://fluxui.dev/img/demo/dark-mode-logo.png" name="Acme Inc." class="max-lg:!hidden hidden dark:flex" />--}}


    <flux:spacer/>
    <flux:navbar class="mr-4">
        <flux:navbar.item icon="magnifying-glass" href="#" label="Search"/>
        <button x-data="{}"
                @click="document.documentElement.classList.toggle('dark'); localStorage.theme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';"
                class="hidden sm:inline-flex items-center px-1 py-1 text-sm leading-4 font-medium rounded-full text-gray-400 transition ease-in-out duration-150 dark:text-gray-400">
            <svg class="dark:hidden w-6 h-6 hover:text-indigo-600" fill="currentColor"
                 viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
            </svg>
            <svg class="hidden dark:block w-6 h-6 hover:text-yellow-500" fill="currentColor"
                 viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                    fill-rule="evenodd" clip-rule="evenodd"></path>
            </svg>
        </button>
        <flux:navbar.item class="max-lg:hidden" icon="cog-6-tooth" href="#" label="Settings"/>
        <flux:navbar.item class="max-lg:hidden" icon="information-circle" href="#" label="Help"/>
    </flux:navbar>

    <!-- Teams Dropdown -->
    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
        <flux:dropdown position="top" align="start">
            <flux:button variant="ghost"
                         icon-trailing="chevron-up-down">{{ Auth::user()->currentTeam->name }}</flux:button>
            <flux:menu class="w-64">
                <!-- Team Management -->
                <flux:menu.heading>{{ __('Manage Team') }}</flux:menu.heading>

                <flux:menu.item wire:navigate.hover href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                    <flux:icon.cog-6-tooth variant="outline" class="size-5"/>{{ __('Team Settings') }}
                </flux:menu.item>

                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                    <flux:menu.item wire:navigate.hover href="{{ route('teams.create') }}">
                        <flux:icon.plus variant="outline" class="size-5"/>{{ __('Create Team') }}
                    </flux:menu.item>
                @endcan

                <!-- Team Switcher -->
                @if (Auth::user()->allTeams()->count() > 1)
                    <div class="border-t border-gray-200 dark:border-gray-600"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-switchable-team :team="$team"/>
                    @endforeach
                @endif
                <flux:menu.separator/>


            </flux:menu>
        </flux:dropdown>
    @endif

    <flux:dropdown position="top" align="start">

        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <button
                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                     alt="{{ Auth::user()->name }}"/>
            </button>
        @else
            <span class="inline-flex rounded-md">
             <button type="button"
                     class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                                        </svg>
                                    </button>
                                </span>
        @endif

        <flux:menu class="w-64">

            <flux:menu.heading>{{ __('Manage Account') }}</flux:menu.heading>

            <flux:menu.item wire:navigate.hover href="{{ route('profile.show') }}">
                <flux:icon.user variant="outline" class="size-5"/>{{ __('Profile') }}
            </flux:menu.item>

            <flux:menu.separator/>

            <flux:menu.heading> {{ __('Finance') }}</flux:menu.heading>

            <flux:menu.item wire:navigate.hover href="/billing">
                <flux:icon.credit-card variant="outline" class="size-5"/>{{ __('Subscription') }}
            </flux:menu.item>

            <flux:menu.item wire:navigate.hover href="/billing">
                <flux:icon.banknotes variant="outline" class="size-5"/> {{ __('Payments') }}
            </flux:menu.item>


            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <flux:menu.separator/>

                <flux:menu.heading> {{ __('Security') }}</flux:menu.heading>

                <flux:menu.item wire:navigate.hover href="{{ route('api-tokens.index') }}">
                    <flux:icon.lock-closed variant="outline" class="size-5"/>
                    {{ __('API Tokens') }}
                </flux:menu.item>
            @endif
            <flux:menu.separator/>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf

                <flux:menu.item variant="danger" href="{{ route('logout') }}"
                                @click.prevent="$root.submit();">
                    <flux:icon.arrow-right-start-on-rectangle variant="outline" class="size-5"/>
                    {{ __('Log Out') }}
                </flux:menu.item>
            </form>
        </flux:menu>
    </flux:dropdown>
</flux:header>

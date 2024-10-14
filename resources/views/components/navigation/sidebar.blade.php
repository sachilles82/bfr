<div class="hidden w-28 overflow-y-auto bg-indigo-700 dark:bg-gray-900 md:block border-r border-white/5">

    <div class="flex w-28 flex-col items-center py-6">
        <div class="flex flex-shrink-0 items-center">
            <img class="h-8 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=white" alt="Your Company">
        </div>
        <div class="mt-6 w-full flex-1 space-y-1 px-2">

            <a href="{{ route('dashboard') }}" wire:navigate.hover
               class="{{ request()->routeIs('dashboard') ? 'text-white bg-indigo-800 dark:text-white dark:bg-gray-800' : 'dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-800 text-indigo-100 hover:bg-indigo-800 hover:text-white' }} group flex w-full flex-col items-center rounded-md p-3 text-xs font-medium">
                <svg
                    class="{{ request()->routeIs('dashboard') ? 'dark:text-white dark:bg-gray-800' : 'text-indigo-300 dark:text-gray-400 group-hover:text-white' }} h-6 w-6"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                </svg>
                <span class="mt-2">{{ __('Dashboard') }}</span>
            </a>

            <a href="{{ route('settings.roles') }}" wire:navigate.hover
               class="{{ request()->routeIs(['settings.roles', 'settings.departments', 'settings.departments.show']) ? 'text-white bg-indigo-800 dark:text-white dark:bg-gray-800' : 'dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-800 text-indigo-100 hover:bg-indigo-800 hover:text-white' }} group flex w-full flex-col items-center rounded-md p-3 text-xs font-medium">
                <svg
                    class="{{ request()->routeIs(['settings.roles', 'settings.departments', 'settings.departments.show']) ? 'dark:text-white dark:bg-gray-800' : 'text-indigo-300 dark:text-gray-400 group-hover:text-white' }} h-6 w-6"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4.5 12a7.5 7.5 0 0015 0m-15 0a7.5 7.5 0 1115 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077l1.41-.513m14.095-5.13l1.41-.513M5.106 17.785l1.15-.964m11.49-9.642l1.149-.964M7.501 19.795l.75-1.3m7.5-12.99l.75-1.3m-6.063 16.658l.26-1.477m2.605-14.772l.26-1.477m0 17.726l-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205L12 12m6.894 5.785l-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864l-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495"/>
                </svg>
                <span class="mt-2">{{ __('Settings')}}</span>
            </a>
        </div>
    </div>
</div>

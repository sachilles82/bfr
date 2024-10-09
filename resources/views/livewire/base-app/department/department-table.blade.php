<div>
    <div class="xl:mt-2 mt-1 h-full flex flex-col items-center justify-between space-y-3 md:flex-row md:space-y-0 md:space-x-4">
        <div class="w-full lg:w-1/3 md:w-1/2">
            <x-table.filters.search wire:model.live.debounce.400ms="search"/>
        </div>
        <div class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
            <div class="flex items-center justify-end w-full space-x-1 md:w-auto">
                <div class="flex space-x-1" x-show="$wire.selectedIds.length > 0" x-cloak>
                    <div class="hidden sm:flex items-center justify-center">
                        <span class="text-indigo-600 dark:text-indigo-400">
                            <span x-text="$wire.selectedIds.length" class="pr-2 text-sm font-semibold text-indigo-500 border-r border-gray-200 dark:border-gray-700 dark:text-indigo-500"></span>
                            <span class="pl-2 pr-2">
                                {{ __('Selected') }}
                            </span>
                        </span>
                    </div>
                </div>
                <x-table.filters.reset-filters wire:click="resetFilters"/>
                <x-table.filters.per-page/>
            </div>
        </div>
    </div>

    <x-table.container>
        <x-table.main>
            <x-slot:head>
                <x-table.th.check-all/>
                <x-table.th.notsort>
                    {{ __('Department') }}
                </x-table.th.notsort>
                <x-table.th.notsort>
                    {{ __('Team') }}
                </x-table.th.notsort>
                <x-table.th.notsort>
                    {{ __('Created By') }}
                </x-table.th.notsort>
                <x-table.th.actions/>
            </x-slot:head>
            <x-slot:body>
                @forelse($departments as $department)
                    <tr
                        wire:key="{{ $department->id }}"
                        x-on:check-all.window="checked = $event.detail"
                        x-on:update-table.window="checked = false"
                        x-data="{ checked: false }"
                        x-init="checked = $wire.selectedIds.includes('{{ $department->id }}')"
                        x-bind:class="{
                            'bg-gray-100 dark:bg-gray-800/50': checked,
                            'hover:bg-gray-100 dark:hover:bg-gray-800/50': !checked
                        }"
                    >
                        <td class="relative px-7 sm:w-12 sm:px-6">
                            <div x-show="checked" x-cloak class="absolute inset-y-0 left-0 w-0.5 dark:bg-indigo-500 bg-indigo-600"></div>
                            <x-table.tr.checkbox x-model="checked" wire:model.live="selectedIds" value="{{ $department->id }}"/>
                        </td>
                        <x-table.tr.cell>
                            <div x-show="checked" x-cloak>
                                <div
                                    class="font-medium text-gray-500 dark:text-gray-400">
                                    {{$department->name}}
                                </div>
                            </div>
                            <div x-show="!checked">
                                <a wire:navigate.hover
                                   href=""
                                   class="font-medium text-gray-900 dark:text-gray-300
                                                hover:text-indigo-700 decoration-1 hover:underline
                                                dark:hover:text-indigo-300">
                                    {{$department->name}}
                                </a>
                            </div>
                        </x-table.tr.cell>
                        <x-table.tr.cell>{{ $department->team->name }}</x-table.tr.cell>
                        <x-table.tr.cell>{{ $department->creator->name }}</x-table.tr.cell>
                        <td x-show="!checked" class="whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            <!-- Edit Dropdown -->
                            <flux:dropdown position="left" align="start">
                                <flux:button size="sm" variant="ghost" icon="ellipsis-horizontal" />
                                <flux:navmenu>
                                    <flux:navmenu.item href="#" icon="user">Account</flux:navmenu.item>
                                    <flux:navmenu.item href="#" icon="building-storefront">Profile</flux:navmenu.item>
                                    <flux:navmenu.item href="#" icon="credit-card">Billing</flux:navmenu.item>
                                    <flux:navmenu.item href="#" icon="arrow-right-start-on-rectangle">Logout</flux:navmenu.item>
                                    <flux:navmenu.item href="#" icon="trash" variant="danger">Delete</flux:navmenu.item>
                                </flux:navmenu>
                            </flux:dropdown>
                        </td>
                        <td x-show="checked" x-cloak
                            class="whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            <x-table.tr.dummy-button>
                                <x-icon.dummy-ellipsis/>
                            </x-table.tr.dummy-button>
                        </td>
                    </tr>
                @empty
                    <x-table.tr.empty>
                        <x-table.tr.empty-cell colspan="6"/>
                    </x-table.tr.empty>
                @endforelse
            </x-slot:body>
            <x-slot:pagination>
                {{ $departments->links() }}
            </x-slot:pagination>
        </x-table.main>
    </x-table.container>
</div>

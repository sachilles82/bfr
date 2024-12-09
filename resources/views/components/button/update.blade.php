<div
    class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 dark:border-white/5 px-4 py-4 sm:px-8">
    <button {{ $attributes->merge(['type' => 'submit', 'class' => 'ml-2 inline-flex items-center justify-center px-4 py-2 bg-indigo-600 dark:bg-indigo-500 border border-transparent rounded-md text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 dark:hover:bg-indigo-400 active:bg-indigo-700 focus:outline-none focus:ring-2 dark:focus-visible:outline-indigo-500 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </button>
</div>

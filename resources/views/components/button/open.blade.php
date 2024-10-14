<button @click="modalOpen =!modalOpen" {{ $attributes }}
class="w-full inline-flex items-center justify-center px-3 py-2 bg-indigo-600 dark:bg-indigo-500 dark:hover:bg-indigo-400 dark:focus-visible:outline-indigo-500 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
>
    <x-icon.plus class="w-4 h-4 -ml-1 mr-2"/>
    {{ $slot }}
</button>

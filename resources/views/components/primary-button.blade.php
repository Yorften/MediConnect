<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest focus:bg-gray-700 active:bg-gray-900 dark:active:bg-blue-600 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:bg-blue-600 dark:focus:text-white dark:active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

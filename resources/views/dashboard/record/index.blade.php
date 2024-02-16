<x-dashboard-layout>
    <div class="w-11/12 mx-auto text-gray-800 dark:text-gray-200">
        <div class="flex items-center justify-between w-full">
            <ul class="flex flex-wrap items-center">
                <li class="inline-flex items-center">
                    <a href="/" class="text-gray-600 dark:text-gray-200 hover:text-blue-500">
                        <svg class="w-5 h-auto fill-current " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="#000000">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path
                                d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z" />
                        </svg>
                    </a>
                    <span class="mx-4 h-auto text-gray-400 font-medium">/</span>
                </li>
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}"
                        class="text-gray-600 dark:text-gray-200 hover:text-blue-500">Dashboard</a>
                    <span class="mx-4 h-auto text-gray-400 font-medium">/</span>
                </li>
                <li class="inline-flex items-center">
                    <a href="{{ route('records') }}"
                        class="text-gray-600 dark:text-gray-200 hover:text-blue-500">Medical Records</a>
                </li>
            </ul>
        </div>
        <div class="w-full flex justify-between items-center px-2 mt-4">
            <p class="text-none text-xl font-semibold indent-4 text-gray-800 dark:text-gray-200">All records</p>
            <a href="{{ route('record.create') }}"
                class="text-gray-800 dark:text-gray-200 text-xl font-semibold hover:underline">Add
                a record</a>
        </div>
    </div>
    @unless (count($records) == 0)
        @foreach ($records as $record)
            {{-- cards --}}
        @endforeach
    @else
        <p class="w-full flex justify-center mt-20 font-bold text-2xl text-gray-800 dark:text-gray-200">No records found</p>
    @endunless
</x-dashboard-layout>

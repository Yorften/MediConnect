<x-app-layout>
    <div class="w-3/4 mx-auto min-h-[70vh] text-gray-800 dark:text-gray-200">
        <div class="flex items-center flex-wrap mt-10">
            <ul class="flex items-center">
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
                    <a href="{{ route('favourites') }}"
                        class="text-gray-600 dark:text-gray-200 hover:text-blue-500">Favourites</a>
                </li>
            </ul>
        </div>
        {{-- content --}}
        @unless (count($favourites) == 0)
            <div class="flex flex-col items-center justify-center gap-4 mt-10 mb-10">
                @foreach ($favourites as $favourite)
                    <x-favourite-card :favourite="$favourite" />
                @endforeach
            </div>
        @else
            <p class="w-full flex flex-col items-center justify-center font-bold text-2xl min-h-[30vh] h-full">No
                doctors in your favourites</p>
        @endunless
        <div class="mt-6 py-4">{{ $favourites->links() }}</div>
    </div>
</x-app-layout>

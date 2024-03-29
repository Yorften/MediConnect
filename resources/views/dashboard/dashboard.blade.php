<x-dashboard-layout>
    <div class="w-11/12 mx-auto">
        <div class="flex items-center flex-wrap">
            <ul class="flex flex-wrap items-center border-red-600">
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
                </li>
            </ul>
        </div>
        @hasrole('admin')
            <div class="px-6 py-8">
                <div class="w-full px-2">
                    <div class="bg-white dark:bg-gray-800 rounded-3xl p-8 mb-5 dark:text-gray-200">
                        <h1 class="text-3xl font-bold mb-10">Lorem ipsum dolor sit amet</h1>
                        <div class="flex items-center justify-between">
                            <div class="flex items-stretch">
                                <div class="text-gray-400 text-xs">Members<br>connected</div>
                                <div class="h-100 border-l mx-4"></div>
                                <div class="flex flex-nowrap -space-x-3">
                                    <div class="h-9 w-9">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="https://ui-avatars.com/api/?background=random">
                                    </div>
                                    <div class="h-9 w-9">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="https://ui-avatars.com/api/?background=random">
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-x-2">
                                <button type="button"
                                    class="inline-flex items-center justify-center h-9 px-3 rounded-xl border hover:border-gray-400 dark:hover:border-gray-300 text-gray-800 dark:text-gray-200 dark:hover:text-gray-100 hover:text-gray-900 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        fill="currentColor" class="bi bi-chat-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z" />
                                    </svg>
                                </button>
                                <button type="button"
                                    class="inline-flex items-center justify-center h-9 px-5 rounded-xl bg-gray-900 text-gray-300 hover:text-white text-sm font-semibold transition">
                                    Open
                                </button>
                            </div>
                        </div>

                        <hr class="my-10">

                        <div class="grid grid-cols-2 gap-x-20">
                            <div>
                                <h2 class="text-2xl font-bold mb-4">Stats</h2>

                                <div class="grid grid-cols-2 gap-4">
                                    <div class="col-span-2">
                                        <div class="p-4 bg-green-200 rounded-xl">
                                            <div class="font-bold text-xl text-gray-800 leading-none">Good day, <br>Kristin
                                            </div>
                                            <div class="mt-5">
                                                <button type="button"
                                                    class="inline-flex shadow items-center justify-center py-2 px-3 rounded-xl bg-white text-gray-800 hover:text-blue-500 text-sm font-semibold transition">
                                                    Start tracking
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-4 bg-yellow-100 rounded-xl text-gray-800">
                                        <div class="font-bold text-2xl leading-none">20</div>
                                        <div class="mt-2">Tasks finished</div>
                                    </div>
                                    <div class="p-4 bg-yellow-100 rounded-xl text-gray-800">
                                        <div class="font-bold text-2xl leading-none">5,5</div>
                                        <div class="mt-2">Tracked hours</div>
                                    </div>
                                    <div class="col-span-2">
                                        <div class="p-4 bg-purple-100 rounded-xl text-gray-800">
                                            <div class="font-bold text-xl leading-none">Your daily plan</div>
                                            <div class="mt-2">5 of 8 completed</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold mb-4">Your tasks today</h2>

                                <div class="space-y-4">
                                    <div class="p-4 bg-white dark:bg-gray-100 border rounded-xl text-gray-800 space-y-2">
                                        <div class="flex justify-between">
                                            <div class="text-gray-400 text-xs">Number 10</div>
                                            <div class="text-gray-400 text-xs">4h</div>
                                        </div>
                                        <a href="javascript:void(0)"
                                            class="font-bold hover:text-yellow-800 hover:underline">Blog and social
                                            posts</a>
                                        <div class="text-sm text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" class="text-gray-800 inline align-middle mr-1"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                            </svg>Deadline is today
                                        </div>
                                    </div>
                                    <div class="p-4 bg-white dark:bg-gray-100 border rounded-xl text-gray-800 space-y-2">
                                        <div class="flex justify-between">
                                            <div class="text-gray-400 text-xs">Grace Aroma</div>
                                            <div class="text-gray-400 text-xs">7d</div>
                                        </div>
                                        <a href="javascript:void(0)"
                                            class="font-bold hover:text-yellow-800 hover:underline">New
                                            campaign review</a>
                                        <div class="text-sm text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" class="text-gray-800 inline align-middle mr-1"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                            </svg>New feedback
                                        </div>
                                    </div>
                                    <div class="p-4 bg-white dark:bg-gray-100 border rounded-xl text-gray-800 space-y-2">
                                        <div class="flex justify-between">
                                            <div class="text-gray-400 text-xs">Petz App</div>
                                            <div class="text-gray-400 text-xs">2h</div>
                                        </div>
                                        <a href="javascript:void(0)"
                                            class="font-bold hover:text-yellow-800 hover:underline">Cross-platform and
                                            browser
                                            QA</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endhasrole
        @hasrole('doctor')
            <div class="flex flex-col justify-between h-[90%] text-gray-600 dark:text-gray-200">
                <div class="flex flex-col gap-8">
                    <p class="text-2xl font-semibold self-start">Reserved Appointments</p>
                    @php
                        // echo now();
                    @endphp
                    @unless ($appointments->total() == 0)
                        <div class="flex flex-col gap-2 justify-center">
                            @foreach ($appointments as $appointment)
                                <div class="flex flex-col">
                                    <x-doctor-card :doctor="$appointment->patient">
                                        <p class="font-bold text-xl self-end underline">At: {{ $appointment->date }}</p>
                                    </x-doctor-card>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="flex flex-col h-full w-full gap-2 items-center justify-center text-2xl font-semibold">
                            No reserved appointments found
                        </div>
                    @endunless

                </div>
                <div class="mt-2 py-4">{{ $appointments->links() }}</div>
            </div>
        @endhasrole
        @hasrole('patient')
            <div class="flex flex-col justify-between h-[90%] text-gray-600 dark:text-gray-200">
                <div class="flex flex-col gap-8">
                    <p class="text-2xl font-semibold self-start">Reserved appointments</p>
                    @php
                        // echo now();
                    @endphp
                    @unless ($appointments->total() == 0)
                        <div class="flex flex-col gap-2 justify-center">
                            @foreach ($appointments as $appointment)
                                <div class="flex flex-col">
                                    <x-doctor-card :doctor="$appointment->doctor">
                                        <p class="font-bold text-xl self-end underline">At: {{ $appointment->date }}</p>
                                    </x-doctor-card>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="flex flex-col h-full w-full gap-2 items-center justify-center text-2xl font-semibold">
                            No reserved appointments found
                        </div>
                    @endunless

                </div>
                <div class="mt-2 py-4">{{ $appointments->links() }}</div>
            </div>
        @endhasrole
    </div>
    @push('vite')
        @vite(['resources/js/responsive_dashboard.js'])
    @endpush
</x-dashboard-layout>

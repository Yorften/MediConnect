<x-dashboard-layout>
    <div class="w-11/12 h-[90vh] mx-auto flex flex-col items-start justify-start">
        <div class="flex items-center flex-wrap">
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
                    <a href="{{ route('dashboard') }}"
                        class="text-gray-600 dark:text-gray-200 hover:text-blue-500">Dashboard</a>
                    <span class="mx-4 h-auto text-gray-400 font-medium">/</span>
                </li>
                <li class="inline-flex items-center">
                    <a href="{{ route('specialities') }}"
                        class="text-gray-600 dark:text-gray-200 hover:text-blue-500">Specialities</a>
                </li>
            </ul>
        </div>
        <div class="w-full flex justify-between items-center px-2 mt-4">
            <p class="text-none text-xl font-semibold indent-4 text-gray-800 dark:text-gray-200">All speialities</p>
            <a href="{{ route('speciality.create') }}"
                class="text-gray-800 dark:text-gray-200 text-xl font-semibold hover:shadow-md hover:underline">Add
                a speciality</a>
        </div>
        <div class="shadow-lg border-t-2 w-full p-2 mt-8">
            <table id="table" class="text-gray-800 dark:text-gray-200">
                <thead>
                    <tr>
                        <th data-priority="1">Id</th>
                        <th data-priority="1">Speciality</th>
                        <th data-priority="1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @unless (count($specialities) == 0)
                        @foreach ($specialities as $speciality)
                            <tr>
                                <td>{{ $speciality->id }}</td>
                                <td>{{ $speciality->name }}</td>
                                <td class="flex">
                                    <a href="{{ route('speciality.edit', $speciality->id) }}" data-te-ripple-init
                                        data-te-ripple-color="dark"
                                        class="call-btn inline-block rounded-full border dark:border-0 p-1.5 mr-1 uppercase leading-normal shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                                        <svg xmlns="http://www.w3.org/2000/svg" stroke="currentColor"
                                            class="h-4 w-4 stroke-current text-gray-800 dark:text-gray-200"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('speciality.delete', $speciality->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" data-te-ripple-init data-te-ripple-color="light"
                                            class="message-btn inline-block rounded-full border dark:border-0 text-white p-1.5 uppercase leading-normal shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                                            <svg xmlns="http://www.w3.org/2000/svg" stroke="currentColor"
                                                class="h-4 w-4 stroke-current text-gray-800 dark:text-gray-200"
                                                viewBox="0 0 24 24" fill="none">
                                                <path d="M10 11V17" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M14 11V17" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M4 7H20" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <p class="w-full flex justify-center mt-10 font-bold text-2xl">No specialities found</p>
                    @endunless

                </tbody>
            </table>
        </div>
    </div>
    @stack('scripts')
    <script>
        $(document).ready(function() {

            var table = $('#table').DataTable({
                    responsive: true,
                    pageLength: 5,
                    lengthMenu: [
                        [5],
                        [5]
                    ]
                })
                .columns.adjust()
        });
    </script>
</x-dashboard-layout>

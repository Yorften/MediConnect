<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-application-favicon />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    @stack('vite')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body class="dark:bg-zinc-800 [&>*]:leading-[1.6]">
    <!-- Sidenav -->
    <nav id="full-screen-example"
        class="fixed left-0 top-0 z-[1035] h-screen w-60 -translate-x-full overflow-hidden bg-white shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] dark:bg-zinc-800 md:data-[te-sidenav-hidden='false']:translate-x-0"
        data-te-sidenav-init data-te-sidenav-mode-breakpoint-over="0" data-te-sidenav-mode-breakpoint-side="sm"
        data-te-sidenav-hidden="false" data-te-sidenav-color="dark" data-te-sidenav-content="#content"
        data-te-sidenav-scroll-container="#scrollContainer">
        <div class="py-6 px-2">
            <a href="/">
                <x-application-logo class="fill-current text-gray-800 dark:text-gray-200" />
            </a>
        </div>
        <div id="scrollContainer">
            <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
                <li class="relative">
                    <a class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:bg-gray-300/30 focus:text-inherit focus:outline-none active:bg-gray-300/30 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                        href="{{ route('dashboard') }}" data-te-sidenav-link-ref>
                        <span class="mr-4 [&>svg]:h-3.5 [&>svg]:w-3.5 [&>svg]:fill-gray-700 dark:[&>svg]:fill-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 20 20">
                                <rect x="0" fill="none" width="20" height="20" />
                                <g>
                                    <path
                                        d="M1 3.17V18h18V4H8v-.83c0-.32-.12-.6-.35-.83S7.14 2 6.82 2H2.18c-.33 0-.6.11-.83.34-.24.23-.35.51-.35.83zM10 6v2H3V6h7zm7 0v10h-5V6h5zm-7 4v2H3v-2h7zm0 4v2H3v-2h7z" />
                                </g>
                            </svg>
                        </span>
                        <span>Index</span>
                    </a>
                </li>
                @role('patient')
                    <li class="relative">
                        <a class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:bg-gray-300/30 focus:text-inherit focus:outline-none active:bg-gray-300/30 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                            href="{{ route('favourites') }}" data-te-sidenav-link-ref>
                            <span class="mr-4 [&>svg]:h-3.5 [&>svg]:w-3.5 [&>svg]:fill-gray-700 dark:[&>svg]:fill-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    version="1.1" id="Capa_1" width="800px" height="800px" viewBox="0 0 126.729 126.73"
                                    xml:space="preserve">
                                    <g>
                                        <path
                                            d="M121.215,44.212l-34.899-3.3c-2.2-0.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101,0l-12.4,30.3   c-0.8,2.1-2.8,3.5-5,3.7l-34.9,3.3c-5.2,0.5-7.3,7-3.4,10.5l26.3,23.1c1.7,1.5,2.4,3.7,1.9,5.9l-7.9,32.399   c-1.2,5.101,4.3,9.3,8.9,6.601l29.1-17.101c1.9-1.1,4.2-1.1,6.1,0l29.101,17.101c4.6,2.699,10.1-1.4,8.899-6.601l-7.8-32.399   c-0.5-2.2,0.2-4.4,1.9-5.9l26.3-23.1C128.615,51.212,126.415,44.712,121.215,44.212z" />
                                    </g>
                                </svg>
                            </span>
                            <span>Favourites</span>
                        </a>
                    </li>
                    <li class="relative">
                        <a class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-primary-400/10 hover:text-primary-600 hover:outline-none focus:bg-primary-400/10 focus:text-primary-600 focus:outline-none active:bg-primary-400/10 active:text-primary-600 active:outline-none data-[te-sidenav-state-active]:text-primary-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                            data-te-sidenav-link-ref>
                            <span
                                class="mr-4 [&>svg]:h-3.5 [&>svg]:w-3.5 [&>svg]:fill-gray-700 [&>svg]:transition [&>svg]:duration-300 [&>svg]:ease-linear group-hover:[&>svg]:fill-primary-600 group-focus:[&>svg]:fill-primary-600 group-active:[&>svg]:fill-primary-600 group-[te-sidenav-state-active]:[&>svg]:fill-primary-600 motion-reduce:[&>svg]:transition-none dark:[&>svg]:fill-gray-300 dark:group-hover:[&>svg]:fill-gray-300 ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 32 32"
                                    version="1.1">
                                    <title>calendar</title>
                                    <path
                                        d="M0 26.016q0 2.496 1.76 4.224t4.256 1.76h20q2.464 0 4.224-1.76t1.76-4.224v-20q0-1.952-1.12-3.488t-2.88-2.144v2.624q0 1.248-0.864 2.144t-2.144 0.864-2.112-0.864-0.864-2.144v-3.008h-12v3.008q0 1.248-0.896 2.144t-2.112 0.864-2.144-0.864-0.864-2.144v-2.624q-1.76 0.64-2.88 2.144t-1.12 3.488v20zM4 26.016v-16h24v16q0 0.832-0.576 1.408t-1.408 0.576h-20q-0.832 0-1.44-0.576t-0.576-1.408zM6.016 3.008q0 0.416 0.288 0.704t0.704 0.288 0.704-0.288 0.288-0.704v-3.008h-1.984v3.008zM8 24h4v-4h-4v4zM8 18.016h4v-4h-4v4zM14.016 24h4v-4h-4v4zM14.016 18.016h4v-4h-4v4zM20 24h4v-4h-4v4zM20 18.016h4v-4h-4v4zM24 3.008q0 0.416 0.288 0.704t0.704 0.288 0.704-0.288 0.32-0.704v-3.008h-2.016v3.008z" />
                                </svg>
                            </span>
                            <span>Appointments</span>
                            <span
                                class="absolute right-0 ml-auto mr-[0.8rem] transition-transform duration-300 motion-reduce:transition-none [&>svg]:h-3 [&>svg]:w-3 [&>svg]:fill-gray-600 group-hover:[&>svg]:fill-primary-600 group-focus:[&>svg]:fill-primary-600 group-active:[&>svg]:fill-primary-600 group-[te-sidenav-state-active]:[&>svg]:fill-primary-600 dark:[&>svg]:fill-gray-300"
                                data-te-sidenav-rotate-icon-ref>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path
                                        d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                                </svg>
                            </span>
                        </a>
                        <ul class="show !visible relative m-0 hidden list-none p-0 data-[te-collapse-show]:block"
                            data-te-sidenav-collapse-ref>
                            <li class="relative">
                                <a href="{{ route('appointment.missed') }}"
                                    class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[3.4rem] pr-6 text-[0.78rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-primary-400/10 hover:text-primary-600 hover:outline-none focus:bg-primary-400/10 focus:text-primary-600 focus:outline-none active:bg-primary-400/10 active:text-primary-600 active:outline-none data-[te-sidenav-state-active]:text-primary-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                    data-te-sidenav-link-ref>Missed Appointments</a>
                            </li>
                            <li class="relative">
                                <a href="{{ route('appointment.history') }}"
                                    class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[3.4rem] pr-6 text-[0.78rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-primary-400/10 hover:text-primary-600 hover:outline-none focus:bg-primary-400/10 focus:text-primary-600 focus:outline-none active:bg-primary-400/10 active:text-primary-600 active:outline-none data-[te-sidenav-state-active]:text-primary-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                    data-te-sidenav-link-ref>History</a>
                            </li>
                        </ul>
                    </li>
                @endrole
                @role('admin')
                    <li class="relative">
                        <a class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:bg-gray-300/30 focus:text-inherit focus:outline-none active:bg-gray-300/30 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                            href="{{ route('specialities') }}" data-te-sidenav-link-ref>
                            <span class="mr-4 [&>svg]:h-3.5 [&>svg]:w-3.5 [&>svg]:fill-gray-700 dark:[&>svg]:fill-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    version="1.1" id="Icons" viewBox="0 0 32 32" xml:space="preserve">
                                    <polyline class="st0" points="14,10 16,10 18,8 20,12 22,7 24,10 " />
                                    <path class="st0" d="M3,25l2.6-4.2c1.5-2.3,4-3.8,6.8-3.8H19v0c0,2.2-1.8,4-4,4h-2" />
                                    <path class="st0"
                                        d="M15,21h8l1.2-1.6c1.1-1.5,2.9-2.4,4.8-2.4h0l-2.7,4.8c-1.4,2.6-4.2,4.2-7.1,4.2h0c-4.7,0-9.3,1.4-13.2,4l0,0" />
                                    <path class="st0"
                                        d="M16.1,17l-4.4-4.7l-1.2-1.3c-2-2.1-2-5.4,0-7.5l0,0c2-2.1,5.3-2.1,7.3,0l1,1c0.1,0.1,0.3,0.1,0.4,0l1-1  c2-2.1,5.3-2.1,7.3,0l0,0c2,2.1,2,5.4,0,7.5l-1.2,1.3L22,16.7l-2.8,2.9" />
                                </svg>
                            </span>
                            <span>Specialities</span>
                        </a>
                    </li>
                    <li class="relative">
                        <a class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:bg-gray-300/30 focus:text-inherit focus:outline-none active:bg-gray-300/30 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                            href="{{ route('drugs') }}" data-te-sidenav-link-ref>
                            <span class="mr-4 [&>svg]:h-3.5 [&>svg]:w-3.5 [&>svg]:fill-gray-700 dark:[&>svg]:fill-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="800px" height="800px" viewBox="0 -0.5 17 17" version="1.1"
                                    class="si-glyph si-glyph-pill">
                                    <title>814</title>
                                    <defs>
                                    </defs>
                                    <g>
                                        <path
                                            d="M15.897,1.731 L15.241,1.074 C13.887,-0.281 11.745,-0.341 10.46,0.944 L1.957,9.446 C0.673,10.731 0.733,12.871 2.09,14.228 L2.744,14.882 C4.101,16.239 6.242,16.3 7.527,15.016 L16.03,6.511 C17.314,5.229 17.254,3.088 15.897,1.731 L15.897,1.731 Z M11.086,10.164 L6.841,5.917 L11.049,1.709 C11.994,0.765 13.581,0.811 14.584,1.816 L15.188,2.417 C15.678,2.91 15.959,3.552 15.975,4.226 C15.991,4.888 15.75,5.502 15.295,5.955 L11.086,10.164 L11.086,10.164 Z"
                                            class="si-glyph-fill">

                                        </path>
                                    </g>
                                </svg>
                            </span>
                            <span>Drugs</span>
                        </a>
                    </li>
                @endrole
                @role('doctor')
                    <li class="relative">
                        <a class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:bg-gray-300/30 focus:text-inherit focus:outline-none active:bg-gray-300/30 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                            href="{{ route('appointments') }}" data-te-sidenav-link-ref>
                            <span class="mr-4 [&>svg]:h-3.5 [&>svg]:w-3.5 [&>svg]:fill-gray-700 dark:[&>svg]:fill-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 32 32"
                                    version="1.1">
                                    <title>calendar</title>
                                    <path
                                        d="M0 26.016q0 2.496 1.76 4.224t4.256 1.76h20q2.464 0 4.224-1.76t1.76-4.224v-20q0-1.952-1.12-3.488t-2.88-2.144v2.624q0 1.248-0.864 2.144t-2.144 0.864-2.112-0.864-0.864-2.144v-3.008h-12v3.008q0 1.248-0.896 2.144t-2.112 0.864-2.144-0.864-0.864-2.144v-2.624q-1.76 0.64-2.88 2.144t-1.12 3.488v20zM4 26.016v-16h24v16q0 0.832-0.576 1.408t-1.408 0.576h-20q-0.832 0-1.44-0.576t-0.576-1.408zM6.016 3.008q0 0.416 0.288 0.704t0.704 0.288 0.704-0.288 0.288-0.704v-3.008h-1.984v3.008zM8 24h4v-4h-4v4zM8 18.016h4v-4h-4v4zM14.016 24h4v-4h-4v4zM14.016 18.016h4v-4h-4v4zM20 24h4v-4h-4v4zM20 18.016h4v-4h-4v4zM24 3.008q0 0.416 0.288 0.704t0.704 0.288 0.704-0.288 0.32-0.704v-3.008h-2.016v3.008z" />
                                </svg>
                            </span>
                            <span>Appointments</span>
                        </a>
                    </li>
                    <li class="relative">
                        <a class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:bg-gray-300/30 focus:text-inherit focus:outline-none active:bg-gray-300/30 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                            href="{{ route('drugs') }}" data-te-sidenav-link-ref>
                            <span
                                class="mr-4 [&>svg]:h-3.5 [&>svg]:w-3.5 [&>svg]:fill-gray-700 dark:[&>svg]:fill-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="800px" height="800px" viewBox="0 -0.5 17 17" version="1.1"
                                    class="si-glyph si-glyph-pill">
                                    <title>814</title>
                                    <defs>
                                    </defs>
                                    <g>
                                        <path
                                            d="M15.897,1.731 L15.241,1.074 C13.887,-0.281 11.745,-0.341 10.46,0.944 L1.957,9.446 C0.673,10.731 0.733,12.871 2.09,14.228 L2.744,14.882 C4.101,16.239 6.242,16.3 7.527,15.016 L16.03,6.511 C17.314,5.229 17.254,3.088 15.897,1.731 L15.897,1.731 Z M11.086,10.164 L6.841,5.917 L11.049,1.709 C11.994,0.765 13.581,0.811 14.584,1.816 L15.188,2.417 C15.678,2.91 15.959,3.552 15.975,4.226 C15.991,4.888 15.75,5.502 15.295,5.955 L11.086,10.164 L11.086,10.164 Z"
                                            class="si-glyph-fill">

                                        </path>
                                    </g>
                                </svg>
                            </span>
                            <span>Drugs</span>
                        </a>
                    </li>
                    <li class="relative">
                        <a class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:bg-gray-300/30 focus:text-inherit focus:outline-none active:bg-gray-300/30 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                            href="{{ route('records') }}" data-te-sidenav-link-ref>
                            <span
                                class="mr-4 [&>svg]:h-3.5 [&>svg]:w-3.5 [&>svg]:fill-gray-700 dark:[&>svg]:fill-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="800px" height="800px" viewBox="0 0 16 16" version="1.1">
                                    <path d="M4 9h4v2h-4v-2z" />
                                    <path
                                        d="M16 2h-1v-2h-10v2h-2v1.25l-0.6 0.75h-1.4v1.75l-1 1.25v9h12l4-5v-9zM2 5h8v2h-8v-2zM11 15h-10v-7h10v7zM12 7h-1v-3h-7v-1h8v4zM14 4.5l-1 1.25v-3.75h-7v-1h8v3.5z" />
                                </svg>
                            </span>
                            <span>Medical Records</span>
                        </a>
                    </li>
                @endrole
            </ul>
        </div>
        <div class="absolute bottom-0 h-24 w-full bg-inherit text-center">
            <hr class="mb-6 border-gray-300" />
            <span class="text-gray-800 dark:text-gray-200">© 2023 Copyright</span>

            <!-- Logo -->
            <div class="flex items-center justify-center mt-2">
                <a href="/">
                    <x-application-logo class="fill-current h-4 text-gray-800 dark:text-gray-200" />
                </a>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="flex flex-col min-h-screen w-full !pl-0 text-center sm:!pl-60 bg-gray-100 dark:bg-gray-900"
        id="content">
        <div class="flex items-center justify-between sm:justify-end ms-6 h-[10vh]">
            <button
                class="inline-block sm:hidden rounded bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                data-te-sidenav-toggle-ref data-te-target="#full-screen-example" aria-controls="#full-screen-example"
                aria-haspopup="true">
                <span class="block [&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </button>
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="inline-flex items-center px-4 py-2 mr-2 border border-transparent leading-4 font-semibold rounded-md text-gray-500 bg-gray-100 dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                        <div class="">{{ Auth::user()->name }}</div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
        <!-- Toggler -->

        <!-- Toggler -->
        <div class="min-h-[90vh]">
            {{ $slot }}
        </div>
    </div>
    @stack('scripts')
</body>

</html>

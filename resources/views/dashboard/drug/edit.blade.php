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
                    <a href="{{ route('drugs') }}"
                        class="text-gray-600 dark:text-gray-200 hover:text-blue-500">Drugs</a>
                    <span class="mx-4 h-auto text-gray-400 font-medium">/</span>
                </li>
                <li class="inline-flex items-center">
                    <p class="text-gray-600 dark:text-gray-200 hover:text-blue-500">Edit</p>
                </li>
            </ul>
        </div>
        <p class="text-none text-xl font-semibold indent-4 text-gray-800 dark:text-gray-200 mt-4">Edit drug</p>
        <div class="shadow-lg rounded-md bg-gray-200 dark:bg-gray-800 w-2/3 mx-auto p-4 mt-8">
            <form method="post" action="{{ route('drug.update', $drug->id) }}" class="mt-6 space-y-6">
                @csrf
                @method('patch')

                <div>
                    <x-input-label for="name" class="text-lg font-medium text-left" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                        :value="old('name', $drug->name)" autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div class="mt-4">
                    <x-input-label for="speciality"
                        class="text-lg font-medium text-left text-gray-800 dark:text-gray-200" :value="__('Speciality')" />
                    <x-select-input id="speciality" class="block mt-1 w-full" name="speciality_id">
                        <option value="" disabled selected hidden>Select the drug speciality...</option>
                        @unless (count($specialities) == 0)
                            @foreach ($specialities as $speciality)
                                <option value="{{ $speciality->id }}"
                                    {{ $speciality->id == $drug->speciality->id ? 'selected' : '' }}>{{ $speciality->name }}
                                </option>
                            @endforeach
                        @else
                            <option value="">No specialities found</option>
                        @endunless
                    </x-select-input>
                    <x-input-error-js id="specialityErr"></x-input-error-js>
                    <x-input-error :messages="$errors->get('speciality_id')" class="mt-2" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button class="w-full text-center">{{ __('Save') }}</x-primary-button>
                </div>

            </form>
        </div>
    </div>
</x-dashboard-layout>

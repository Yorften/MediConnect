<x-dashboard-layout>
    <div class="flex flex-col items-start justify-start">
        <p class="text-none text-xl font-semibold indent-4 text-gray-800 dark:text-gray-200">Edit drug</p>
        <div class="shadow-lg rounded-md bg-gray-200 dark:bg-gray-800 w-2/3 mx-auto p-4 mt-8">
            <form method="post" action="{{ route('drug.update', $drug->id) }}" class="mt-6 space-y-6">
                @csrf
                @method('patch')

                <div>
                    <x-input-label for="name" class="text-lg font-medium text-left" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $drug->name)"
                        autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div class="mt-4">
                    <x-input-label for="speciality"
                        class="text-lg font-medium text-left text-gray-800 dark:text-gray-200" :value="__('Speciality')" />
                    <x-select-input id="speciality" class="block mt-1 w-full" name="speciality_id">
                        <option value="" disabled selected hidden>Select the drug speciality...</option>
                        @unless (count($specialities) == 0)
                            @foreach ($specialities as $speciality)
                                <option value="{{ $speciality->id }}" {{ $speciality->id == $drug->speciality->id ? 'selected' : '' }}>{{ $speciality->name }}</option>
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

<x-dashboard-layout>
    <div class="flex flex-col items-start justify-start">
        <p class="text-none text-xl font-semibold indent-4 text-gray-800 dark:text-gray-200">Edit speciality</p>
        <div class="shadow-lg bg-gray-800 w-2/3 mx-auto p-4 mt-8">
            <form method="post" action="{{ route('speciality.update', $speciality->id) }}" class="mt-6 space-y-6">
                @csrf
                @method('patch')

                <div>
                    <x-input-label for="name" class="text-lg font-medium text-left" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $speciality->name)"
                        autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button class="w-full text-center">{{ __('Save') }}</x-primary-button>
                </div>

            </form>
        </div>
    </div>
</x-dashboard-layout>

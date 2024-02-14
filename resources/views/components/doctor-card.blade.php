<a href="{{ route('doctor.show', $doctor->id) }}"
    {{ $attributes->merge(['class' => 'w-full bg-gray-200 dark:bg-zinc-800 dark:text-gray-200 shadow-lg dark:shadow-xl border-t dark:border-0 p-4 items-center rounded-lg hover:text-blue-500']) }}>
    <h3 class="flex justify-between items-center text-white-50">
        <p class="text-xl">{{ $doctor->user->name }}</p>
        <div class="flex items-center gap-4">
            <p>Diploma: {{ $doctor->diploma }}</p>
            <p>Phone number: {{ $doctor->phone_number }}</p>
        </div>
    </h3>
</a>

<a href="/specialities/browse/{{ $speciality->id }}"
    {{ $attributes->merge(['class' => 'w-full bg-gray-200 dark:bg-zinc-800 dark:text-gray-200 shadow-lg dark:shadow-xl border-t dark:border-0 m-4 p-4 items-center rounded-lg hover:text-blue-500']) }}>
    <h3 class="flex justify-between items-center text-white-50">
        <p class="text-xl">{{ $speciality->name }}</p>
        <p>{{ $speciality->doctors_count }} Doctors</p>
    </h3>
</a>

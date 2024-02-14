<div
    {{ $attributes->merge(['class' => 'w-full bg-gray-200 dark:bg-zinc-800 dark:text-gray-200 shadow-lg dark:shadow-xl border-t dark:border-0 p-4 items-center rounded-lg hover:text-blue-500']) }}>
    <h3 class="flex justify-between items-center text-white-50">
        <a href="{{ route('doctor.show', $favourite->doctor->id) }}"
            class="text-xl">{{ $favourite->doctor->user->name }}</a>
        <div class="flex items-center gap-4">
            <p>Added: {{ $favourite->created_at }}</p>
            <p>Phone number: {{ $favourite->doctor->phone_number }}</p>
            @hasrole('patient')
                @if ($favourite->doctor->favourites()->where('patient_id', Auth::user()->patient->id)->exists())
                    <form action="{{ route('favourite.destroy', $favourite->doctor->id) }} " method="post">
                        @csrf
                        @method('delete')
                        <button>
                            <i class='bx bxs-star text-xl text-yellow-500 hover:text-gray-300'></i>
                        </button>
                    </form>
                @endif
            @endhasrole
        </div>
    </h3>
</div>

<div class="w-full flex flex-col gap-2">
    <div class="flex w-full justify-between items-center mt-8 pl-4">
        <h1 id="title" class="text-2xl md:text-3xl font-medium">Dr. {{ $doctor->user->name }}</h1>
        @hasrole('patient')
            <a href="{{ route('appointment.create', $doctor->id) }}"><x-primary-button
                    class="w-full text-center">{{ __('Reserve an appointment') }}</x-primary-button></a>
        @endhasrole
    </div>
    <div class="flex flex-col w-full shadow-xl rounded-xl border px-2 py-4 text-lg">
        <div class="w-full flex justify-between items-center mb-4">
            <div>
                @if ($doctor->ratings->avg('rating') === null)
                    <p class=" font-semibold">Rating: <span class="text-gray-500 font-bold">(unrated)</span></p>
                @else
                    <p class=" font-semibold">Rating: {{ $doctor->ratings->avg('rating') }} 💉</p>
                @endif
            </div>
            <div class="flex items-center gap-2 pr-2">
                @if ($favourites > 0)
                    <p>({{ $favourites }} favourites)</p>
                @endif
                @hasrole('patient')
                    @if (!$doctor->favourites()->where('patient_id', Auth::user()->patient->id)->exists())
                        <form action="{{ route('favourite.store', $doctor->id) }}" method="POST">
                            @csrf
                            <button>
                                <i class='bx bx-star text-xl hover:text-yellow-500'></i>
                            </button>
                        </form>
                    @else
                        <form action="{{ route('favourite.destroy', $doctor->id) }} " method="post">
                            @csrf
                            @method('delete')
                            <button>
                                <i class='bx bxs-star text-xl text-yellow-500 hover:text-gray-300'></i>
                            </button>
                        </form>
                    @endif
                @endhasrole
            </div>
        </div>
        <p class="font-medium">
            Joined <span class="hover:text-blue-500 cursor-pointer">MediConnect</span> at :
            {{ $doctor->user->created_at->format('d-m-Y') }}
        </p>
        <p>Diploma: {{ $doctor->diploma }}</p>
        <p>Speciality: {{ $doctor->speciality->name }} </p>
    </div>
</div>

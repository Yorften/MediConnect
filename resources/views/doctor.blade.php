<x-app-layout>
    <div class="w-3/4 mx-auto min-h-[70vh] text-gray-800 dark:text-gray-200">
        <input type="hidden" class="bg-blue-600">
        <div class="flex items-center flex-wrap mt-10">
            <ul class="flex items-center border-red-600">
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
                    <a href="{{ route('specialities.browse') }}"
                        class="text-gray-600 dark:text-gray-200 hover:text-blue-500">Specialities</a>
                    <span class="mx-4 h-auto text-gray-400 font-medium">/</span>
                </li>
                <li class="inline-flex items-center">
                    <a href="/specialities/browse/{{ $doctor->speciality->id }}"
                        class="text-gray-600 dark:text-gray-200 hover:text-blue-500">{{ $doctor->speciality->name }}</a>
                    <span class="mx-4 h-auto text-gray-400 font-medium">/</span>
                </li>
                <li class="inline-flex items-center">
                    <a href="{{ route('doctor.show', $doctor->id) }}"
                        class="text-gray-600 dark:text-gray-200 hover:text-blue-500">{{ $doctor->user->name }}</a>
                </li>
            </ul>
        </div>
        <x-doctor-resume :doctor="$doctor" :favourites="$favourites" />
        <div class="flex flex-col mt-6">
            <h1 class="text-2xl font-medium pl-4">Comments</h1>
        </div>
        @hasrole('patient')
            <div class="flex flex-col gap-4 w-[95%] mx-auto md:mx-0 md:w-4/5">
                <form action="{{ route('comment.store') }}" method="POST" class="flex flex-col gap-2">
                    @csrf
                    <input id="doctor_id" type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                    <div>
                        <textarea name="content" id="content" cols="30" rows="5"
                            class="w-full resize-none shadow-xl border-t-2 rounded-xl p-4 dark:bg-gray-300 dark:text-gray-800 placeholder:text-gray-800"
                            placeholder="Leave a comment!" :value="old('content')"></textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>
                    <div class="w-full flex items-center justify-between">
                        <div>
                            <div class="flex items-center gap-2">
                                <x-input-label for="rating" :value="__('Rating: ')" />
                                <x-select-input id="rating" class="block mt-1 w-full h-9" name="rating">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5" selected>5</option>
                                </x-select-input>
                            </div>
                            <x-input-error :messages="$errors->get('rating')" class="mt-2" />
                        </div>
                        <x-primary-button
                            class="text-center">{{ __('Comment') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        @endhasrole
        <div id="comments"
            class="flex flex-col gap-4 w-[95%] mx-auto md:mx-0 md:w-4/5 mt-6 mb-10 p-2 bg-[#f5f5f5] dark:border dark:border-gray-800 dark:bg-gray-900 rounded-lg">

            @unless (count($doctor->comments) === 0)
                @foreach ($doctor->comments as $comment)
                    @if ($comment->is_deleted === 0)
                        <div id="comment{{ $comment->id }}"
                            class="flex flex-col w-full shadow-xl border-t-2 dark:border-gray-900 p-2 pl-4">
                            <div class="flex w-full justify-between">
                                <h1 id="user{{ $comment->id }}">
                                    <i class='bx bx-user text-xl border-gray-500'></i>{{ $comment->patient->name }}
                                </h1>
                                @if ($comment->patient->user->id === Auth::id() || Auth::user()->hasRole('admin'))
                                    <div class="flex">
                                        <i onclick="editComment({{ $comment->id }})"
                                            class="bx bx-edit-alt text-xl border-gray-500 cursor-pointer"></i>
                                        <form action="{{ route('comment.delete', $comment->id) }}" method="post">
                                            @csrf
                                            @method('patch')
                                            <button>
                                                <i class="bx bx-message-alt-x text-xl border-gray-500 cursor-pointer"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                            <p id="p{{ $comment->id }}">{{ $comment->content }}</p>
                        </div>
                    @else
                        @if ($comment->patient->user->id === Auth::id() || Auth::user()->hasRole('admin'))
                            <div
                                class="flex flex-col w-full shadow-xl border-t-2 dark:border-gray-900 p-2 pl-4 bg-red-500/30">
                                <div class="flex w-full justify-between">
                                    <h1 id="user">
                                        <i class='bx bx-user text-xl border-gray-500'></i>{{ $comment->patient->name }}
                                    </h1>
                                    <div class="flex">
                                        <form action="{{ route('comment.delete', $comment->id) }}" method="post">
                                            @csrf
                                            @method('patch')
                                            <button class="cursor-pointer hover:underline">Undo</button>
                                        </form>
                                    </div>
                                </div>
                                <p id="p">{{ $comment->content }}</p>
                            </div>
                        @endif
                    @endif
                @endforeach
            @else
                <div
                    class="flex flex-col w-full shadow-lg dark:shadow-xl rounded-lg border-t-2 p-2 pl-4 text-center dark:border-gray-900">
                    <p>No comments</p>
                </div>
            @endunless
        </div>
    </div>
    @push('scripts')
        <script>
            function editComment(commentId) {

                let commentContainer = document.getElementById('comment' + commentId);
                let oldComment = encodeURIComponent(commentContainer.innerHTML);

                var comment = document.getElementById("p" + commentId).textContent;
                var user = document.getElementById("user" + commentId).textContent;
                document.getElementById("comment" + commentId).innerHTML = `
                    <form action="/comment/edit/${commentId}" method="POST" class="flex flex-col gap-2">
                        @csrf
                        @method('patch')
                        <div>
                            <textarea name="content_edit" id="newcomment${commentId}" cols="30" rows="5"
                            class="w-full resize-none shadow-xl border-t-2 rounded-xl p-4 dark:bg-gray-300 dark:text-gray-800" placeholder="Leave a comment!">${comment}</textarea>
                            <x-input-error :messages="$errors->get('content_edit')" class="mt-2" />
                        </div>
                        <div class="w-full flex justify-end gap-4">
                            <button class="px-8 py-2 bg-gray-500 border border-gray-600 text-white font-semibold rounded-lg ">Apply</button>
                            
                            <p onclick="cancelEdit('${oldComment}', ${commentId})" class="cursor-pointer px-8 py-2 bg-gray-500 border border-gray-600 text-white font-semibold rounded-lg ">Cancel</p>
                        </div>
                    </form>
  `;
            }

            function cancelEdit(oldComment, commentId) {
                let commentContainer = document.getElementById('comment' + commentId);
                commentContainer.innerHTML = decodeURIComponent(oldComment);
            }
        </script>
    @endpush
</x-app-layout>

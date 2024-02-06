<x-layout>
    <div id="content" class="flex flex-col gap-8 justify-start w-[90%] md:w-4/5 mx-auto min-h-[60vh]">
        <div
            class="flex flex-col justify-center w-full bg-white rounded-lg shadow-2xl md:w-3/5 mx-auto my-12 border-t-2">
            <form onsubmit="return validateForm()" action="/users" class="w-3/4 mx-auto" method="post">
                @csrf
                <div class="flex flex-col mt-8">
                    <div class="capitalize mb-5 font-semibold text-xl">
                        <p>Register</p>
                    </div>

                    <div class="flex flex-col mb-3">
                        <div id="userInput" class="flex flex-col border-2 border-[#A1A1A1] p-2 rounded-md">
                            <p class="text-xs">Username</p>
                            <input class="placeholder:font-light placeholder:text-xs focus:outline-none" id="username"
                                type="text" name="name" placeholder="John" autocomplete="off">
                        </div>
                        <div id="userErr" class="text-red-600 text-xs pl-3"></div>
                        @error('name')
                            <div id="userErr2" class="text-red-600 text-xs pl-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-3">
                        <div id="emailInput" class="flex flex-col border-2 border-[#A1A1A1] p-2 rounded-md">
                            <p class="text-xs">Email</p>
                            <input class="placeholder:font-light placeholder:text-xs focus:outline-none" id="email"
                                type="text" name="email" placeholder="example@exm.com" autocomplete="off">
                        </div>
                        <div id="emailErr" class="text-red-600 text-xs pl-3"></div>
                        @error('email')
                            <div id="emailErr2" class="text-red-600 text-xs pl-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- End of input name -->
                    <div class="flex flex-col mb-3">
                        <div id="passwordInput" class="flex flex-col border-2 border-[#A1A1A1] p-2 rounded-md">
                            <p class="text-xs">Password</p>
                            <input class="placeholder:font-light placeholder:text-xs focus:outline-none" id="password"
                                type="password" name="password" placeholder="***************">
                        </div>
                        <div id="passwordErr" class="text-red-600 text-xs pl-3"></div>
                        @error('password')
                            <div id="passwordErr2" class="text-red-600 text-xs pl-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-3">
                        <div id="repeatInput" class="flex flex-col border-2 border-[#A1A1A1] p-2 rounded-md">
                            <p class="text-xs">Repeat password</p>
                            <input class="placeholder:font-light placeholder:text-xs focus:outline-none" id="repeat"
                                type="password" name="password_confirmation" placeholder="***************">
                        </div>
                        <div id="repeatErr" class="text-red-600 text-xs pl-3"></div>
                        @error('password_confirmation')
                            <div id="repeatErr2" class="text-red-600 text-xs pl-3">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-start mb-8">
                    <a href="/login" class="text-sm text-gray-800 underline">Already have an account? Log In</a>
                </div>
                <div class="flex justify-end mb-4">
                    <input id="signbutton" type="submit" name="signup"
                        class="w-full text-white  cursor-pointer px-8 py-2 bg-[#284a8f] font-semibold rounded-lg border-2 border-[#284a8f]"
                        value="Continue">
                </div>
            </form>

        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('assets/js/regex_signup.js') }}"></script>
    @endpush
</x-layout>

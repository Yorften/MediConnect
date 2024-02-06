<x-layout>
    <div id="content" class="flex flex-col gap-8 justify-start w-[90%] md:w-4/5 mx-auto min-h-[60vh] mb-20">
        <div class="flex flex-col justify-center w-full md:w-3/5 mx-auto mt-12 bg-white rounded-lg shadow-2xl border-t-2">
            <form action="/users/authenticate" class="w-4/5 mx-auto" method="post">
                @csrf
                <div class="flex flex-col mt-8">
                    <div class="capitalize mb-5 font-bold md:font-semibold text-xl">
                        <p>Log in</p>
                    </div>

                    <div class="flex flex-col mb-3">
                        <div id="emailInput" class="flex flex-col border-2 border-[#A1A1A1] p-2 rounded-md">
                            <p class="text-xs">Email</p>
                            <input class="placeholder:font-light placeholder:text-xs focus:outline-none" id="email" type="text" name="email" placeholder="example@exm.com" autocomplete="on">
                        </div>
                        <div id="emailErr" class="text-red-600 text-xs pl-3"></div>
                        @error('email')
                            <div id="emailErr2" class="text-red-600 text-xs pl-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col mb-3">
                        <div id="passwordInput" class="flex flex-col border-2 border-[#A1A1A1] p-2 rounded-md">
                            <p class="text-xs">Password</p>
                            <input class="placeholder:font-light placeholder:text-xs focus:outline-none" id="password" type="password" name="password" placeholder="***************">
                        </div>
                        <div id="passwordErr" class="text-red-600 text-xs pl-3"></div>
                        @error('password')
                            <div id="passwordErr2" class="text-red-600 text-xs pl-3">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="flex justify-start mb-8">
                    <a href="/register" class="text-sm text-gray-800 underline">Don't have an account yet? Sign Up</a>
                </div>
                <div class="flex justify-center mb-4">
                    <input type="submit" name="login" class="cursor-pointer w-full text-white px-8 py-2 bg-[#3366cc] font-semibold rounded-lg border-2 border-[#284a8f]" value="Log in">
                </div>
            </form>
        </div>

    </div>
</x-layout>
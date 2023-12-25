<x-basic>
    <div class="flex w-full flex-col justify-center items-center h-screen">
        <div class="bg-gray-200 w-full max-w-xl rounded-md shadow-md">
            <form class="max-w-2xl mx-auto px-4 py-6 space-y-3" action="/register" method="post">
                @csrf

                <div class="flex items-center w-full space-x-4">
                    <div class="w-full">
                        <label for="fname" class="block mb-2 text-sm font-medium text-gray-900">First Name</label>
                        <input type="text" id="fname" name="fname"
                               value="{{ old('fname') }}"
                               class="bg-gray-50 border border-gray-300 text-gray-900
                   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full
                    p-2.5" required>
                    </div>

                    <div class="w-full">
                        <label for="lname" class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                        <input type="text" id="lname" name="lname"
                               value="{{ old('lname') }}"
                               class="bg-gray-50 border border-gray-300 text-gray-900
                   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full
                    p-2.5" required>
                    </div>
                </div>

                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Phone</label>
                    <input type="text" id="phone" name="phone"
                           value="{{ old('phone') }}"
                           class="bg-gray-50 border border-gray-300 text-gray-900
                   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full
                    p-2.5" required>
                </div>

                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="email" id="email" name="email"
                           value="{{ old('email') }}"
                           class="bg-gray-50 border border-gray-300 text-gray-900
                   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full
                    p-2.5"
                           placeholder="joe@example.com" required>
                </div>

                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                    <input type="password" id="password" name="password"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500
                    block w-full p-2.5"
                           required>
                </div>

                <div>
                    <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900">Confirm
                        Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500
                    block w-full p-2.5"
                           required>
                </div>

                <div>
                    @if($errors->count())
                        <div class="my-3 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                             role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>
                                    <span class="block sm:inline">{{ $error }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                    Register
                </button>

                <br><br>
                <a href="/login">Already have an account? Login</a>
            </form>
        </div>
    </div>
</x-basic>



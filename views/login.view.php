
<div class="flex w-full flex-col justify-center items-center h-screen">
<div class="bg-gray-200 w-full max-w-lg rounded-md shadow-md">
    <form class="max-w-2xl mx-auto px-4 py-6" action="/login" method="post">
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
            <input type="email" id="email" name="email"
                   class="bg-gray-50 border border-gray-300 text-gray-900
                   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full
                    p-2.5"
                   placeholder="joe@example.com" required>
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
            <input type="password" id="password" name="password"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500
                    block w-full p-2.5"
                   required>
        </div>

        <div>
            <?php if(hasError()): ?>
                <div class="my-3 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline"><?= getErrors() ?></span>
                </div>
            <?php endif; ?>
        </div>

        <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
            Login
        </button>

        <br><br>
        <a href="/register">Don't have an account? Register</a>
    </form>
</div>
</div>


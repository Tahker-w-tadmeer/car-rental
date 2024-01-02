@props(['user'])

<div class="px-1 py-2">
    <div class="grid max-w-4xl grid-cols-1 sm:grid-cols-2 gap-8">
        <div>
            <label for="first_name" class="block text-xs font-bold leading-6 text-gray-900">First name</label>
            <div class="flex rounded-lg text-lg">
                <label>{{ $user->first_name }}</label>
            </div>
        </div>
        <div>
            <label for="last_name" class="block text-xs font-bold leading-6 text-gray-900">Last name</label>
            <div class="flex rounded-lg text-lg">
                <label>{{ $user->last_name }}</label>
            </div>
        </div>
        <div>
            <label for="email" class="block text-xs font-bold leading-6 text-gray-900">Email</label>
            <div class="flex rounded-lg text-lg">
                <label>{{ $user->email }}</label>
            </div>
        </div>
        <div>
            <label for="phone" class="block text-xs font-bold leading-6 text-gray-900">Phone</label>
            <div class="flex rounded-lg text-lg">
                <label>{{ $user->phone }}</label>
            </div>
        </div>

        <div>
            <label for="city" class="block text-xs font-bold leading-6 text-gray-900">City</label>
            <div class="flex rounded-lg text-lg">
                <label>{{ $user->city->name }}</label>
            </div>
        </div>

    </div>
</div>

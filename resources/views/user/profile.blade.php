<x-app>
    <div class="space-y-10 divide-y divide-gray-900/10">
        <div class="flex flex-col space-y-5">
            <x-card title="Personal information">
                <div class="px-4 py-6 sm:p-8">
                    <div class="grid max-w-4xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-3">
                            <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">First
                                name</label>
                            <div class="mt-2 flex  rounded-lg border  border-gray-900/25 px-2 py-1">
                                <label> {{$user->first_name}}</label>
                            </div>
                        </div>
                        <div class="col-span-3">
                            <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Last
                                name</label>
                            <div class="mt-2 flex  rounded-lg border  border-gray-900/25 px-2 py-1">
                                <label> {{$user->last_name}}</label>
                            </div>
                        </div>
                        <div class="col-span-full">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                            <div class="mt-2 flex  rounded-lg border  border-gray-900/25 px-2 py-1">
                                <label> {{$user->email}}</label>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone</label>
                            <div class="mt-2 flex  rounded-lg border  border-gray-900/25 px-2 py-1">
                                <label> {{$user->phone}}</label>
                            </div>
                        </div>

                    </div>
                </div>
            </x-card>

            <x-card title="Cars currently rented">
                <div class="mt-3 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach($carsCurrentlyRented as $car)
                        <x-rent-card :car="$car"/>
                    @endforeach
                </div>
            </x-card>

            <x-card title="Rent history">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach($rentHistory as $car)
                        <x-rent-card :car="$car"/>
                    @endforeach
                </div>
            </x-card>
        </div>
    </div>
</x-app>

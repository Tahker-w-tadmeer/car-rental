<x-app>
    <div class="space-y-10 divide-y divide-gray-900/10">
        <div class="space-y-5">
            <x-card class="max-w-2xl" title="Personal information">
                <x-user-information :user="$user" />
            </x-card>

            <x-card title="Cars currently rented">
                <div class="mt-3 grid grid-cols-1 sm:grid-cols-3 gap-4">
                    @foreach($carsCurrentlyRented as $car)
                        <x-rent-card :car="$car"/>
                    @endforeach
                </div>
            </x-card>

            <x-card title="Rent history">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    @foreach($rentHistory as $car)
                        <x-rent-card :car="$car"/>
                    @endforeach
                </div>
            </x-card>
        </div>
    </div>
</x-app>

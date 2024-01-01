<x-app>
    <div class="space-y-4">
        <x-card title="User Information">
            <x-user-information :user="$user" />
        </x-card>

        <x-card :title="'Cars rented by ' . $user->name">

            <div class="grid gap-4 grid-cols-1 md:grid-cols-3">
                @foreach($cars as $car)
                    <x-rent-card :car="$car"/>
                @endforeach
            </div>
        </x-card>
    </div>
</x-app>

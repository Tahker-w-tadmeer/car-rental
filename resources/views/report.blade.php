<x-app>

    @foreach($cars as $car)
        <div >
                <x-rent-card :car="$car">
                </x-rent-card>
        </div>

    @endforeach

     <form action="/report" method="get" class="space-y-4">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-forms.input
                id="pickup_date"
                name="start_date"
                type="date"
                label="Pickup Date"
                required
            />

            <x-forms.input
                id="return_date"
                name="end_date"
                type="date"
                label="Return Data"
                required
            />
        </div>

        <button
            type="submit" class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-500">
            find
        </button>
    </form>
</x-app>

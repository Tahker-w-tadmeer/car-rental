<x-app>

    <div class="space-y-6">
        <form action="/report" method="get">
            <div class="grid grid-cols-3 md:grid-cols-8 gap-4 w-full">
                <x-forms.input
                    id="pickup_date"
                    name="start_date"
                    type="date"
                    label="Start Date"
                    required
                    class="w-full col-span-3"
                />

                <x-forms.input
                    id="return_date"
                    name="end_date"
                    type="date"
                    label="End Data"
                    required
                    class="w-full col-span-3"
                />

                <div class="flex items-end justify-center w-full">
                    <button
                        type="submit" class="col-span-2 px-2 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-500 w-full">
                        Apply
                    </button>
                </div>
            </div>
        </form>

        @if(request()->has(["start_date", "end_date"]))
        <div class="text-gray-600">
            From <span class="text-lg font-semibold text-gray-800">
                {{ request()->date("start_date")?->format("l, jS \o\\f M Y") }}
            </span> to <span class="text-lg font-semibold text-gray-800">
                {{ request()->date("end_date")?->format("l, jS \o\\f M Y") }}
            </span>
        </div>
        @endif

        @if(count($cars) > 0)
            <x-card class="max-w-6xl">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach($cars as $car)
                        <x-rent-card :car="$car" />
                    @endforeach
                </div>
            </x-card>
        @endif
    </div>
</x-app>

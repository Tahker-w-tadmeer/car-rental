<x-app>
    <div class="space-y-6">

    <form action="/status" method="get">
        <div class="grid grid-cols-3 md:grid-cols-8 gap-4 w-full">
        <x-forms.date
            name="date"
            label="Date"
            id="date"
            value="{{ old('date') ?? request()->date('date') }}"
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

        <x-table>
            <x-slot name="head">
                <x-table.th>ID</x-table.th>
                <x-table.th>Car</x-table.th>
                <x-table.th>License Plate</x-table.th>
                <x-table.th>Status</x-table.th>
            </x-slot>


            @foreach($cars as $car)
                <tr>
                    <x-table.td>#{{ $car->id }}</x-table.td>
                    <x-table.td>{{ $car->name }}</x-table.td>
                    <x-table.td>{{ $car->plate_id }}</x-table.td>
                    <x-table.td>{{ $car->status }}</x-table.td>
                </tr>
            @endforeach
        </x-table>

    </div>
</x-app>

<x-app>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 mt-10">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <th> name</th>
                            <th>status</th>
                            <th> price_per_day</th>
                            <th> color</th>
                            <th> mileage</th>
                            <th> office_name</th>
                            <th> total_price</th>
                        </tr>

                        @foreach ($cars as $car)
                            <tr>
                                <x-table :car="$car->model_name"></x-table>
                                <x-table :car="$car->status"></x-table>
                                <x-table :car="$car->price_per_day"></x-table>
                                <x-table :car="$car->color"></x-table>
                                <x-table :car="$car->mileage"></x-table>
                                <x-table :car="$car->office_name"></x-table>
                                <x-table :car="$car->total_price"></x-table>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app>

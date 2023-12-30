<x-app>
    <section class="overflow-hidden py-11 font-poppins">
        <div class="max-w-6xl px-4 py-4 mx-auto lg:py-8 md:px-6">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full px-4 md:w-1/2">
                    <div class="sticky top-0 z-50 overflow-hidden rounded-lg shadow-lg">
                        <div class="relative mb-6 lg:mb-10 lg:h-2/4 overflow-hidden rounded-lg">
                            <img src="{{ $car->image }}" alt="Car Image" class="w-full h-auto">
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2">
                    <div class="lg:pl-20 overflow-hidden rounded-lg shadow-lg">
                        <div style="margin: 20px;">
                            <div class="car-details text-center">
                                <p class="inline-block mb-8 text-3xl font-bold text-gray-700 dark:text-gray-400">
                                    Car details
                                </p>
                            </div>
                            <div>
                                <ul style="font-size: 18px">
                                    <li><strong>ID:</strong> {{ $car->id }}</li>
                                    <li><strong>Model ID:</strong> {{ $car->model_id }}</li>
                                    <li><strong>Year:</strong> {{ $car->year }}</li>
                                    <li><strong>Plate ID:</strong> {{ $car->plate_id }}</li>
                                    <li><strong>Color:</strong> {{ $car->color }}</li>
                                    <li><strong>Office ID:</strong> {{ $car->office_id }}</li>
                                    <li><strong>Mileage:</strong> {{ $car->mileage }}</li>
                                    <li><strong>Type ID:</strong> {{ $car->type_id }}</li>
                                    <li><strong>Category:</strong> {{ $car->category }}</li>
                                    <li><strong>Status:</strong> {{ $car->status }}</li>
                                    <li><strong>Price per Day:</strong> ${{ $car->price_per_day }}</li>
                                </ul>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>

    </section>
</x-app>

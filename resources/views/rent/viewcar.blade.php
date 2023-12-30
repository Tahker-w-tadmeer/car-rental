<x-app>
    <section class="overflow-hidden bg-gradient-to-r  py-11 font-poppins dark:bg-gray-800">
        <div class="max-w-6xl px-4 py-4 mx-auto lg:py-8 md:px-6">
            <div class="flex flex-wrap -mx-4" style="border-width: 2px; border-radius: 15px">
                <div class="w-full px-4 md:w-1/2">
                    <div class="sticky top-0 z-50 overflow-hidden rounded-lg shadow-lg">
                        <div class="relative mb-6 lg:mb-10 lg:h-2/4 overflow-hidden rounded-lg">
                            <img src="{{ $selectedCar->image }}" alt="Car Image" class="w-full h-auto">
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2">
                    <div class="lg:pl-20 overflow-hidden rounded-lg shadow-lg" style="border-width: 2px; border-radius: 15px">
                        <div style="margin: 20px;box-shadow:10px " >
                            <div class="car-details text-center" >
                                <p class="inline-block mb-8 text-3xl font-bold text-gray-700 dark:text-gray-400">
                                    Car details
                                </p>
                            </div>

                            <div>
                                <ul style="font-size: 18px">
                                    <li><strong>ID:</strong> {{ $selectedCar->id }}</li>
                                    <li><strong>Model ID:</strong> {{ $selectedCar->model_id }}</li>
                                    <li><strong>Year:</strong> {{ $selectedCar->year }}</li>
                                    <li><strong>Plate ID:</strong> {{ $selectedCar->plate_id }}</li>
                                    <li><strong>Color:</strong> {{ $selectedCar->color }}</li>
                                    <li><strong>Office ID:</strong> {{ $selectedCar->office_id }}</li>
                                    <li><strong>Mileage:</strong> {{ $selectedCar->mileage }}</li>
                                    <li><strong>Type ID:</strong> {{ $selectedCar->type_id }}</li>
                                    <li><strong>Category:</strong> {{ $selectedCar->category }}</li>
                                    <li><strong>Status:</strong> {{ $selectedCar->status }}</li>
                                    <li><strong>Price per Day:</strong> ${{ $selectedCar->price_per_day }}</li>
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>

    <x-forms.rent-form :price="$selectedCar->price_per_day"
                      :carId="$selectedCar->id
"/>

</x-app>

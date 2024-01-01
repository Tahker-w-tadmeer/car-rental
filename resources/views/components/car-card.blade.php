@props(['car'])
<article
    class="rounded-xl bg-white shadow-lg overflow-hidden">
    <div class="flex flex-col">
        <x-cars.image-card :car="$car" />

        <div class="flex flex-col justify-between mt-2 pt-2 pb-3 px-3">
            <header class="text-xl text-gray-900 font-semibold">
                <span class="text-black-900" style="font-size: larger">{{ $car->name }}</span> <span
                    class="text-gray-600">{{ $car->year }}</span>
            </header>

            <div class="flex-1 flex flex-col justify-between ">
                <div class="mt-6">
                    <x-cars.details-card :car="$car" />

                    <div class="mt-3">
                        <p class="text-gray-700">
                            <span class="font-medium">{{ $car->mileage }}</span> Km
                        </p>

                        <div style="color: {{ $car->color }}">
                            {{ ucwords($car->color) }}
                        </div>

                        <div class="mt-3 col-span-1 flex items-center">
                            <x-cars.plate :car="$car" />
                        </div>
                    </div>

                    <div class="mt-3">
                        <p class="text-bold dark:text-black-400">
                            <span class="text-gray-900 text-2xl font-semibold">${{ $car->price_per_day }}</span><span
                                class="text-gray-700 text-sm">/day</span>
                        </p>
                    </div>

                    <footer class="flex justify-end mb-3 mr-2">
                        @if($car->isActive())
                            <div>
                                <a href="/cars/{{$car->id}}"
                                   class="transition-colors duration-300 text-sm font-semibold bg-blue-50 border border-blue-600 text-blue-600 hover:text-blue-100 hover:bg-blue-600 rounded-lg py-3 px-4" >
                                    Rent
                                </a>
                            </div>
                        @else
                            <a>
                                <a href="/cars/{{$car->id}}"
                                   class="transition-colors duration-300 text-xs font-semibold bg-red-50 text-red-600 hover:text-red-100 hover:bg-red-600 rounded-lg py-1 px-3">
                                    Out of Service
                                </a>
                        @endif
                    </footer>
                </div>
            </div>
        </div>
    </div>
</article>

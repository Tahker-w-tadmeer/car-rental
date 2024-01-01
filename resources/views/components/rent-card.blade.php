@props(['car'])
<article
    class="rounded-xl bg-white shadow overflow-hidden">
    <div class="flex flex-col">
        <x-cars.image-card :car="$car" />
        <div class="flex flex-col justify-between mt-3 pt-4 pb-3 px-3">
            <header class="text-xl text-gray-900 font-semibold">
                {{ $car->name }} <span class="text-gray-600">{{ $car->year }}</span>
            </header>

            <div class="flex-1 flex flex-col justify-between ">
                <div class="mt-4">
                    <x-cars.details-card :car="$car" />
                </div>
                <div class="mt-3">
                    <p class="text-bold dark:text-black-400">
                        <span class="text-gray-900 text-xl font-semibold">${{ $car->total_price }}</span><span
                            class="text-gray-700 text-sm"></span>
                    </p>
                </div>

                <div class="mt-3">
                    <x-cars.plate :car="$car" />
                </div>

                <div class="space-y-2 mt-4">
                    <div>
                        <p>
                            <span class="text-gray-900 font-semibold">Rented at:</span>
                            {{ $car->reserved_at->format('d/m/Y h:i a') }}
                        </p>
                    </div>

                    <div>
                        <p>
                            <span class="text-gray-900 font-semibold">Pickup Date:</span>
                            {{ $car->pickup_date->format('d/m/Y') }}
                        </p>
                    </div>
                    <div>
                        <p>
                            <span class="text-gray-900 font-semibold">Return Date:</span>
                            <span>
                           {{ $car->return_date->format('d/m/Y') }}
                       </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>

@props(['car'])
<article
    class="border border-black border-opacity-0 rounded-xl bg-white shadow">
    <div class="flex flex-col">
        <div class="">
            <img src="{{ asset($car->image) }}"
                 alt="Car {{ $car->name  }}"
                 class="w-full h-auto object-cover"
            >
        </div>
        <div class="flex flex-col justify-between mt-3 pt-4 pb-3 px-3">
            <header class="text-xl text-gray-900 font-semibold">
                {{ $car->name }} <span class="text-gray-600">{{ $car->year }}</span>
            </header>

            <div class="flex-1 flex flex-col justify-between ">
                <div class="mt-2">
                    <div class="space-x-2">
                        <span
                           class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                           style="font-size: 10px">{{ $car->category }}</span>
                        <span
                            class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                            style="font-size: 10px">{{ $car->type }}</span>
                        <span
                            class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                            style="font-size: 10px">{{ $car->plate_id }}</span>
                    </div>
                </div>
                <div class="mt-3">
                    <p class="text-bold dark:text-black-400">
                        <span class="text-gray-900 text-xl font-semibold">${{ $car->total_price }}</span><span
                            class="text-gray-700 text-sm"></span>
                    </p>
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

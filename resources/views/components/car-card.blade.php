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
                    </div>
                </div>
                <div class="mt-3">
                    <p class="text-bold dark:text-black-400">
                        <span class="text-gray-900 text-xl font-semibold">${{ $car->price_per_day }}</span><span
                            class="text-gray-700 text-sm">/day</span>
                    </p>

                </div>
                <footer class="flex justify-end mt-8">
                    <div>
                        @if($car->status == 'Active')
                            <a href="/cars/{{$car->id}}"
                               class="transition-colors duration-300 text-xs font-semibold bg-blue-50 border border-blue-600 text-blue-600 hover:text-blue-100 hover:bg-blue-600 rounded-lg py-2 px-4">
                                Rent
                            </a>
                            @else
                            <span
                               class="text-xs font-semibold bg-red-100 text-red-600 rounded-lg py-1 px-2">
                                Not Available
                            </span>
                        @endif
                    </div>
                </footer>
            </div>
        </div>
    </div>
</article>

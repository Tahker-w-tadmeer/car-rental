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
                    <span class="text-black-900" style="font-size: larger">{{ $car->name }}</span> <span class="text-gray-600">{{ $car->year }}</span>
                </header>
                <div class="border border-gray-300 rounded-lg">
                    <table class="table-auto w-full">
                        <tbody>
                        <tr>
                            <td class="border-b border-gray-300 border-r p-3">
                                <span class="text-gray-300 text-S font-bold" style="color: #2087c7; font-size: 18px">Mileage</span>
                            </td>
                            <td class="border-b border-gray-300 p-3">
                                <span class="text-gray-300 text-S font-bold" style="color: black; font-size: 15px">{{ $car->mileage }} Km/h</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-300 border-r p-3">
                                <span class="text-gray-300 text-S font-bold" style="color: #2087c7; font-size: 18px">ID</span>
                            </td>
                            <td class="border-b border-gray-300 p-3">
                                <span class="text-gray-300 text-S font-bold" style="color: black; font-size: 15px">{{ $car->id }}</span>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>


                <div class="flex-1 flex flex-col justify-between ">
                    <div class="mt-2">
                        <div class="space-x-2">

                            <span
                                class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                style="font-size: 10px">{{ $car->transmission }}</span>

                            <span
                                class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                style="font-size: 10px">{{ $car->fuel }}</span>


                            <span
                                class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                style="font-size: 10px">{{ $car->type }}</span>



                        </div>

                    <div class="mt-3">

                        <p class="text-bold dark:text-black-400">
                            <span class="text-gray-900 text-xl font-semibold">${{ $car->price_per_day }}</span><span
                                class="text-gray-700 text-sm">/day</span>
                        </p>

                    </div>

                    <footer class="flex justify-end mt-8">
                        @if($car->isActive())
                            <div>
                                <a href="/cars/{{$car->id}}"
                                   class="transition-colors duration-300 text-xs font-semibold bg-blue-50 border border-blue-600 text-blue-600 hover:text-blue-100 hover:bg-blue-600 rounded-lg py-2 px-4">
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
    </article>

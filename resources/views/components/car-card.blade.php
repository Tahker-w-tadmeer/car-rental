@props(['car'])
<article
    class="rounded-xl bg-white shadow-lg overflow-hidden">
    <div class="flex flex-col">
        @if($car->image === asset("images/car.png"))
            <div class="h-[150px] bg-gray-100">
                <img src="{{ $car->image }}"
                     alt="Car {{ $car->name  }}"
                     class="w-full"
                >
            </div>
        @else
            <div class="h-[150px] w-full">
                <img src="{{ $car->image }}"
                     alt="Car {{ $car->name  }}"
                     class="w-full h-full object-cover object-center"
                >
            </div>
        @endif

        <div class="flex flex-col justify-between mt-2 pt-2 pb-3 px-3">
            <header class="text-xl text-gray-900 font-semibold">
                <span class="text-black-900" style="font-size: larger">{{ $car->name }}</span> <span
                    class="text-gray-600">{{ $car->year }}</span>
            </header>

            <div class="flex-1 flex flex-col justify-between ">
                <div class="mt-6">
                    <div class="space-x-2 flex items-center">

                        <div title="{{ $car->fuel }}" class="flex items-center space-x-1">
                            @if($car->fuel == "Electric")
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-6 h-6 text-blue-600"
                                     fill="currentColor"
                                     viewBox="0 0 448 512">
                                    <path
                                        d="M349.4 44.6c5.9-13.7 1.5-29.7-10.6-38.5s-28.6-8-39.9 1.8l-256 224c-10 8.8-13.6 22.9-8.9 35.3S50.7 288 64 288H175.5L98.6 467.4c-5.9 13.7-1.5 29.7 10.6 38.5s28.6 8 39.9-1.8l256-224c10-8.8 13.6-22.9 8.9-35.3s-16.6-20.7-30-20.7H272.5L349.4 44.6z"/>
                                </svg>
                            @elseif($car->fuel == "Gas")
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-6 h-6 text-gray-600"
                                     fill="currentColor"
                                     viewBox="0 0 512 512">
                                    <path
                                        d="M32 64C32 28.7 60.7 0 96 0H256c35.3 0 64 28.7 64 64V256h8c48.6 0 88 39.4 88 88v32c0 13.3 10.7 24 24 24s24-10.7 24-24V222c-27.6-7.1-48-32.2-48-62V96L384 64c-8.8-8.8-8.8-23.2 0-32s23.2-8.8 32 0l77.3 77.3c12 12 18.7 28.3 18.7 45.3V168v24 32V376c0 39.8-32.2 72-72 72s-72-32.2-72-72V344c0-22.1-17.9-40-40-40h-8V448c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32V64zM96 80v96c0 8.8 7.2 16 16 16H240c8.8 0 16-7.2 16-16V80c0-8.8-7.2-16-16-16H112c-8.8 0-16 7.2-16 16z"/>
                                </svg>
                            @elseif($car->fuel == "Hybrid")
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-5 h-5 text-green-600"
                                     fill="currentColor"
                                     viewBox="0 0 512 512">
                                    <path
                                        d="M32 64C32 28.7 60.7 0 96 0H256c35.3 0 64 28.7 64 64V256h8c48.6 0 88 39.4 88 88v32c0 13.3 10.7 24 24 24s24-10.7 24-24V222c-27.6-7.1-48-32.2-48-62V96L384 64c-8.8-8.8-8.8-23.2 0-32s23.2-8.8 32 0l77.3 77.3c12 12 18.7 28.3 18.7 45.3V168v24 32V376c0 39.8-32.2 72-72 72s-72-32.2-72-72V344c0-22.1-17.9-40-40-40h-8V448c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32V64zM96 80v96c0 8.8 7.2 16 16 16H240c8.8 0 16-7.2 16-16V80c0-8.8-7.2-16-16-16H112c-8.8 0-16 7.2-16 16z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-5 h-5 text-green-600"
                                     fill="currentColor"
                                     viewBox="0 0 448 512">
                                    <path
                                        d="M349.4 44.6c5.9-13.7 1.5-29.7-10.6-38.5s-28.6-8-39.9 1.8l-256 224c-10 8.8-13.6 22.9-8.9 35.3S50.7 288 64 288H175.5L98.6 467.4c-5.9 13.7-1.5 29.7 10.6 38.5s28.6 8 39.9-1.8l256-224c10-8.8 13.6-22.9 8.9-35.3s-16.6-20.7-30-20.7H272.5L349.4 44.6z"/>
                                </svg>
                            @endif
                        </div>


                        <div>
                                <span
                                    @class([
                                        "border-red-600 text-red-600" => $car->transmission === "Automatic",
                                        "border-cyan-600 text-cyan-600" => $car->transmission === "Manual",
                                        "px-3 py-1 border rounded-full text-xs uppercase font-semibold"
                                    ])
                                    >
                                    {{ $car->transmission }}
                                </span>
                        </div>

                        <div>
                                <span
                                    class="px-3 py-1 border border-blue-800 rounded-full text-blue-800 text-xs uppercase font-semibold">
                                    {{ $car->type }}
                                </span>
                        </div>
                    </div>

                    <div class="mt-3">
                        <p class="text-gray-700">
                            <span class="font-medium">{{ $car->mileage }}</span> Km
                        </p>

                        <div style="color: {{ $car->color }}">
                            {{ ucwords($car->color) }}
                        </div>

                        <div class="mt-3 col-span-1 flex items-center">
                            <div class="text-center border border-gray-900 bg-gray-50 text-gray-900 rounded-sm px-5 py-3 flex flex-col">
                                <span class="text-xs font-bold">{{ $car->office["city"]["name"] }}</span>
                                <span class="text-sm font-medium">{{ $car->plate_id }}</span>
                            </div>
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

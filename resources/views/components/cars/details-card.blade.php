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

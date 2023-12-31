<x-app>
    <main class="max-w-6xl mx-auto space-y-8">

        @foreach($cars as $city => $offices)
            <h1 class="text-3xl font-bold">{{ $city }}</h1>

            @foreach($offices as $office => $cars)
                <h2 class="text-xl font-bold">{{ $office }}</h2>

                <x-car-grid :cars="$cars"></x-car-grid>
            @endforeach

            <hr class="border-2 border-gray-800">
        @endforeach
    </main>
</x-app>

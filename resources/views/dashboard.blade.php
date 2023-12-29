<x-app>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($cars->count())
            <x-car-grid :cars="$cars"></x-car-grid>
        @else
            <p class="text-center">No car yet. Please check back later.</p>
        @endif
    </main>
</x-app>

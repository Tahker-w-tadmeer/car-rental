<x-app>

    <div class="space-y-6">
        <x-date-range-selector url="/report" />

        @if(count($cars) > 0)
            <x-card class="max-w-6xl">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach($cars as $car)
                        <x-rent-card :car="$car" />
                    @endforeach
                </div>
            </x-card>
        @endif
    </div>
</x-app>

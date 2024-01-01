@props(['cars'])
<div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-6">
    @foreach($cars as $car)
        <x-car-card :car="$car"></x-car-card>
    @endforeach
</div>

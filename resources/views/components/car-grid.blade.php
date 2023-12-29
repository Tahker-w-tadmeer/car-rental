@props(['cars'])
    @if($cars->count() > 1)
        <div class="lg:grid lg:grid-cols-3">
            @foreach($cars as $car)
                <x-car-card :car="$car" class="{{$loop->iteration>3?'col-span-3':'col-span-2'}}"></x-car-card>
            @endforeach
        </div>
    @endif

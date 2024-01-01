@props(['car'])

@if($car->image === asset("images/car.png"))
    <div class="h-[200px] bg-gray-100 flex items-center justify-center">
        <img src="{{ $car->image }}"
             alt="Car {{ $car->name  }}"
             class="w-full"
        >
    </div>
@else
    <div class="h-[200px] w-full">
        <img src="{{ $car->image }}"
             alt="Car {{ $car->name  }}"
             class="w-full h-full object-cover object-center"
        >
    </div>
@endif

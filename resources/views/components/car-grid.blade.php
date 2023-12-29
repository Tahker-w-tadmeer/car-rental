@props(['cars'])
    <x-main-artical :cars="$cars[0]"></x-main-artical>
    @if($cars->count() > 1)
        <div class="lg:grid lg:grid-cols-6">
            @foreach($cars as $car)
                <x-artical :car="$car" class="{{$loop->iteration>3?'col-span-3':'col-span-2'}}"></x-artical>
            @endforeach
            @endif
        </div>

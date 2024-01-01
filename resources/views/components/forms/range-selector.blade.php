@props([
    'nameMin',
    'nameMax',
    'label' => "",
    'id' => rand(1, 1000),
    "min" => 0,
    "max" => 100,
    "valueMin" => old($nameMin) ?? $min,
    "valueMax" => old($nameMax) ?? $max,
])

<div
    x-data="{ min: {{ $valueMin }}, max: {{ $valueMax }}, background: '' }"
    x-effect="fillSlider"
     {{ $attributes->merge(['class' => 'flex flex-col w-[80%] mx-[35px] my-auto']) }}
>
    <script>
        function fillSlider() {
            let sliderColor = "#ed7474";
            let rangeColor = "#6366F1";

            const rangeDistance = {{ $max }} - {{ $min }};
            const fromPosition = this.min - {{ $min }};
            const toPosition = this.max - {{ $min }};
            this.background = `linear-gradient(
              to right,
              ${sliderColor} 0%,
              ${sliderColor} ${(fromPosition)/(rangeDistance)*100}%,
              ${rangeColor} ${((fromPosition)/(rangeDistance))*100}%,
              ${rangeColor} ${(toPosition)/(rangeDistance)*100}%,
              ${sliderColor} ${(toPosition)/(rangeDistance)*100}%,
              ${sliderColor} 100%)`;
        }
    </script>

    <div class="relative min-h-[50px]">
        <input
            x-model="min"
            id="{{ $id }}-fromSlider"
            type="range"
            value="{{ $valueMin }}"
            min="{{ $min }}"
            max="{{ $max }}"
            class="absolute w-full text-xl
            leading-6 appearance-none cursor-text
             pointer-events-none bg-stone-300
              text-zinc-500 h-0 z-10"
        />
        <input
            x-model="max"
            id="{{ $id }}-toSlider"
            type="range"
            :style="{
                background: background
            }"
            value="{{ $valueMax }}"
            min="{{ $min }}"
            max="{{ $max }}"
            class="absolute w-full h-px text-xl leading-6 appearance-none cursor-text pointer-events-none bg-stone-300 text-zinc-500"
        />
    </div>
    <div class="relative flex justify-between">
        <div class="">
            <div class="">Min</div>
            <input x-model="min"
                   name="{{ $nameMin }}"
                   class="w-20 h-8 text-xl leading-6 cursor-text text-zinc-500"
                   type="number" id="{{ $id }}-fromInput" value="{{ $valueMin }}" min="{{ $min }}" max="{{ $max }}" />
        </div>
        <div class="">
            <div class="">Max</div>
            <input x-model="max"
                   name="{{ $nameMax }}"
                   class="w-20 h-8 text-xl leading-6 cursor-text text-zinc-500"
                    type="number" id="{{ $id }}-toInput" value="{{ $valueMax }}" min="{{ $min }}" max="{{ $max }}" />
        </div>
    </div>

    <style>
        input[type=range]::-webkit-slider-thumb {
            -webkit-appearance: none;
            pointer-events: all;
            width: 24px;
            height: 24px;
            background-color: #fff;
            border-radius: 50%;
            box-shadow: 0 0 0 1px #C6C6C6;
            cursor: pointer;
        }

        input[type=range]::-moz-range-thumb {
            -webkit-appearance: none;
            pointer-events: all;
            width: 24px;
            height: 24px;
            background-color: #fff;
            border-radius: 50%;
            box-shadow: 0 0 0 1px #C6C6C6;
            cursor: pointer;
        }

        input[type=range]::-webkit-slider-thumb:hover {
            background: #f7f7f7;
        }

        input[type=range]::-webkit-slider-thumb:active {
            box-shadow: inset 0 0 3px #387bbe, 0 0 9px #387bbe;
            -webkit-box-shadow: inset 0 0 3px #387bbe, 0 0 9px #387bbe;
        }

        input[type="range"] {
            -webkit-appearance: none;
            appearance: none;
            height: 2px;
            width: 100%;
            position: absolute;
            background-color: #C6C6C6;
            pointer-events: none;
        }
    </style>
</div>

@props(['car'])
<article
    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-8 px-30 lg:flex">
        <div class="flex-1 lg:mr-1 ">
            <img src="{{ asset($car->image) }}"
                 alt="Blog Post illustration"
                 class="rounded-xl w-200 h-200"
            >
        </div>
        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <a href="#"
                       class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                       style="font-size: 10px">{{ $car->model_id }}</a>
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        {{ $car->type_name}}
                    </h1>
                </div>
            </header>

            <div class="text-sm mt-2 space-y-4">
                <p>
                    year:
                    {{$car->year}}
                </p>
                <p>
                    color:
                    {{$car->color}}
                </p>
                <p>
                    mileage:
                    {{$car->mileage}}
                </p>
                <p>
                    plate_id:
                    {{$car->plate_id}}
                </p>

                <p class="mt-4">
                    color:
                    {{ $car->color}}
                </p>
            </div>
            @if ($car->status=='Active')
                <div class="rounded-full w-6 h-6 bg-green-600">
                    &nbsp;
                </div>
            
            @else
            
            <div class="rounded-full w-6 h-6 bg-red-600">
                &nbsp;
            </div>
            @endif


            <footer class="flex justify-between items-center mt-8">
                <div class="hidden lg:block">
                    <a href="/cars/{{ $car->id }}"
                       class="mt-20 transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Rent</a>
                </div>
            </footer>
        </div>
    </div>
</article>

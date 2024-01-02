<x-app>
    <div class="space-y-6">

        <div class="bg-white relative max-w-4xl mx-auto shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-2xl leading-6 font-medium text-gray-900">
                    {{ $car->brand_name }} {{ $car->name }} <span class="text-gray-600">{{ $car->year }}</span>
                </h3>


                    <div class="mt-3">
                        @if(auth()->user()->isAdmin())
                        <form method="POST" action="/cars/{{ $car->id }}/status">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            @if($car->isActive())
                                <button
                                    type="submit"
                                    name="status"
                                    value="Out of Service"
                                    class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-800"
                                >
                                    Active
                                </button>
                            @else
                                <button
                                    type="submit"
                                    name="status"
                                    value="Active"
                                    class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-red-100 text-red-800"
                                >
                                    Out of Service
                                </button>
                            @endif

                        </form>
                        @else
                            @if($car->isActive())
                                <span
                                    class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-800"
                                >
                                    Active
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-red-100 text-red-800"
                                >
                                    Out of Service
                                </span>
                            @endif
                        @endif
                    </div>
            </div>

            <div class="border-t border-gray-200">
                <dl>
                    <div class="odd:bg-white bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Fuel
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$car->fuel}}
                        </dd>
                    </div>
                    <div class="odd:bg-white bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Transmission
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$car->transmission}}
                        </dd>
                    </div>
                    <div class="odd:bg-white bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Type
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $car->type }}
                        </dd>
                    </div>
                    <div class="odd:bg-white bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            $/day
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            ${{$car->price_per_day}}
                        </dd>
                    </div>
                    <div class="odd:bg-white bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Mileage
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$car->mileage}} Km
                        </dd>
                    </div>
                    <div class="odd:bg-white bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            License plate
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$car->plate_id}}
                        </dd>
                    </div>

                    <div class="odd:bg-white bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Office
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$car->office_name}} <span class="text-gray-800 text-sm">({{$car->city_name}})</span>
                        </dd>
                    </div>
                </dl>

            </div>
            <div class="sm:absolute right-0 top-0 sm:h-auto sm:w-[250px] md:w-[320px]">
                <img class="" src="{{ $car->image }}">
            </div>
        </div>

        @if($car->isActive())
            <x-card title="Rent Car">
                <x-forms.rent-form :car="$car"/>
            </x-card>
        @endif

        <x-card title="Reservations">
            <div>
                <form action="{{ route("cars.show", $car) }}" method="get">
                    <div class="grid grid-cols-3 md:grid-cols-8 gap-4 w-full">
                        <x-forms.input
                            id="pickup_date"
                            name="start"
                            type="date"
                            label="Start Date"
                            required
                            class="w-full col-span-3"
                        />

                        <x-forms.input
                            id="return_date"
                            name="end"
                            type="date"
                            label="End Data"
                            required
                            class="w-full col-span-3"
                        />

                        <div class="flex items-end justify-center w-full">
                            <button
                                type="submit" class="col-span-2 px-2 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-500 w-full">
                                Apply
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="text-gray-600 mt-3">
                From <span class="text-lg font-semibold text-gray-800">
                {{ request()->date("start")?->format("l, jS \o\\f M Y") }}
            </span> to <span class="text-lg font-semibold text-gray-800">
                {{ request()->date("end")?->format("l, jS \o\\f M Y") }}
            </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                @foreach($rentals as $rental)
                    <div class="border border-gray-800 rounded px-3 py-4 flex flex-col space-y-3">
                        <a href="{{ route("users.show", $rental->id) }}"
                           class="font-semibold text-blue-600 hover:text-blue-800">{{ $rental->first_name }} {{ $rental->last_name }}</a>
                        <span class="text-lg font-medium">${{ $rental->total_price }}</span>
                        <span class="text-gray-600">{{ $rental->pickup_date->format('D jS \o\f M Y') }} - {{ $rental->return_date->format('D jS \o\f M Y') }}</span>
                    </div>
                @endforeach
            </div>
        </x-card>
    </div>
</x-app>

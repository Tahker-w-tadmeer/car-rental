<x-app>
    <div class="space-y-6">

        <div class="bg-white relative max-w-4xl mx-auto shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-2xl leading-6 font-medium text-gray-900">
                    {{ $car->brand_name }} {{ $car->name }} <span class="text-gray-600">{{ $car->year }}</span>
                </h3>

                <div class="mt-3">
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
                            {{$car->type_name}}
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
            <div class="absolute right-0 top-0">
                <img src="{{ asset($car->image) }}">
            </div>
        </div>

        @if($car->isActive())
            <x-card title="Rent Car">
                <x-forms.rent-form :car="$car"/>
            </x-card>
        @endif
    </div>
</x-app>

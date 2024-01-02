@props(['car'])
<article
    class="rounded-xl bg-white shadow overflow-hidden">
    <div class="flex flex-col">
        <x-cars.image-card :car="$car" />
        <div class="flex flex-col justify-between mt-3 pt-4 pb-3 px-3">
            <header class="text-xl text-gray-900 font-semibold">
                {{ $car->name }} <span class="text-gray-600">{{ $car->year }}</span>
            </header>

            <div class="flex-1 flex flex-col justify-between">
                <div class="mt-4">
                    <x-cars.details-card :car="$car" />
                </div>
                <div class="mt-3">
                    <p class="text-bold dark:text-black-400">
                        <span class="text-gray-900 text-xl font-semibold">${{ $car->total_price }}</span><span
                            class="text-gray-700 text-sm"></span>
                    </p>
                </div>

                <div class="mt-3">
                    <x-cars.plate :car="$car" />
                </div>

                <div class="space-y-2 mt-4">
                    <div>
                        <p>
                            <span class="text-gray-900 font-semibold">Rented at:</span>
                            {{ $car->reserved_at->format('d/m/Y h:i a') }}
                        </p>
                    </div>

                    <div class="flex flex-col space-y-1 mt-8">
                        <span>
                            <time datetime="{{ $car->pickup_date->format("Y-m-d") }}">{{ $car->pickup_date->format('D jS \o\f M Y') }}</time>
                        </span>

                        <span>
                            <time datetime="{{ $car->return_date->format("Y-m-d") }}">{{ $car->return_date->format('D jS \o\f M Y') }}</time>
                        </span>
                    </div>
                </div>

                <div>
                    <span class="text-gray-900 font-semibold text-lg">{{ $car->total_days }}</span> <span>{{ str("day")->plural($car->total_days) }}</span>
                </div>

                <div>
                    <span>Reserved By </span>
                    <a class="text-blue-700 hover:text-blue-900" href="{{ route("users.show", $car->user_id) }}">{{ $car->user_name }}</a>
                </div>

                <div class="flex items-center justify-end mt-3">
                    <a href="{{ route("cars.show", $car) }}"
                    class="transition-colors duration-300 text-sm font-semibold bg-blue-50 border border-blue-600 text-blue-600 hover:text-blue-100 hover:bg-blue-600 rounded-lg py-2 px-3"
                    >
                        View
                    </a>
                </div>
            </div>
        </div>
    </div>
</article>

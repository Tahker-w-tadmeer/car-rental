<x-app>
    <div class="w-full sm:px-2 md:pt-20 md:fixed inset-0 flex items-start">
        <div class="w-full bg-gray-200 py-4 px-6 rounded-lg lg:ml-72">
            <form action="{{ route('dashboard') }}" method="GET">
                <div class="grid grid-cols-3 sm:grid-cols-9 md:grid-cols-12 gap-4">
                    <x-forms.input
                        name="search"
                        class="col-span-3"
                        label="Search"
                        id="search"
                        :value="request('search')"
                    />

                    <x-forms.select
                        :options="['all' => 'All', 'Automatic' => 'Automatic', 'Manual' => 'Manual']"
                        label="Transmission"
                        id="search-transmission"
                        name="transmission"
                        class="col-span-3"
                        :selected="request('transmission')"
                    />

                    <x-forms.select
                        :options="$offices"
                        label="Office"
                        id="search-office"
                        name="office"
                        class="col-span-3"
                        :selected="request('office')"
                    />

                    <x-forms.select
                        :options="$types"
                        label="Type"
                        id="search-type"
                        name="type"
                        class="col-span-3"
                        :selected="request('type')"
                    />

                    <x-forms.range-selector
                        name-max="max_price"
                        name-min="min_price"
                        label="Price"
                        id="search-price"
                        :value-max="request('max_price')"
                        :value-min="request('min_price')"
                        :max="$range->max"
                        :min="$range->min"
                        class="col-span-3"
                    />

                    <div class="flex justify-center items-end">
                        <button type="submit"
                                class="bg-indigo-600 text-white col-span-1 rounded-lg px-3 py-2 font-semibold text-sm transition-colors duration-300 hover:bg-indigo-700"
                        >
                            Apply
                        </button>
                    </div>

                    <div class="flex justify-center items-end">
                        <a href="{{ route('dashboard') }}"
                                class="bg-gray-600 text-white col-span-1 rounded-lg px-3 py-2 font-semibold text-sm transition-colors duration-300 hover:bg-gray-700"
                        >
                            Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <main class="max-w-6xl mx-auto space-y-8 mt-6 md:mt-40">
        @if(count($cars) == 0)
            <div class="mt-32 py-6 text-center flex flex-col items-center rounded-lg bg-gray-200 justify-center">
                <svg
                    class="mx-auto h-12 w-12 text-gray-600" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M135.2 117.4L109.1 192H402.9l-26.1-74.6C372.3 104.6 360.2 96 346.6 96H165.4c-13.6 0-25.7 8.6-30.2 21.4zM39.6 196.8L74.8 96.3C88.3 57.8 124.6 32 165.4 32H346.6c40.8 0 77.1 25.8 90.6 64.3l35.2 100.5c23.2 9.6 39.6 32.5 39.6 59.2V400v48c0 17.7-14.3 32-32 32H448c-17.7 0-32-14.3-32-32V400H96v48c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V400 256c0-26.7 16.4-49.6 39.6-59.2zM128 288a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>
                <h3 class="mt-2 text-sm font-semibold text-gray-900">
                    No cars found
                </h3>
                <p class="mt-1 text-sm text-gray-500">
                    Try adjusting your search criteria
                </p>
            </div>

        @endif

        @foreach($cars as $city => $offices)
            <h1 class="text-3xl font-bold">{{ $city }}</h1>

            @foreach($offices as $office => $cars)
                <h2 class="text-xl font-bold">{{ $office }} </h2>

                <x-car-grid :cars="$cars" ></x-car-grid>
            @endforeach

        @if(!$loop->last)
                <hr class="border-2 border-gray-800">
        @endif
        @endforeach
    </main>
</x-app>

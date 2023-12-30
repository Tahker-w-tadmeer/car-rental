<x-app>
    <div class="space-y-10 divide-y divide-gray-900/10">
        <div class="grid grid-cols-1 gap-x-8 gap-y-8 md:grid-cols-3">
            <div class="px-4 sm:px-0">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Car Data</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">You can add new car/model to the system from this Form .</p>
            </div>

            <form action="{{ route("cars.store") }}"
                  method="post"
                  class="bg-white shadow-sm ring-1 ring-gray-900/5
                  sm:rounded-xl md:col-span-2">
                @csrf
                <div class="px-4 py-6 sm:p-8">
                    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Car photo</label>
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                    </svg>
                                    <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                        <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                </div>
                            </div>
                        </div>

                        <x-forms.select
                            :options="$models"
                            class="col-span-3"
                            name="model_id"
                            label="Model"
                            id="model_id"
                        />

                        <x-forms.select
                            :options="$categories"
                            class="col-span-3"
                            name="category"
                            label="Category"
                            id="category"
                        />

                        <x-forms.select
                            :options="$types"
                            class="col-span-3"
                            name="type_id"
                            label="Type"
                            id="type_id"
                        />

                        <x-forms.select
                            :options="$offices"
                            class="col-span-3"
                            name="office_id"
                            label="Office"
                            id="office_id"
                        />

                        <x-forms.input
                            type="text"
                            name="year"
                            id="year"
                            label="Year"
                            placeholder="2020, 2021, ..."
                            class="col-span-3"
                        />

                        <x-forms.input
                            type="text"
                            name="color"
                            id="color"
                            label="Color"
                            placeholder="red, black, ..."
                            class="col-span-3"
                        />
                        <x-forms.input
                            type="text"
                            name="plate_id"
                            id="plate_id"
                            label="License Plate"
                            placeholder="zxl 002"
                            class="col-span-3"
                            required
                        />
                        <x-forms.input
                            type="number"
                            name="mileage"
                            id="mileage"
                            label="Mileage in Km"
                            placeholder="0-500000 Km"
                            class="col-span-3"
                        />
                        <x-forms.input
                            type="number"
                            name="price_per_day"
                            id="price_per_day"
                            label="Price per day"
                            placeholder="$10-200"
                            class="col-span-3"
                            required
                        />
                    </div>
                </div>

                <div class="w-full flex items-center justify-end pr-8 mb-6">
                    <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                        Submit
                    </button>
                </div>

            </form>
        </div>


    </div>
</x-app>

<x-app>
    <x-card>
        <form action="{{ route("cars.update", $car) }}" method="POST">
            @csrf

            <input type="hidden" name="_method" value="PATCH">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-forms.input
                    name="name"
                    label="Name"
                    value="{{ $car->name }}"
                    readonly
                />

                <x-forms.input
                    name="price_per_day"
                    label="Price per day"
                    value="{{ $car->price_per_day }}"
                />
            </div>


            <div class="w-full flex items-center justify-end mt-6">
                <button type="submit"
                        class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                    Update
                </button>
            </div>
        </form>
    </x-card>
</x-app>

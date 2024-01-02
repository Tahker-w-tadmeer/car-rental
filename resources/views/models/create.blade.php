<x-app>
    <x-card>
        <form action="{{ route("models.store") }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <x-forms.select
                    name="brand_id"
                    id="brand_id"
                    label="Choose Brand (Optional)"
                    :options="$brands"
                />

                <x-forms.input
                    name="brand"
                    id="brand"
                    label="Or Create a new Brand (Optional)"
                    placeholder="Ford, Toyota, ..."
                />

                <x-forms.input
                    name="name"
                    id="name"
                    label="Model"
                    placeholder="Focus, Corolla, ..."
                />
            </div>

            <button
                type="submit"
                class="mt-4 px-4 py-2 bg-blue-600 text-white hover:bg-blue-800 rounded-md"
            >
                Add Model
            </button>
        </form>
    </x-card>
</x-app>

@props(['car'])

<div class="mt-8">
    <form action="/cars/{{ $car->id }}/rent" method="POST" class="space-y-4">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4"
             x-effect="calculatePrice"
             x-init="calculatePrice()"
             x-data="{
            startDate: '{{ old('pickup_date') ?? '' }}',
            endDate: '{{ old('return_date') ?? '' }}',
            total: null
        }">
            <x-forms.date
                id="pickup_date"
                name="pickup_date"
                type="date"
                label="Pickup Date"
                x-model="startDate"
                required
            />

            <x-forms.date
                id="return_date"
                name="return_date"
                type="date"
                label="Return Data"
                x-model="endDate"
                required
            />

            <div>
                <span class="block text-gray-500 font-bold text-sm">Total Price</span>
                <span class="font-medium text-3xl text-gray-900">
                    $<span x-text="isNaN(total) ? 0 : total"></span>
                </span>
            </div>
        </div>

        <button
                type="submit" class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-500">
            Rent Now $
        </button>
    </form>
</div>
<script>
    const pricePerDay = {{ $car->price_per_day }};

    function calculatePrice() {
        const startDate = new Date(this.startDate);
        const endDate = new Date(this.endDate);
        if(endDate < startDate) {
            this.total = 0;
            return;
        }

        const diffTime = Math.abs(endDate - startDate);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

        this.total = pricePerDay * diffDays;
    }

</script>


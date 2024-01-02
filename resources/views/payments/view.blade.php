<x-app>

    <div class="space-y-6">

        <div class="max-w-lg mx-auto">
            <x-rent-card :car="$car" />
        </div>

        <x-card title="Pay Rental">

            <form action="{{ route("pay.store", $rental) }}" method="POST">
                @csrf

                <x-forms.input
                    type="text"
                    name="card_number"
                    id="card_number"
                    label="Card Number"
                    placeholder="1234 1234 1234 1234"
                    class="col-span-3"
                    required
                />

                <x-forms.input
                    type="text"
                    name="card_holder"
                    id="card_holder"
                    label="Card Holder"
                    placeholder="John Doe"
                    class="col-span-3"
                    required

                />

                <button
                    type="submit" class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-500">
                    $Pay
                </button>

            </form>
        </x-card>

    </div>
</x-app>

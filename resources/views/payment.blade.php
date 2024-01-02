<x-app>

    <div class="space-y-5">
        <x-date-range-selector url="/payment"/>

        <x-table>
            <x-slot name="head">
                <x-table.th>Day</x-table.th>
                <x-table.th>Payment</x-table.th>
                <x-table.th>Number of reservations</x-table.th>
            </x-slot>

            @foreach($payments as $payment)
                <tr>
                    <x-table.td>{{ $payment["date"]->format("d/m/Y") }}</x-table.td>
                    <x-table.td>${{ $payment["price"] }}</x-table.td>
                    <x-table.td>{{ $payment["count"] }}</x-table.td>
                </tr>
            @endforeach

            <tr>
                <x-table.td>Total</x-table.td>
                <x-table.td>${{ $payments->sum("price") }}</x-table.td>
                <x-table.td>{{ $payments->sum("count") }}</x-table.td>
            </tr>
        </x-table>
    </div>
</x-app>


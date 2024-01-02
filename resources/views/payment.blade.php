<x-app>

    <div class="space-y-5">
        <x-date-range-selector url="/payment"/>

        <table class="table-auto">
            <thead>
                <tr>
                    <th>Day</th>
                    <th>Payment</th>
                </tr>
            </thead>
            <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment["date"] }}</td>
                    <td>{{ $payment["price"] }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</x-app>


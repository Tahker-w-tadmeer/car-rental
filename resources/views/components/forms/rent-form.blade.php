@props(['price', 'carId'])

<div class="mt-8">
    <form action="" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="start_date" class="block text-gray-700">Start Date</label>
            <input type="date" name="reserved_at" id="start_date" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        <div>
            <label for="return_date" class="block text-gray-700">End Date</label>
            <input type="date" name="end_date" id="end_date" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        <div>
            <label for="car_id" class="block text-gray-700">Car ID:{{$carId}}</label>
            <span class="block text-gray-700">Price per day: ${{ $price }}</span>
        </div>
        <div>
            <button type="submit" class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-500">Rent Now</button>
        </div>
    </form>
</div>


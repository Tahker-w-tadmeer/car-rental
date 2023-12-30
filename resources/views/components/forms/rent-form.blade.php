@props(['price', 'carId'])

<div class="mt-8">
    <form action="" method="POST" class="space-y-4">
        @csrf
        <div class="container" x-data="{
        startDate: '',
        endDate: '',
        total_price: ''
        }">
            <div>
                <label for="pickup_date" class="block text-gray-700">Start Date</label>
                <input x-model="startDate" type="date" name="pickup_date" id="pickup_date" @change="calculatePrice"
                       class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="return_date" class="block text-gray-700">End Date</label>
                <input x-model="endDate" type="date" name="return_date" id="return_date" @change="calculatePrice"
                       class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>


            <div>
                <label for="car_id" class="block text-gray-700">Car ID:{{$carId}}</label>


                <span class="block text-gray-700" x-text="total_price !== '' ? 'Price: ' + total_price + ' $' : ''"></span>


            </div>
        </div>
        <div>


            <button type="submit" class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-500">Rent Now

            </button>
        </div>
    </form>
</div>
<script>
    function calculatePrice() {
        const startDate = new Date(this.startDate);
        const endDate = new Date(this.endDate);
        const diffTime = Math.abs(endDate - startDate);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        let price = {{$price}};
        this.total_price = price * diffDays;}

</script>


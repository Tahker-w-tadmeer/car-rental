<x-app>
    <div class="space-y-10 divide-y divide-gray-900/10">
        <div class="grid grid-cols-1 gap-x-8 gap-y-8 md:grid-cols-5">
            <div class="px-4 sm:px-0">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Personal information</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">This section contains your personal informations .</p>
            </div>

            <div
                  class="bg-white shadow-sm ring-1 ring-gray-900/5
                  sm:rounded-xl md:col-span-4">
                @csrf
                <div class="px-4 py-6 sm:p-8">
                    <div class="grid max-w-4xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-3">
                            <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                            <div class="mt-2 flex  rounded-lg border  border-gray-900/25 px-2 py-1">
                                <label> {{$info->first_name}}</label>
                            </div>
                        </div>
                        <div class="col-span-3">
                            <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                            <div class="mt-2 flex  rounded-lg border  border-gray-900/25 px-2 py-1">
                                <label> {{$info->last_name}}</label>
                            </div>
                        </div>
                        <div class="col-span-full">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                            <div class="mt-2 flex  rounded-lg border  border-gray-900/25 px-2 py-1">
                                <label> {{$info->email}}</label>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone</label>
                            <div class="mt-2 flex  rounded-lg border  border-gray-900/25 px-2 py-1">
                                <label> {{$info->phone}}</label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="w-full flex items-center justify-end pr-8 mb-6">
                </div>
        </div>
            <div class="px-4 sm:px-0">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Cars currently in rent</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">This section contains your currently cars that are rented informations .</p>
            </div>
            <div
                class="bg-white shadow-sm ring-1 ring-gray-900/5
                  sm:rounded-xl md:col-span-4">
                @csrf
                <div class="px-4 py-6 sm:p-8">
                    <div class="grid max-w-4xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-2">
                            <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                            <div class="mt-2 flex  rounded-lg border  border-gray-900/25 px-2 py-1">
                                <label> {{$info->first_name}}</label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="w-full flex items-center justify-end pr-8 mb-6">
                </div>
            </div>
            <div class="px-4 sm:px-0">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Car rented</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">This section contains your old cars that are rented informations .</p>
            </div>
            <div
                class="bg-white shadow-sm ring-1 ring-gray-900/5
                  sm:rounded-xl md:col-span-4">
                @csrf
                <div class="px-4 py-6 sm:p-8">
                    <div class="grid max-w-4xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <label> {{$info->first_name}}</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full flex items-center justify-end pr-8 mb-6">
                </div>
            </div>


    </div>
    </div>
</x-app>

@props(["url"])

<div>
    <form action="{{ $url }}" method="get">
        <div class="grid grid-cols-3 md:grid-cols-8 gap-4 w-full">
            <x-forms.date
                id="pickup_date"
                name="start"
                type="date"
                label="Start Date"
                :value="request()->date('start')"
                required
                class="w-full col-span-3"
            />

            <x-forms.date
                id="return_date"
                name="end"
                type="date"
                label="End Data"
                :value="request()->date('end')"
                required
                class="w-full col-span-3"
            />

            <div class="flex items-end justify-center w-full">
                <button
                    type="submit" class="col-span-2 px-2 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-500 w-full">
                    Apply
                </button>
            </div>
        </div>
    </form>
</div>

@if(request()->has(["start", "end"]))
    <div class="text-gray-600 mt-3">
        From <span class="text-lg font-semibold text-gray-800">
        {{ request()->date("start")?->format("l, jS \o\\f M Y") }}
        </span> to <span class="text-lg font-semibold text-gray-800">
            {{ request()->date("end")?->format("l, jS \o\\f M Y") }}
        </span>
    </div>
@endif

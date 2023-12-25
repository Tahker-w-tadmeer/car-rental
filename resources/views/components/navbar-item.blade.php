@props(['href'])

<li {{ $attributes }}>
    <a href="{{ $href }}"
       @class([
           'bg-indigo-700 text-white' => ($href === $_SERVER["REQUEST_URI"]),
           'text-indigo-200 hover:text-white hover:bg-indigo-700' => ($href !== $_SERVER["REQUEST_URI"]),
           'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold'
       ])
       class="text-indigo-200 hover:text-white hover:bg-indigo-700 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
        {{ $icon }}

        {{ $slot }}
    </a>
</li>

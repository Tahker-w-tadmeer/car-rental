@props(['options', 'name', 'label', 'id' => rand(1, 1000)])

@php($error = $errors->get($name))

<div {{ $attributes }} x-data='{ selected: "{{ old($name) }}", options: @json($options), open: false, search: "{{ $options[old($name)] ?? '' }}" }'
     @click.away="open=false">
    <label for="{{ $id }}" class="block text-sm font-medium leading-6 text-gray-900">{{ $label }}</label>
    <div class="relative mt-2">
        <input @keydown.enter.prevent="selected=Object.entries(options).filter(([key, value]) => value.toLowerCase().includes(search.toLowerCase()))[0][0] ?? null; open=false" @focus="open=true"
               id="{{ $id }}"
               type="text"
               value="options[selected]"
               x-model="search"
               @class([
                  'block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset
                       focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6',
                     'text-red-900 ring-1 ring-inset ring-red-300 placeholder:text-red-300 focus:ring-2 focus:ring-inset focus:ring-red-500' => $error,
                      'ring-gray-300 placeholder:text-gray-400 focus:ring-indigo-600' => !$error,
                 ])
                   autocomplete="off"
               role="combobox" aria-controls="options" aria-expanded="false">

        <select name="{{ $name }}" id="{{ $id }}-select" class="hidden" x-model="selected">
            @foreach($options as $key => $option)
                <option value="">-</option>
                <option {{ $key == old($name) ? "selected" : "" }} value="{{ $key }}">{{ $option }}</option>
            @endforeach
        </select>
        <button @click="open=!open" type="button" class="absolute inset-y-0 right-0 flex items-center rounded-r-md px-2 focus:outline-none">
            <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                      d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                      clip-rule="evenodd"/>
            </svg>
        </button>

        <ul
            x-show="open"
            style="display: none;"
            class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
            id="options" role="listbox">
            @foreach($options as $key => $option)
                <li
                    x-show="search === '' || options['{{ $key }}'].toLowerCase().includes(search.toLowerCase())"
                    @click="selected = '{{ $key }}'; open= false"
                    :class="{
                     'text-white bg-indigo-600': selected == '{{ $key }}',
                     'text-gray-900': !(selected == '{{ $key }}')
                     }"
                    class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900
                    hover:text-white hover:bg-indigo-600 hover:cursor-pointer transition-colors duration-200
                    " id="option-{{ $key }}" role="option"
                    tabindex="-1">
                    <span
                        :class="{
                            'font-semibold': selected == '{{ $key }}'
                         }"
                        class="block truncate">{{ $option }}</span>

                    <span
                        :class="{
                         'text-white': selected == '{{ $key }}',
                         'text-indigo-600': selected != '{{ $key }}',
                         }"
                        class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600">
                      <svg x-show="selected == '{{ $key }}'" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                              clip-rule="evenodd"/>
                      </svg>
                    </span>
                </li>
            @endforeach
        </ul>
    </div>

    @if($error)
        <p class="mt-2 text-sm text-red-600" id="{{ $id }}-error">{{ $error[0] }}</p>
    @endif
</div>

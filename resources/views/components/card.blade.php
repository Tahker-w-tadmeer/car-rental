@props(['title' => null])

@php
$classes = 'bg-white shadow-lg rounded-lg p-6 mx-auto max-w-4xl';
$attributes = $attributes->class([$classes]);
@endphp

<div {{ $attributes }}>
    @if($title)
        <h2 class="font-medium text-2xl mb-3">{{ $title }}</h2>
    @endif
    {{ $slot }}
</div>

@props(['title' => null])

@php
$classes = 'bg-white shadow-lg rounded-lg p-6';
$attributes = $attributes->class([$classes]);
@endphp

<div {{ $attributes }}>
    @if($title)
        <h2 class="font-medium text-2xl mb-3">{{ $title }}</h2>
    @endif
    {{ $slot }}
</div>

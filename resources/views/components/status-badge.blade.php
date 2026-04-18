@props(['status' => 'pending'])

@php
    $classes = 'text-sm';
    if ($status === 'pending') {
        $classes = 'badge badge-soft badge-danger';
    }
    if ($status === 'in_progress') {
        $classes = 'badge badge-soft badge-warning';
    }
    if ($status === 'completed') {
        $classes = 'badge badge-soft badge-success';
    }
@endphp

<span {{ $attributes(['class' => $classes]) }}> {{ $slot }}</span>

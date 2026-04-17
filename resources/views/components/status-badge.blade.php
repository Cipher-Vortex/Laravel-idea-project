@props(['status' => 'pending'])

@php
    $classes = 'badge badge-soft badge-primary';
    if ($status === 'pending') {
        $classes = 'badge badge-soft badge-primary';
    }
    if ($status === 'in_progress') {
        $classes = 'badge badge-soft badge-warning';
    }
    if ($status === 'completed') {
        $classes = 'badge badge-soft badge-success';
    }
@endphp

<span {{ $attributes(['class' => $classes]) }}> {{ $slot }}</span>

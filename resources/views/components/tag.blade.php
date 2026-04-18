@props(['is' => 'a'])

<{{ $is }} {{ $attributes->merge(['class' => 'border rounded-lg bg-card p-4 block']) }}>
    {{ $slot }}
    </{{ $is }}>

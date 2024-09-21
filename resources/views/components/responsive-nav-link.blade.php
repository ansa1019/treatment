@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'block w-full p-3 border-l-4 border-primary text-primary text-decoration-none transition duration-150 ease-in-out disabled'
            : 'block w-full p-3 border-l-4 border-transparent text-primary text-decoration-none hover:border-secondary hover:bg-gray-100 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

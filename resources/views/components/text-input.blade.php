@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-gray-300 focus:border-primary focus:ring-secondary text-center rounded-md shadow-sm px-1 py-0',
]) !!}>

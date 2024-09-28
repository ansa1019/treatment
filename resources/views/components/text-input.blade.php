@props(['disabled' => false, 'readonly' => false, 'value' => ''])

<input {{ $disabled ? 'disabled' : '' }} {{ $readonly ? 'readonly' : '' }} {!! $attributes->merge([
    'type' => 'text',
    'class' => 'border-gray-300 focus:border-primary focus:ring-secondary text-center rounded-md shadow-sm p-1',
    'value' => $value,
]) !!}>

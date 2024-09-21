@props(['disabled' => false])

<select
    {{ $attributes->merge(['class' => 'form-select text-primary border-gray-300 focus:border-primary focus:ring-secondary text-center rounded-md shadow-sm py-0 pl-1 pr-[25px]']) }}>
    {{ $slot }}
</select>

@props(['disabled' => false])

<div class='flex relative align-items-center w-auto'>
    <i class='absolute fa-solid fa-magnifying-glass input-icon left-[10px]'></i>
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' =>
            'bg-body-tertiary border-gray-300 focus:border-primary focus:ring-secondary rounded-full shadow-sm pl-[30px] pr-1 py-0',
    ]) !!} placeholder="Search">
</div>

<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-secondary focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

<button {{ $attributes->merge(['class' => 'bg-yellow-500 text-white font-semibold px-4 py-2 rounded transition duration-300 hover:bg-yellow-600']) }}>
    {{ $slot }}
</button>
<button {{ $attributes->merge(['class' => 'border-2 border-yellow-500 text-yellow-500 font-semibold py-2 px-4 rounded-lg 
        transition duration-300 ease-in-out
        hover:bg-yellow-600 hover:text-white 
        focus:bg-yellow-500 focus:text-white 
        active:bg-yellow-700 active:border-yellow-700 hidden lg:block']) }}>
    {{ $slot }}
</button>

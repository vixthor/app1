<div class="bg-gray-100 dark:text-white dark:bg-gray-900 rounded-lg shadow-md w-full p-4">
    <img src="{{ asset($image) }}" alt="{{ $title }}" class="w-full h-48 object-cover rounded-t-md">
    <div class="p-4">
        <h2 class="text-xl text-black font-semibold">{{ $title }}</h2>
        <p class="text-gray-600 text-justify">{{ $description }}</p>
        <a href="{{ route('services.show', ['slug' => Str::slug($title)]) }}" 
           class="inline-block mt-4 text-yellow-600 hover:underline">Read More</a>
    </div>
</div>

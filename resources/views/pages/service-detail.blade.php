<x-app-layout>
    {{-- @dd($title, $description, $image) --}}
<div class="container mx-auto py-12">

    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
        <img src="{{ asset($image) }}" alt="{{ $title }}" class="w-full h-64 object-cover rounded-md mb-6">
        <h1 class="text-4xl font-bold mb-4">{{ $title}}</h1>
        <p class="text-gray-700 text-justify">{{ $description }}</p>
        <a href="{{ route('services.index') }}" class="text-yellow-600 hover:underline block mt-4">Back to Services</a>
    </div>
</div>
</x-app-layout>

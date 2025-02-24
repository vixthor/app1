<x-app-layout>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-center mb-8">Photo Gallery</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @php
            $images = [
                ['url' => 'images/oil-rig.jpg', 'caption' => 'Offshore Oil Rig'],
                ['url' => 'images/refinery.jpg', 'caption' => 'Oil Refinery'],
                ['url' => 'images/pipeline.jpg', 'caption' => 'Pipeline Transport'],
                ['url' => 'images/tanker.jpg', 'caption' => 'Oil Tanker'],
                ['url' => 'images/drilling.jpg', 'caption' => 'Drilling Operations'],
                ['url' => 'images/storage.jpg', 'caption' => 'Oil Storage Facility'],
            ];
        @endphp

        @foreach ($images as $image)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset($image['url']) }}" alt="{{ $image['caption'] }}" class="w-full h-56 object-cover">
                <div class="p-4">
                    <p class="text-lg font-semibold text-gray-800">{{ $image['caption'] }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Back Button -->
    <div class="text-center mt-8">
        <a href="{{ url('/') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg shadow-md text-lg font-semibold hover:bg-gray-700 transition duration-300">
            Back to Home
        </a>
    </div>
</div>
</x-app-layout>
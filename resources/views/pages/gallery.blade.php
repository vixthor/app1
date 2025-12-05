<x-app-layout>
<div class="container mx-auto px-4 py-8">
    <div class="space-y-8 mb-10">
        <h1 class="text-4xl font-bold text-center mb-4">Photo Gallery</h1>
     <img class="w-20 md:w-[238px] mx-auto" src="{{ asset('images/home/line.svg') }}" alt="">
          
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @php
            $images = [
                ['url' => 'images/gallery/image1.jpg', 'caption' => 'Offshore Oil Rig'],
                ['url' => 'images/gallery/image8.jpg', 'caption' => 'Oil Refinery'],
                ['url' => 'images/gallery/image3.jpg', 'caption' => 'Pipeline Transport'],
                ['url' => 'images/gallery/image4.jpg', 'caption' => 'Oil Tanker'],
                ['url' => 'images/gallery/image5.jpg', 'caption' => 'Drilling Operations'],
                ['url' => 'images/gallery/image7.jpg', 'caption' => 'Oil Storage Facility'],
                ['url' => 'images/gallery/IMG-20240426-WA0041.jpg', 'caption' => 'Oil Storage Facility'],
                ['url' => 'images/gallery/image6.jpg', 'caption' => 'Oil Storage Facility'],
                ['url' => 'images/gallery/image9.jpg', 'caption' => 'Oil Storage Facility'],
            ];
        @endphp

        @foreach ($images as $image)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset($image['url']) }}" alt="{{ $image['caption'] }}" class="w-full h-full object-cover">
                <div class="p-4">
                    <p class="text-lg font-semibold text-gray-800">{{ $image['caption'] }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Back Button -->
    <div class="text-center mt-8">
        <a href="{{ url('/') }}" class="bg-yellow-600 text-white px-6 py-3 rounded-lg shadow-md text-lg font-semibold hover:bg-yellow-700 transition duration-300">
            Back to Home
        </a>
    </div>
</div>
</x-app-layout>
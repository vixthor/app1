<div data-aos="fade-up" class="w-full overflow-x-hidden mt-20 dark:text-white dark:bg-gray-900">
    <div class="w-full">
            <div class=" flex flex-col mx-auto items-center w-full gap-y-5 my-20">
                <x-h3 class="font-bold text-6xl">Our Leaders</x-h3>
                <img class="w-22  " src="{{ asset('images/home/line.svg') }}" alt="erer">
                <x-p class="fony-thin text-center">At Madu Alliance, our leadership team is composed of visionary individuals who bring decades of expertise, experience, and commitment to the energy industry. Together, they steer the company towards excellence in operational efficiency, sustainability, and innovation. Each leader is dedicated to delivering sustainable energy solutions while upholding the highest standards of corporate governance and responsibility.</x-p>
                <div class=" flex flex-col md:flex-row items-center">
                
                    
                    <div  data-aos="fade-down-left"  data-aos-duration="2000" class="w-full md:w-1/3 text-center p-7 flex flex-col gap-y-5">
                        <img class="w-full h-full" src="{{ asset('images/home/ourleaders.svg') }}" alt="Image 3">
                        <h3>[Full Name] – Chief Executive Officer (CEO)</h3>
                        <p class="text-center">As the CEO of [Company Name], [Full Name] brings over [X] years of experience in the oil and gas industry. Under [his/her] leadership, the company has achieved significant milestones in exploration, refining, and sustainability initiatives. [He/She] is dedicated to driving the company’s vision of becoming a leader in sustainable energy solutions across Nigeria and beyond.</p>
                    </div>
                    <div data-aos="fade-down"  data-aos-duration="2000" class="w-full  md:w-1/3 text-center p-7 flex flex-col gap-y-5">
                        <img class="w-full h-full" src="{{ asset('images/home/ourleaders.svg') }}" alt="Image 3">
                        <h3>[Full Name] – Chief Executive Officer (CEO)</h3>
                        <p class="text-center">As the CEO of [Company Name], [Full Name] brings over [X] years of experience in the oil and gas industry. Under [his/her] leadership, the company has achieved significant milestones in exploration, refining, and sustainability initiatives. [He/She] is dedicated to driving the company’s vision of becoming a leader in sustainable energy solutions across Nigeria and beyond.</p>
                    </div>
                    <div data-aos="fade-down-right"  data-aos-duration="2000" class="w-full  md:w-1/3 text-center p-7 flex flex-col gap-y-5">
                        <img class="w-full h-full" src="{{ asset('images/home/ourleaders.svg') }}" alt="Image 3">
                        <h3>[Full Name] – Chief Executive Officer (CEO)</h3>
                        <p class="text-center">As the CEO of [Company Name], [Full Name] brings over [X] years of experience in the oil and gas industry. Under [his/her] leadership, the company has achieved significant milestones in exploration, refining, and sustainability initiatives. [He/She] is dedicated to driving the company’s vision of becoming a leader in sustainable energy solutions across Nigeria and beyond.</p>
                    </div>
                </div>
            </div>
         
            
             
    </div>  
    <div class="container mx-auto px-4 py-8  items-center">
    <x-h3 class="font-bold text-6xl py-2">Our Gallery</x-h3>
                <img class="w-22  mx-auto my-4" src="{{ asset('images/home/line.svg') }}" alt="erer">
    <!-- Gallery Grid (Show only 3 images) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @php
            $images = [
                ['url' => 'images/gallery/image5.jpg', 'caption' => 'Drilling Operations'],
                ['url' => 'images/gallery/image7.jpg', 'caption' => 'Oil Storage Facility'],
                ['url' => 'images/gallery/IMG-20240426-WA0041.jpg', 'caption' => 'Oil Storage Facility'],
            ];
        @endphp

        @foreach ($images as $image)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset($image['url']) }}" alt="{{ $image['caption'] }}" class="w-full h-56 object-cover">
                {{-- <div class="p-4">
                    <p class="text-lg font-semibold text-gray-800">{{ $image['caption'] }}</p>
                </div> --}}
            </div>
        @endforeach
    </div>

    <!-- See More Button -->
    <div class="text-center mt-8">
        <a href="{{ route('gallery') }}" class="bg-yellow-600 text-white px-6 py-3 rounded-lg shadow-md text-lg font-semibold hover:bg-yellow-700 transition duration-300">
            See More
        </a>
    </div>
</div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
</div>
<div data-aos="fade-right"  class="flex flex-col md:flex-row gap-y-10 items-center justify-between p-10 md:p-20 mx-auto max-w-screen-2xl  border-b-2 ">
                <div class="flex justify-between space-x-2 ">
                        <img class=" hidden md:block" src="{{ asset('images/home/Ellipse_308.svg') }}" alt="">
                        <h3 class="font-semibold text-center md:text-left  text-4xl px-3">{{ $title }}</h3>
                </div>
                 <div class="flex justify-between">
                        <p class="px-4 text-base text-center md:text-start">{{ $slot }}</p>
                        <img class="hidden md:block" src="{{ asset('images/home/Vector_plus.svg') }}" alt="">
                 </div>
</div>
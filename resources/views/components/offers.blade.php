<div class="flex items-center justify-between p-20 mx-auto max-w-screen-2xl  border-b-2">
                <div class="flex justify-between">
                        <img class="pr-8" src="{{ asset('images/home/Ellipse_308.svg') }}" alt="">
                        <h3 class="font-semibold text-4xl px-3">{{ $title }}</h3>
                </div>
                 <div class="flex justify-between">
                        <p class="px-9 text-base">{{ $slot }}</p>
                        <img src="{{ asset('images/home/Vector_plus.svg') }}" alt="">
                 </div>
</div>
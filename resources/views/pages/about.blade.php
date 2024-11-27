<x-app-layout>
        <div data-aos="fade-up" class="flex flex-col  md:flex-row container mx-auto py-20 px-5">
            <div class="w-full md:w-1/2">
                <x-h2>How It Started</x-h2>
                <x-h1>Lorem ipsum dolor sit amet.</x-h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi distinctio dolor, ea voluptatibus aliquid soluta alias recusandae dolorum. Facere dolore aut soluta magnam fugit blanditiis doloremque quas praesentium ullam maiores?</p>
            </div>
             <div class="w-full md:w-1/2">
                <img class="w-full h-1/2" src="{{ asset('images/home/carousel2.svg') }}" alt="">
                <div class=" items-center grid grid-cols-2">
                    <div class=" font-semibold text-5xl  flex  flex-col gap-y-3 p-10 ">
                         <h3><span class="countup" data-end-value="3.5">0</span></h3>
                        <p class="text-lg">Years Experience</p>
                    </div>
                    
                    
                </div>
            </div>
            
        </div>
</x-app-layout>
<div x-data="{ open: false }" class="w-full md:px-10 px-2">
    <!-- Button with Arrow -->
    <button @click="open = !open" class="flex flex-col w-full items-center border-yellow-500 border-b-2  md:px-4 md:py-9 px-2 py-7">
        <div class="flex justify-between items-center w-full">
            <div class="flex items-center ">
                <img class="pr-10" src="{{ asset('images/home/green_check.svg') }}" alt="">
                <h3 class="text-lg font-semibold">{{ $title }}</h3>
            </div>

        <!-- Arrow Icon -->
             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform transition-transform duration-300" :class="{'rotate-90': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </div>
        <div x-show="open" @click.away="open = false" y-transition class="mt-2 w-full p-4 ">
        
        <p class="text-gray-600 dark:text-white mt-2">{{ $description }}</p>
    </div>
    </button>

    <!-- Dropdown content -->
    
</div>

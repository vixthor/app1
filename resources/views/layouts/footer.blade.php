<!-- resources/views/components/footer.blade.php -->
<!-- resources/views/components/footer.blade.php -->
<div class=" text-gray-200 dark:text-white w-full py-8">
    <!-- Main Content Container -->
    <div class="container overflow-x-hidden mx-auto flex flex-col md:flex-row items-center justify-between space-y-8 md:space-y-0 px-4">
        
        <!-- Logo and Description Section -->
        <div class="flex flex-col items-center md:items-start space-y-4 text-center md:text-left max-w-md">
            <img src="{{ asset('images/home/footer_logo.svg') }}" alt="Madu Alliance Nigeria Limited" class=" h-auto">
            <p class="text-gray-400 dark:text-white">
                As a leading force in Nigeria’s oil and gas sector, we are committed to powering the nation’s progress through responsible energy production, advanced technologies, and community-driven initiatives. Explore our operations, discover our latest projects, and join us on our journey to create a sustainable future for generations to come.
            </p>
        </div>
       <div class="flex flex-col md:flex-row items-center h-full">
             <div class="flex flex-col h-full items-center  space-y-4">
                <h1 class="font-bold px-4 py-2 text-center text-2xl text-black dark:text-gray-600">About Us</h1>
                <x-nav-link >What we are</x-nav-link>
                <x-nav-link>Financial Reviews</x-nav-link>

            </div>
         <div class="flex flex-col px-4 py-2 items-center text-center  space-y-4 ">
            <h1 class="font-bold text-2xl text-center text-black dark:text-gray-600">News</h1>
            <x-nav-link>Investor relations</x-nav-link>
            <x-nav-link>Sustainability</x-nav-link>
            <x-nav-link>Technology and Innovation</x-nav-link>

        </div>
       </div>
        <!-- Newsletter Subscription Section -->
        <div class="flex flex-col items-center md:items-end space-y-4 w-full md:w-auto">
            <x-h2> Subscribe To Our Newsletter</x-h2>
            <input 
                type="email" 
                placeholder="Enter your email address" 
                class="bg-gray-100 text-gray-800 py-2 px-4 rounded w-full md:w-64 focus:outline-none focus:ring-2 focus:ring-yellow-500"
            >
            <button 
                class="bg-gray-800 text-white py-2 px-4 rounded w-full md:w-64 hover:bg-gray-700 transition duration-300">
                Subscribe
            </button>
        </div>
    </div>
    
    <!-- Copyright Section -->
    <div class="mt-8 text-center text-gray-500 border-t border-gray-700 pt-4 px-4">
        Copyright © 2024 Eiza Innovations INC. All rights reserved.
    </div>
</div>





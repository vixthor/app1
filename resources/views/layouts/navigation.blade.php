        <nav data-aos="fade-down"  class="flex items-center dark:bg-gray-800 overflow-x-hidden w-full h-28 bg-white " x-data="{ open: false }">
            <div class="flex mx-auto w-full md:max-w-7xl items-center justify-between px-4">
                <div>
                       <x-application-logo class="w-12 h-12 fill-current text-gray-500" />
                </div>

            <!-- Toggle Button for Mobile (Hamburger Icon) -->
                <div class="md:hidden">

                    <button 
                    @click="open = true" 
                    class="text-gray-500 dark:text-white focus:outline-none"
                 >
                    <!-- Hamburger Icon -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            <!-- Desktop Menu -->
                <div class="hidden md:flex gap-4 items-center">
                    <ul class="flex gap-4">
                        <li>
                            <x-nav-link href="{{ url('/') }}" >Home</x-nav-link>
                        </li>
                        <li>
                            <x-nav-link href="{{ url('/about') }}" >About Us</x-nav-link>
                        </li>
                        <li>
                            <x-nav-link href="{{ url('/contact') }}">Contact Us</x-nav-link>
                        </li>
                        <li>
                            <x-nav-link href="{{ url('/reviews') }}">Reviews</x-nav-link>
                        </li>
                        <li>
                            <a href="{{ url('/services') }}">
                                <x-primary-button>Our Services</x-primary-button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>   

        <!-- Mobile Menu Modal -->
        <div
            x-show="open"
            x-cloak
            class="fixed inset-0 bg-black bg-opacity-50 flex  items-center justify-center z-50">
            <!-- Modal Content -->
            <div class="bg-white dark:bg-gray-800 w-3/4 max-w-sm px-8 py-20 rounded-lg shadow-lg">
                <!-- Close Button -->
                <button 
                    @click="open = false" 
                    class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

                <!-- Menu Items -->
                <ul class="flex flex-col gap-4 text-center">
                    <li>
                        <x-nav-link href="{{ url('/') }}" >
                            {{-- {{ $href }} --}}

                            
                            Home</x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="{{ url('/about') }}" >About Us</x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="{{ url('/contact') }}">Contact Us</x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="{{ url('/reviews') }}">Client Reviews</x-nav-link>
                    </li>
                    <li>
                        <a href="{{ url('/services') }}">
                            <x-primary-button>Our Services</x-primary-button>
                        </a>
                    </li>
                    {{-- <button id="theme-toggle" class="p-2 bg-gray-200 dark:bg-gray-800 rounded"> --}}
    {{-- Toggle Theme --}}
{{-- </button> --}}

                </ul>
            </div>
        </div>
</nav>
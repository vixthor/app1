<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-100">What Our Clients Say</h2>
    <p class="mt-2 text-center text-gray-600 dark:text-gray-400">
        Hear from some of our satisfied customers.
    </p>

    <div class="mt-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach($reviews as $review)
        <div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800 flex flex-col">
            <div class="flex items-center mb-4">
                <img src="{{ $review['avatar'] }}" alt="{{ $review['name'] }}"
                    class="w-12 h-12 rounded-full border border-gray-300 dark:border-gray-700">
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                        {{ $review['name'] }}
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        {{ $review['designation'] }}
                    </p>
                </div>
            </div>
            <p class="text-gray-600 dark:text-gray-300 flex-1">
                {{ $review['testimonial'] }}
            </p>
        </div>
        @endforeach
    </div>
</div>

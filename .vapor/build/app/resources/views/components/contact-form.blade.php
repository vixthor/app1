<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-md dark:bg-gray-800">
    <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-100">Contact Us</h2>
    <p class="mb-6 text-gray-600 dark:text-gray-400">
        Feel free to reach out by filling out the form below. We'll get back to you as soon as possible!
    </p>
    <form method="POST" action="{{ route('contact.submit') }}" class="space-y-4">
        @csrf
        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
            <input type="text" id="name" name="name" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-400 dark:focus:border-indigo-400 text-gray-900 dark:text-gray-100">
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
            <input type="email" id="email" name="email" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-400 dark:focus:border-indigo-400 text-gray-900 dark:text-gray-100">
        </div>

        <!-- Message -->
        <div>
            <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Message</label>
            <textarea id="message" name="message" rows="4" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-400 dark:focus:border-indigo-400 text-gray-900 dark:text-gray-100"></textarea>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:bg-indigo-500 dark:hover:bg-indigo-600">
                Submit
            </button>
        </div>
    </form>
</div>

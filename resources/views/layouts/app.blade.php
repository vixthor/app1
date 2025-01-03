<!DOCTYPE html>
<html x-data="{
          darkMode: localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches),
          toggleTheme() {
              this.darkMode = !this.darkMode;
              document.documentElement.classList.toggle('dark', this.darkMode);
              localStorage.setItem('theme', this.darkMode ? 'dark' : 'light');
          }
      }"
      x-init="document.documentElement.classList.toggle('dark', darkMode)" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head >
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class=" md:px-0 font-sans antialiased w-full transition-colors duration-300 bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
        <div class="min-h-screen  bg-gray-100 dark:text-white dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                        
                    </div>
                    


                </header>
            @endisset

            <!-- Page Content -->
            <main class="w-full">
                {{ $slot }}
            </main>
             @include('layouts.footer')
        </div>
         @vite(['resources/js/app.js'])
    </body>
</html>

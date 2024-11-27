import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { resolve } from 'path';
// import sass from 'sass';
export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        // sass(),
    ],
    resolve: {
        alias: {
             '$': 'jquery', // Optional: Helps with cleaner imports
        },
    },
});

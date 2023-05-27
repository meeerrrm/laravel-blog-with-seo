import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from 'tailwindcss';

export default defineConfig({
    base: "/",
    build: {
        outDir: '../blog.entolrizky.com/build',
        emptyOutDir: false,
        rollupOptions: {
            output: {
                entryFileNames: `assets/js/main.js`,
                assetFileNames: `assets/css/main.[ext]`
            },
        },
    },
    plugins: [
        laravel({
            publicDirectory: '../blog.entolrizky.com',
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        tailwindcss({
            refresh: false,
        })
    ]
});


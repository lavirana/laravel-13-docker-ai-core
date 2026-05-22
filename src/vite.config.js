import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0', // Container ke andar se listen karne ke liye
        port: 5173,
        hmr: {
            host: 'localhost', // Mac ke browser se connect karne ke liye
        },
        watch: {
            usePolling: true, // Docker volume file changes detect karne ke liye
        },
    },
});
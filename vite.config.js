import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/services.css',
                'resources/css/portfolio.css',
                'resources/css/about.css',
                'resources/css/contact.css',
                'resources/images/favicon.svg',
                'resources/images/logo.svg',
                'resources/admin/css/app.css',
                'resources/auth/css/app.css'
            ],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',
        port: 3000,
        open: false
    }
});

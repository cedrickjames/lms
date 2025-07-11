import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    

     server: {
        host: '0.0.0.0', // Listen on all interfaces
        port: 5173,  // Default Vite port
        strictPort: true,
        hmr: {
            host: '192.168.60.53', // Replace with your actual local IP
        },
        },


    plugins: [
        laravel({
            input: [
                 'resources/css/app.css',
                 'resources/js/app.js',
                 'resources/js/settings.js',
                 'resources/js/overdue.js',
                 'resources/js/approachingTheDeadline.js',
                 'resources/js/loaDetails.js',
                 'resources/js/listOfLOA.js',
                 'resources/js/fileALoa.js',
                 'resources/js/bootstrap.js',
                 'resources/js/cdn_tailwindcss.js',

                ],
            refresh: true,
        }),
    ],
});

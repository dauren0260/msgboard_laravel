import path from 'path';
import { fileURLToPath, URL } from "node:url";
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
            '~~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap-icons'),
            "@": fileURLToPath(new URL("./src", import.meta.url))
        }
    },
    build: {
        rollupOptions: {
            output: {
                dir: 'public/build/',
                entryFileNames: 'app.js',
                assetFileNames: 'app.css',
                chunkFileNames: 'app.js',
                manualChunks: undefined,
            }
        }
    }
});

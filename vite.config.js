import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from "path";


export default defineConfig({
    plugins: [
        laravel({
            input: ['assets/style.scss'],
            refresh: true,
        }),
    ],
    build: {
        outDir: path.resolve(
            __dirname,
            "public/dist/assets"
        ),
        emptyOutDir: false,
        rollupOptions: {
        input: path.resolve(__dirname, "assets/style.scss"),
        output: {
            assetFileNames: "laravel.min.css",
        },
        },
    },
});

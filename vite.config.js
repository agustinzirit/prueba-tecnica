import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

const path = require("path");

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/sass/app.scss", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    root: path.resolve(__dirname, "resources"),
    resolve: {
        alias: {
            "~bootstrap": path.resolve(__dirname, "node_modules/bootstrap"),
        },
    },
    server: {
        port: 8000,
        hot: true,
    },
});

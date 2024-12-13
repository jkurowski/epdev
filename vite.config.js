import laravel from "laravel-vite-plugin";
import { defineConfig } from "vite";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/js/app.js", "resources/scss/app.scss"], // Correctly reference SCSS
            refresh: true,
        }),
    ],
    css: {
        preprocessorOptions: {
            scss: {
                // Optionally, add global SCSS variables or mixins if needed
                // additionalData: `@import "./resources/scss/variables.scss";`
            }
        }
    }
});

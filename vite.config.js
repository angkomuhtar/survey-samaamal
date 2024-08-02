import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    server: {
        host: "localhost",
    },
    plugins: [
        laravel({
            input: [
                "resources/css/app.scss",
                "resources/js/app.js",
                "resources/js/plugins/flatpickr.js",
                "resources/js/plugins/Select2.min.js",
                "resources/js/custom/store.js",
                "resources/js/main.js",
                "resources/js/plugins/jquery-jvectormap-2.0.5.min.js",
                "resources/js/plugins/jquery-jvectormap-world-mill-en.js",
                "resources/js/custom/chart-active.js",
            ],
            refresh: true,
        }),
    ],
});

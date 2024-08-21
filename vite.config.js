import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import { VitePWA } from 'vite-plugin-pwa';

export default defineConfig({
    plugins: [
        laravel({
            input: "resources/js/app.js",
            ssr: "resources/js/ssr.js",
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        // VitePWA({
        //     registerType: 'autoUpdate',
        //     injectRegister: 'auto',
        //     workbox: {
        //         globPatterns: ['**/*.{js,css,html,ico,png,svg}']
        //     },
        // })
    ],
    ssr: {
        noExternal: ["vue", "@protonemedia/laravel-splade"]
    },
});
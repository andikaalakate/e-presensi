import "./bootstrap";
import "@protonemedia/laravel-splade/dist/style.css";
import "../css/app.css";
import "boxicons";
import axios from "axios";
import { createApp, defineAsyncComponent } from "vue/dist/vue.esm-bundler.js";  
import { renderSpladeApp, SpladePlugin } from "@protonemedia/laravel-splade";

const el = document.getElementById("app");

createApp({
    render: renderSpladeApp({ el }),
})
    .use(SpladePlugin, {
        "max_keep_alive": 50,
        "transform_anchors": false,
        "progress_bar": true
    })
    .component('Presensi', defineAsyncComponent(() => import("./Components/Presensi.vue")))
    .component('Navbar', defineAsyncComponent(() => import("./Components/Navbar.vue")))
    .mount(el);


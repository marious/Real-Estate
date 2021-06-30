import PropertyComponent from "./components/PropertyComponent.vue";
import NewsComponent from "./components/NewsComponent";

import Vue from "vue";
window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
} else {
    console.error(
        "CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token"
    );
}

Vue.component("property-component", PropertyComponent);
Vue.component("news-component", NewsComponent);

const app = new Vue({
    el: "#app"
});

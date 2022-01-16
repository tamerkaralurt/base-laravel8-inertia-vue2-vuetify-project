require("./bootstrap");

// Import modules...
import Vue from "vue";
import {
    App as InertiaApp,
    plugin as InertiaPlugin,
    Link as InertiaLink
} from "@inertiajs/inertia-vue";
import PortalVue from "portal-vue";
import Vuetify from "vuetify";
import "vuetify/dist/vuetify.min.css";
import Vuex from 'vuex'

Vue.mixin({ methods: { route } });
Vue.component('inertia-link', InertiaLink)
Vue.use(InertiaPlugin);
Vue.use(PortalVue);
Vue.use(Vuetify);
Vue.use(Vuex);

const app = document.getElementById("app");

const store = new Vuex.Store({
    state: {
        drawer: true
    },
    mutations: {
        drawer(state) {
            state.drawer = !state.drawer;
        }
    },
});

new Vue({
    vuetify: new Vuetify(),
    store: store,
    render: h =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: name => require(`./Pages/${name}`).default
            }
        })
}).$mount(app);

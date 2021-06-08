import Vue from 'vue';
import Vuetify from 'vuetify';
import Vuelidate from 'vuelidate'
import '@mdi/font/css/materialdesignicons.css'

import 'vuetify/dist/vuetify.min.css';
import App from './Pages/App';
window.axios = require("axios");
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
};

Vue.use(Vuetify);
Vue.use(Vuelidate)

require('./bootstrap');

new Vue({
    el: '#app',
    components: { App },
    vuetify: new Vuetify({
        icons: {
            iconfont: 'mdi', // default - only for display purposes
          },
    }),
})


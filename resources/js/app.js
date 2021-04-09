import Vue from 'vue';
import Vuetify from 'vuetify';
import Vuelidate from 'vuelidate'
import '@mdi/font/css/materialdesignicons.css'

import 'vuetify/dist/vuetify.min.css';
import App from './Pages/App';



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


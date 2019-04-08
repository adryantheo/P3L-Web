window.Vue = require('vue');

//window.axios = require('axios');

import AppComponent from './components/AppComponent.vue'
import router from './router/router'
import Vuetify from 'vuetify'
import axios from 'axios'
import VueHtmlToPaper from 'vue-html-to-paper'

window.axios = axios.create()




Vue.use(Vuetify,{
    iconfont: 'md'
});

Vue.use(VueHtmlToPaper, {
    name: '_blank',
    specs: [
        'fullscreen=no',
        'titlebar=no',
        'scrollbars=yes'
    ],
    styles: [
        '/css/print.css',
        '/css/app.css',
    ],
});



const app = new Vue({
    el: '#app',
    components: {
        AppComponent,
    },
    router
    
});




window.Vue = require('vue');

//window.axios = require('axios');

import AppComponent from './components/AppComponent.vue'
import router from './router/router'
import Vuetify from 'vuetify'
import axios from 'axios'

window.axios = axios.create()


Vue.use(Vuetify,{
    iconfont: 'md'
});




const app = new Vue({
    el: '#app',
    components: {
        AppComponent,
    },
    router
    
});

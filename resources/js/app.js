



window.Vue = require('vue');

window.axios = require('axios');

import AppComponent from './components/AppComponent.vue'
import router from './router/router'
import Vuetify from 'vuetify'


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

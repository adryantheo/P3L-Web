//Vue
import Vue from 'vue'
import VueRouter from 'vue-router'

//View
import AppPengunjung from '../components/pengunjung/AppPengunjung.vue'
import AppAdmin from '../components/admin/AppAdmin.vue'
import AdminLogin from '../components/admin/AdminLogin.vue'
import AdminEdit from '../components/admin/AdminEdit.vue'

Vue.use(VueRouter)

const routes = [
    {
        path:'/',
        component: AppPengunjung,
    },
    {
        path:'/admin',
        component: AppAdmin,
        children:[
            {

            path:'login',
            component: AdminLogin,
        },
        {

            path:'edit',
            component: AdminEdit,
        },
        
            
        ]
    }
]

const router = new VueRouter({
    routes,
    hashbang: false,
    mode: 'history',
})



export default router;
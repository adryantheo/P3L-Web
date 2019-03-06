//Vue
import Vue from 'vue'
import VueRouter from 'vue-router'

//View Pengunjung
import AppPengunjung from '../components/pengunjung/AppPengunjung.vue'
import Home from '../components/pengunjung/PengunjungHome.vue'
import JasaService from '../components/pengunjung/PengunjungJS.vue'
import Sparepart from '../components/pengunjung/PengunjungSparepart.vue'
import History from '../components/pengunjung/PengunjungHistory.vue'
import ContactUs from '../components/pengunjung/PengunjungContact.vue'

//view Admin
import AppAdmin from '../components/admin/AppAdmin.vue'
import AdminLogin from '../components/admin/AdminLogin.vue'
import AdminEdit from '../components/admin/AdminEdit.vue'
import AdminTransaksi from '../components/admin/AdminTransaksi.vue'
import AdminLaporan from '../components/admin/AdminLaporan.vue'

Vue.use(VueRouter)

const routes = [
    {
        path:'/',
        component: AppPengunjung,
        children:[
            {
                path: 'jasa-service',
                component: JasaService,

            },
            {
                path: 'sparepart',
                component: Sparepart,

            },
            {
                path: 'history',
                component: History,

            },
            {
                path: 'contactus',
                component: ContactUs,

            },
            {
                path: 'home',
                component: Home,

            },
        ]
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
        {

            path:'transaksi',
            component: AdminTransaksi,
        },
        {

            path:'laporan',
            component: AdminLaporan,
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
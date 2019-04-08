//Vue
import Vue from 'vue'
import VueRouter from 'vue-router'

//View Pengunjung
import AppPengunjung from '../components/pengunjung/AppPengunjung.vue'
import Home from '../components/pengunjung/PengunjungHome.vue'
import JasaService from '../components/pengunjung/PengunjungJS.vue'
import Sparepart from '../components/pengunjung/PengunjungSparepart.vue'
import History from '../components/pengunjung/PengunjungHistory.vue'
import PengunjungPlat from '../components/pengunjung/PengunjungPlat.vue'
import PengunjungHp from '../components/pengunjung/PengunjungHape.vue'

import ContactUs from '../components/pengunjung/PengunjungContact.vue'

//view Admin
import AppAdmin from '../components/admin/AppAdmin.vue'
import AdminLogin from '../components/admin/AdminLogin.vue'
import AdminEdit from '../components/admin/AdminEdit.vue'
import AdminTransaksi from '../components/admin/AdminTransaksi.vue'
import AdminLaporan from '../components/admin/AdminLaporan.vue'
import AdminRegister from '../components/admin/AdminRegister.vue'
import AdminJasaService from '../components/admin/AdminJasaService.vue'
import AdminSparepart from '../components/admin/AdminSparepart.vue'
import AdminLogout from '../components/admin/AdminLogout.vue'
import AdminKustomer from '../components/admin/AdminKustomer.vue'

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
                path: '/',
                component: Home,

            },
            {
                path: 'cariplat',
                name: 'cari-plat',
                component: PengunjungPlat,

            },
            {
                path: 'carinohp',
                name: 'cari-nohp',
                component: PengunjungHp,

            },
            
        ]
    },
    {
        path:'/admin',
        component: AppAdmin,
        children:[
        {

            path:'/admin/login',
            name: 'login',
            component: AdminLogin,
        },
        {

            path:'/admin/logout',
            component: AdminLogout,
        },
        {

            path:'/admin/register',
            name: 'register',
            component: AdminRegister,
        },
        {

            path:'/admin/edit',
            component: AdminEdit,
        },
        {

            path:'/admin/transaksi',
            component: AdminTransaksi,
        },
        {

            path:'/admin/jasa-service',
            component: AdminJasaService,
        },
        {

            path:'/admin/kustomer',
            component: AdminKustomer,
        },
        {

            path:'/admin/sparepart',
            component: AdminSparepart,
        },
        {

            path:'/admin/laporan',
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
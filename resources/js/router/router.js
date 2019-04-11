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
import AdminGantiPass from '../components/admin/AdminGantiPass.vue'
import AdminSales from '../components/admin/AdminSales.vue'
import AdminPesan from '../components/admin/AdminPesan.vue'

//View Pegawai
import AppKaryawan from '../components/karyawan/AppKaryawan.vue'
import KaryawanKustomer from '../components/karyawan/KaryawanKustomer.vue'
import KaryawanKendaraan from '../components/karyawan/KaryawanKendaraan.vue'

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
            {

                path:'/login',
                name: 'login',
                component: AdminLogin,
            },
            {

                path:'/logout',
                component: AdminLogout,
            },
            
        ]
    },
    {
        path:'/admin',
        component: AppAdmin,
        children:[
      
        
        {

            path:'/admin/register',
            name: 'register',
            component: AdminRegister,
        },
        {

            path:'/admin/gantipass',
            name: 'gantiPass',
            component: AdminGantiPass,
        },
        {

            path:'/admin/pegawai',
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

            path:'/admin/sparepart',
            component: AdminSparepart,
        },
        {

            path:'/admin/laporan',
            component: AdminLaporan,
        },
        {

            path:'/admin/sales',
            component: AdminSales,
        },
        {

            path:'/admin/pesan',
            component: AdminPesan,
        },  
        ]
    },
    {
        path:'/karyawan',
        component: AppKaryawan,
        children:[
            {

                path:'/karyawan/kustomer',
                component: KaryawanKustomer,
            },
            {

                path:'/karyawan/kendaraan',
                component: KaryawanKendaraan,
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
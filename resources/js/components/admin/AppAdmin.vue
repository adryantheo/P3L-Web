<template>

<div id="app">
    <v-app id="inspire">

      <v-navigation-drawer fixed v-model="drawer" app>
    
      <v-list dense>
        <v-list-tile dark color="primary" flat v-for="menu in menus" :key="menu.text" router :to="menu.route">
          <v-list-tile-action>            
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title> {{menu.text}}</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>      
        </v-list>
    </v-navigation-drawer>

      

        <v-toolbar  color="white" app>
            <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
            <img src="../../../../public/Logo.png" alt="" >
            <v-toolbar-title>Admin Atma Auto</v-toolbar-title>
            
            <v-spacer></v-spacer>
            <v-btn dark color="white" >
              <router-link :to="{ name: 'login' }" class="nav-link" v-if="!isLoggedIn">Login</router-link>
            </v-btn>
            <v-btn dark color="white" >
              <router-link :to="{ name: 'register' }" class="nav-link" v-if="!isLoggedIn">Register</router-link>
            </v-btn>
            <li class="nav-link" v-if="isLoggedIn" @click="logout"> Logout</li>

            
            
            
            <v-toolbar-items class="hidden-sm-and-down">           
            </v-toolbar-items>
        </v-toolbar>
        <v-content>

          <v-container fluid fill-height>

            <router-view @loggedIn="change"></router-view>
            
            
              
          </v-container>

        </v-content>
        
        <v-footer height="auto" color="indigo">          
                
          <v-flex
          indigo
          py-3
          text-xs-center
          white--text
          xs12
          >
          &copy;2019 — <strong>Atma Auto</strong>
          </v-flex>
            
      </v-footer>

    </v-app>
</div>
</template>

<script>
export default {
    
  data: () => ({

    
      isLoggedIn: localStorage.getItem('AtmaAuto.jwt') != null,

   

    drawer:null,

    menus: [
      {
        text: 'Home',
        route: '/admin'
      },

      {
        text: 'Kelola Pegawai',
        route: '/admin/edit'
      },
      
      {
        text: 'Transaksi',
        route: '/admin/transaksi'
      },

      {
        text: 'Tambah Jasa Service',
        route: '/admin/jasa-service'
      },

      {
        text: 'Tambah Sparepart',
        route: '/admin/sparepart'
      },

      {
        text: 'Kustomer',
        route: '/admin/kustomer'
      },

      {
        text: 'Laporan',
        route: '/admin/laporan'
      },

      

    ],
    
    links: [
      {
        text: 'Login',
        route: '/admin/login'
      },
      {
        text: 'Register',
        route: '/admin/register'
      },
    ],

    
    
  }),
  methods:{
    setDefaults() {
                if (this.isLoggedIn) {
                    let user = JSON.parse(localStorage.getItem('AtmaAuto.user'))
                    this.name = pegawai.name
                }
            },
            change() {
                this.isLoggedIn = localStorage.getItem('AtmaAuto.jwt') != null
                this.setDefaults()
            },
            logout(){
                localStorage.removeItem('AtmaAuto.jwt')
                localStorage.removeItem('AtmaAuto.user')
                this.change()
                this.$router.push('/')
            }
  }
}

</script>

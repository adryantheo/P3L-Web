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
            <v-toolbar-title>Admin Auto Atma</v-toolbar-title>
            
            <v-spacer></v-spacer>
            <v-btn dark color="primary" flat v-for="link in links" :key="link.text" router-link :to="link.route">Login</v-btn>
            <v-toolbar-items class="hidden-sm-and-down">           
            </v-toolbar-items>
        </v-toolbar>
        <v-content>

          <v-container fluid fill-height>

            <router-view></router-view>
              
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
    el: '#app',
  data: () => ({

    drawer:null,

    menus: [
      {
        text: 'Home',
        route: 'admin'
      },

      {
        text: 'Kelola Pegawai',
        route: 'admin/edit'
      },
      
      {
        text: 'Transaksi',
        route: 'admin/transaksi'
      },

      {
        text: 'Laporan',
        route: 'admin/laporan'
      },

      

    ],
    
    links: [
      {
        text: 'Login',
        route: 'admin/login'
      },
    ]
    
  }),
}
</script>

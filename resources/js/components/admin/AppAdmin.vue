<template>
<div id="app">
    <v-app id="inspire">

      

      

        <v-toolbar  color="white" app>
            <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
            <img src="../../../../public/Logo.png" alt="" >
            <v-toolbar-title>Admin Auto Atma</v-toolbar-title>
            
            <v-spacer></v-spacer>
            <v-btn dark color="primary" flat v-for="link in links" :key="link.text" router :to="link.route">Login</v-btn>
            <v-toolbar-items class="hidden-sm-and-down">           
            </v-toolbar-items>
        </v-toolbar>
        <v-content>
        <router-view></router-view>
        
               
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
    
    links: [
      {
        text: 'Login',
        route: 'admin/login'
      },
    ]
    
  }),
}
</script>

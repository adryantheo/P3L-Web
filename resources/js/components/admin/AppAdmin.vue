<template>
<div>
    <v-app>
        <v-toolbar dark color="primary">
            <v-toolbar-side-icon></v-toolbar-side-icon>
            <v-toolbar-title>Admin</v-toolbar-title>
            
            <v-spacer></v-spacer>
            <v-btn flat>Login</v-btn>
            <v-toolbar-items class="hidden-sm-and-down">           
            </v-toolbar-items>
        </v-toolbar>
        <v-content>
        <router-view></router-view>
        
               
        </v-content>
        <v-footer
            height="auto"
            color="primary"
            >
            <v-layout
                justify-center
                row
                wrap
            >
                <v-btn
                v-for="link in links"
                :key="link"
                color="white"
                flat
                round
                >
                {{ link }}
                </v-btn>
                <v-flex
                primary
                lighten-1
                py-3
                text-xs-center
                white--text
                xs12
                >
                &copy;2019 — <strong>Atma Auto</strong>
                </v-flex>
            </v-layout>
    </v-footer>
    </v-app>
</div>
</template>

<script>
export default {
    el: '#app',
  data: () => ({
    
    links: [
      'Home',
      'About Us',
      'Team',
      'Blog',
      'Contact Us'
    ]
    
  }),
}
</script>

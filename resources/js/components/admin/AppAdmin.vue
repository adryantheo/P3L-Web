<template>
<div>
    <v-app>
        <v-toolbar dark color="primary">
            <v-toolbar-side-icon></v-toolbar-side-icon>
            <v-toolbar-title>Login</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items class="hidden-sm-and-down">
           
            </v-toolbar-items>
        </v-toolbar>
        <v-content>
        <router-view></router-view>
        
               
        </v-content>
         <v-footer class="pa-3">
            <v-spacer></v-spacer>
            <div>&copy; {{ new Date().getFullYear() }}</div>
        </v-footer>
    </v-app>
</div>
</template>

<script>
export default {
    
}
</script>

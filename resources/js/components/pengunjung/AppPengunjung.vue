<template>
    <div id="app">
     <v-app id="inspire">
    <v-navigation-drawer
      fixed
      v-model="drawer"
      app
    >
      <v-list dense>
        <v-list-tile @click="">
          <v-list-tile-action>
            
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Home</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>

        <v-list-tile @click="">
          <v-list-tile-action>
            
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Jasa Services</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>

        <v-list-tile @click="">
          <v-list-tile-action>
            
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Spareparts</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>

        <v-list-tile @click="">
          <v-list-tile-action>
            
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>History Transaksi</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
        
        <v-list-tile @click="">
          <v-list-tile-action>
            
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Contact Us</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>
    <v-toolbar color="indigo" dark fixed app>
      <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
      <v-toolbar-title>Atma Auto</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-layout row align-center style="max-width: 250px">
        <v-text-field
          placeholder="Search"
          single-line
          append-icon="search"
          :append-icon-cb="() => {}"
          color="white"
          hide-details
        ></v-text-field>
      </v-layout>
    </v-toolbar>
    <v-content>
      <v-container fluid fill-height>
        <v-carousel>
          <v-carousel-item
            v-for="(item,i) in items"
            :key="i"
            :src="item.src"
            reverse-transition="fade"
            transition="fade"
          ></v-carousel-item>
        </v-carousel>
      </v-container>
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
    
    drawer: null,
    
      items: [
        {
          src: 'http://cdn2.tstatic.net/jogja/foto/bank/images/Ban-tubeless.jpg'
        },
        {
          src: 'https://3.bp.blogspot.com/-lEYgg8uzVNE/WC8giS6wVrI/AAAAAAAAI6k/GyhrQ3CK_p04FcYB74TxvaNyrL_lmr_UACK4B/s1600/busi%2Biridium%2Bbosch.jpg'
        },
        {
          src: 'http://rotamec.com/wp-content/uploads/2017/02/motovario-in-line.jpg'
        },
        {
          src: 'http://cdn.elevenia.co.id/g/0/5/5/4/8/7/20055487_B_V1.png'
        }
      ],

    links: [
      'Home',
      'About Us',
      'Services',
      'Blog',
      'Contact Us'
    ]
    
  }),
}  


</script>

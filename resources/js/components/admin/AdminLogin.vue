<template>  
      <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
              <v-toolbar dark color="primary">
                <v-toolbar-title>Login</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-tooltip bottom>
                  
                </v-tooltip>
              </v-toolbar>
              <v-card-text>
                <v-form>
                  <v-text-field prepend-icon="person" v-model="Email" label="Email" type="text" ></v-text-field>
                  <v-text-field prepend-icon="lock" v-model="Password" label="Password" id="password" type="password"></v-text-field>
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="primary" @click="login">Login</v-btn>
              </v-card-actions>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
    
</template>


<script>
  export default {
    props: ['nextUrl'],
    data: () => ({
      Email: undefined,
      Password: undefined,
     
      rules: {
        Email: v => (v || '').match(/@/) || 'Please enter a valid email',
        length: len => v => (v || '').length >= len || `Invalid character length, required ${len}`,
        Password: v => (v || '').match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/) ||
          'Password must contain an upper case letter, a numeric character, and a special character',
        required: v => !!v || 'This field is required'
      }
    }),
    methods:{
        login(){

          axios.post('/api/login', {
            Email: this.Email,
            Password: this.Password
            }).then(response => {
                            let pegawai = response.data.pegawai
                            

                            localStorage.setItem('AtmaAuto.pegawai', JSON.stringify(pegawai))
                            localStorage.setItem('AtmaAuto.jwt', response.data.token)

                            if (localStorage.getItem('AtmaAuto.jwt') != null) {
                                this.$emit('loggedIn')
                                if (this.$route.params.nextUrl != null) {
                                    this.$router.push(this.$route.params.nextUrl)
                                } else {
                                    this.$router.push(('/admin'))
                                }
                            }
                        });
            
        }
    }
  }
</script>


 
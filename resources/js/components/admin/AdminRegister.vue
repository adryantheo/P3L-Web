<template>  
      <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8>
            <v-card class="elevation-12">
              <v-toolbar dark color="primary">
                <v-toolbar-title>Register</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-tooltip bottom>
                  
                </v-tooltip>
              </v-toolbar>
              <v-card-text>
                <v-form>
                  <v-text-field prepend-icon="person" v-model="Nama" label="Nama" type="text" ></v-text-field>
                  <v-text-field prepend-icon="person" v-model="Email" label="Email" type="text" :rules="[rules.email]"></v-text-field>
                  <v-text-field prepend-icon="lock" v-model="Password" label="Password" id="password" type="password" :rules="[rules.password, rules.length(6)]"></v-text-field>
                  <v-text-field prepend-icon="person" v-model="Alamat" label="Alamat" type="text" ></v-text-field>
                  <v-text-field prepend-icon="person" v-model="Gaji" label="Gaji" type="text" ></v-text-field>
                  <v-text-field prepend-icon="person" v-model="Role" label="Role" type="text" ></v-text-field>
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="primary" @click="register">Register</v-btn>
              </v-card-actions>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
    
</template>


<script>

import Axios from 'axios'
  export default {
   data: () => ({
      agreement: false,
      bio: '',
      dialog: false,
      email: undefined,
      form: false,
      isLoading: false,
      password: undefined,
      phone: undefined,
      rules: {
        email: v => (v || '').match(/@/) || 'Please enter a valid email',
        length: len => v => (v || '').length >= len || `Invalid character length, required ${len}`,
        password: v => (v || '').match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/) ||
          'Password must contain an upper case letter, a numeric character, and a special character',
        required: v => !!v || 'This field is required'
      }
    }),
    methods:
      {
          register()
          {
              Axios.post('/api/register/', {
              Nama : this.Nama,
              Email : this.Email,
              Password : this.Password,
              Alamat : this.Alamat,
              Gaji : this.Gaji,
              Role : this.Role
                }).then(response => {
                    let data = response.data
                    localStorage.setItem('AtmaAuto.pegawai', JSON.stringify(data.pegawai))
                    localStorage.setItem('AtmaAuto.jwt', data.token)
                    if (localStorage.getItem('AtmaAuto.jwt') != null) {
                        this.$emit('loggedIn')
                        let nextUrl = this.$route.params.nextUrl
                        this.$router.push((nextUrl != null ? nextUrl : '/admin'))
                    }
          });
    }
  }
}
</script>

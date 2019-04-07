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
                  <v-text-field prepend-icon="person" v-model="Nama" label="Nama"  type="text" ></v-text-field>
                  <v-text-field prepend-icon="person" v-model="email" label="email" type="text" ></v-text-field>
                  <v-text-field prepend-icon="lock" v-model="password" label="password" id="password" type="password"></v-text-field>
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


  export default {
   
   data: () => ({
      
      Nama: undefined,
      email: undefined,
      Alamat: undefined,
      Gaji: undefined,
      Role: undefined,
      password: undefined,
      
      
      datas(){
        return{
          Nama: "",
          email: "",
          password: "",
          Alamat: "",
          Gaji: "",
          Role: "",
        }

      }
    }),
    methods:
      {
          register()
          {
             let Nama = this.Nama
             let email = this.email
             let password = this.password
             let Alamat =  this.Alamat
             let Gaji =  this.Gaji
             let Role  = this.Role
              axios.post('/api/register/', {
                Nama,
                email,
                password,
                Alamat,
                Gaji,
                Role
             
                }).then(response => {
                    let datas = response.datas
                    console.log('created Data');
                    localStorage.setItem('AtmaAuto.pegawais', JSON.stringify(datas.pegawais))
                    localStorage.setItem('AtmaAuto.jwt', datas.token)
                    this.$router.push((nextUrl != null ? nextUrl : '/admin'))
                    
          });
    }
  }
}
</script>

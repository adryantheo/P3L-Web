<template>  
      <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
              <v-toolbar dark color="primary">
                <v-toolbar-title>Tahun</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-tooltip bottom>
                  
                </v-tooltip>
              </v-toolbar>
              <v-card-text>
                <v-form>
                  <v-text-field prepend-icon="person" v-model="year" label="Tahun" type="text" :rules="[rules.required]" ></v-text-field>

                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="primary" @click="cari">Cari</v-btn>
              </v-card-actions>
            </v-card>
          </v-flex>

          <v-dialog v-model="dialog" max-width="800px">
            <template v-slot:activator="{ on }">
            </template>
           <v-card>
            <v-card-title>
              <span class="headline">Laporan Pendapatan {{this.year}}</span>
            </v-card-title>
  
            <v-card-text>
              <table style="width:100%" border="bold">
                      <tr>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Service</th>
                        <th>Sparepart</th>
                        <th>Total</th>
                        
                      </tr>
                      <template v-for="(data, i) in cek">
                        <tr :key="i">
                          <td>{{i}}</td>
                          <td>{{bulan[i]}}</td>
                          <td>Rp. {{!!data.Service? data.Service:0}}</td>
                          <td>Rp. {{!!data.Sparepart? data.Sparepart:0}}</td>
                          <td>Rp. {{!!data.Total? data.Total:0}}</td>
                        </tr>
                      </template>
                      <tr>
                          <td colspan="4" align="right">Total</td>
                          <td>Rp.  </td>
                      </tr>
                    </table>
            </v-card-text>
          </v-card>
          </v-dialog>
        </v-layout>
      </v-container>
    
</template>


<script>
  export default {
    props: ['nextUrl'],
    data: () => ({
      pendapatan: [],
      cek: [],
      year: "",
      bulan: ['bulan','Jan','Feb','Mar','Apr','May','June','July','Aug','Sep','Oct','Nov','Des'],
           
      rules: {
        email: v => (v || '').match(/@/) || 'Format Email Salah',
        length: len => v => (v || '').length >= len || `Invalid character length, required ${len}`,
        password: v => (v || '').match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/) || 'password must contain an upper case letter, a numeric character, and a special character',
        required: v => !!v || 'Tidak Boleh Kosong'
      },
      dialog: false,
      editedItem: {  
    },
   
    }),
    computed: {
        formTitle () {
      return this.editedIndex === -1 ? 'Data User' : 'Data Tidak Ditemukan'
    },

    },
    methods:{
        cari(){
            this.dialog = true;
            axios.get('/api/laporan/pendapatan/'+ this.year)
            .then(response =>{
              this.pendapatan = response.data
              this.cek = this.pendapatan.pendapatan;
              console.log(this.cek);
              })
        },
        
    }
  }
</script>
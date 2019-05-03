<template>  
      <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
              <v-toolbar dark color="primary">
                <v-toolbar-title>Cari Kustomer</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-tooltip bottom>
                  
                </v-tooltip>
              </v-toolbar>
              <v-card-text>
                <v-form>
                  <v-text-field prepend-icon="person" v-model="Telepon_Kustomer" label="No Hp" type="text" :rules="[rules.required]" ></v-text-field>

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
              <span class="headline">Hasil Pencarian</span>
            </v-card-title>
  
            <v-card-text>
            <v-data-table
                :headers="headers"
                :items="kustomer"
                class="elevation-1"
            >
                <template v-slot:items="props">
                <td >{{ props.item.Nama_Kustomer }}</td>
                <td >{{ props.item.Alamat_Kustomer }}</td>
                <td >{{ props.item.Telepon_Kustomer }}</td>
                </template>
                <template v-slot:no-data>
               
                </template>
            </v-data-table>
              
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
      kustomer: [],
      Telepon_Kustomer: "",
      Plat_kendaraan: "",
           
      rules: {
        email: v => (v || '').match(/@/) || 'Format Email Salah',
        length: len => v => (v || '').length >= len || `Invalid character length, required ${len}`,
        password: v => (v || '').match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/) || 'password must contain an upper case letter, a numeric character, and a special character',
        required: v => !!v || 'Tidak Boleh Kosong'
      },
      dialog: false,
      editedItem: {  
    },
    headers: [
      { text: 'Nama', value: 'Nama_Kustomer', sortable: true },
      { text: 'Alamat', value: 'Alamat_Kustomer', sortable: false },
      { text: 'No Hp', value: 'Telepon_Kustomer', sortable: true },
      { text: 'Plat Nomor', value: 'Plat_Kendaraaan', sortable: true },
    ],
    
    }),
    computed: {
        formTitle () {
      return this.editedIndex === -1 ? 'Data User' : 'Data Tidak Ditemukan'
    }

    },
    methods:{
        cari(){
            this.dialog = true;
            axios.get('api/kustomer/findKustomer/'+ this.Telepon_Kustomer)
            .then(response => this.kustomer = [response.data])
  
        },
        
    }
  }
</script>


 
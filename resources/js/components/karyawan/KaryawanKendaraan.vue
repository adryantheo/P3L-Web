<template>

    <v-layout align-space-around justify-center fill-height v-if="isLoggedIn">
    <v-flex>
    
  
    <v-toolbar flat color="white">
        <v-toolbar-title>Kelola kendaraan</v-toolbar-title>
        <v-divider
          class="mx-2"
          inset
          vertical
        ></v-divider>
        <v-spacer></v-spacer>
        <v-dialog v-model="dialog" max-width="500px">
          <template v-slot:activator="{ on }">
              <v-text-field
          v-model="search"
          append-icon="search"
          label="Search"
          single-line
          hide-details
        ></v-text-field>
        <v-spacer></v-spacer>
            <v-btn color="primary" dark class="mb-2" v-on="on">New Kendaraan</v-btn>
          </template>
          
          <v-card>
            <v-card-title>
              <span class="headline">{{ formTitle }}</span>
            </v-card-title>  
            <v-card-text>
              <v-container grid-list-md>
                <v-layout wrap>
                  <v-flex xs12 sm6 md4>
                    <v-text-field v-model="editedItem.Plat_kendaraan" label="Plat Nomor"></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md4>
                    <v-text-field v-model="editedItem.Merk" label="Merk"></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md4>
                    <v-text-field v-model="editedItem.Tipe" label="Tipe"></v-text-field>
                  </v-flex>
                   <v-flex xs12 sm6 md4>
                      <v-text-field v-model="editedItem.kustomer_id" label="ID Pemilik"></v-text-field>
                  </v-flex>
                  
                </v-layout>
              </v-container>
            </v-card-text>  
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" flat @click="close">Cancel</v-btn>
              <v-btn color="blue darken-1" flat @click="save">Save</v-btn>
            </v-card-actions>
          </v-card>


        </v-dialog>
      </v-toolbar>
      <v-data-table
        :headers="headers"
        :items="kendaraan"
        :search="search"
        class="elevation-1"
      >
        <template v-slot:items="props">
         
          <td >{{ props.item.Plat_kendaraan }}</td>
          <td >{{ props.item.Merk }}</td>
          <td >{{ props.item.Tipe }}</td>
          <td >{{ props.item.kustomers.Nama_Kustomer }}</td>
         
          <td class=" layout px-0">
            <v-icon small class="mr-2" @click="editItem(props.item)"> edit </v-icon>
            <v-icon small @click="deleteItem(props.item)">delete</v-icon>
            
          </td>
        </template>
        <template v-slot:no-data>
          <v-btn color="primary" @click="initialize">Reset</v-btn>
        </template>
         <v-alert v-slot:no-results :value="true" color="error" icon="warning">
          Your search for "{{ search }}" found no results.
          </v-alert>
      </v-data-table>

    </v-flex>
    </v-layout>
</template>

<script>


export default {
 
  data: () => ({
    
    
    isLoggedIn: localStorage.getItem('jwt') != null,

    beforeMount(){
        this.setComponent(this.$route.params.page)
        this.user = JSON.parse(localStorage.getItem('user'))
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

        },

    dialog: false,
    search: '',
    headers: [
      
      { text: 'Plat Nomor', value: 'Plat_kendaraan', sortable: true },
      { text: 'Merk', value: 'Merk', sortable: true },
      { text: 'Tipe', value: 'Tipe', sortable: true },
      { text: 'Pemilik', value: 'Nama_Kustomer', sortable: true },       
      { text: 'Actions', value: 'id', sortable: false }
    ],
    kendaraan: [],
    editedIndex: -1,
    editedItem: {
     
    },
    defaultItem: {
      
    }
  }),

  computed: {
    formTitle () {
      return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
    },
    
  },

  watch: {
    dialog (val) {
      val || this.close()
    }
  },

  created () {
    this.initialize();
  },

  methods: {

      
  
    
    fetchkendaraan() {
      axios.get('/api/kendaraan/all')
      .then(response => this.kendaraan = response.data)
    },
    
    initialize() {
      this.fetchkendaraan();
      
      
    },

    editItem (item) {
      this.editedIndex = this.kendaraan.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialog = true
    },

    deleteItem (item) {
      const index = this.kendaraan.indexOf(item)
      confirm('Are you sure you want to delete this item?') && this.kendaraan.splice(index, 1)
      console.log('deleted data');

      axios.delete('/api/kendaraan/'+item.id)
        .then(response => {
          console.log(response);
        })
    },

  
    close () {
      this.dialog = false
      setTimeout(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      }, 300)
    },

    save () {
      if (this.editedIndex > -1) {
        console.log('Edited Data');

        axios.patch('/api/kendaraan/'+this.editedItem.id,{
         Nama_kendaraan:this.editedItem.Nama_kendaraan,
         Alamat_kendaraan:this.editedItem.Alamat_kendaraan,
         Telepon_kendaraan:this.editedItem.Telepon_kendaraan
         })
        .then(response => {
          console.log(response);
        })
       
        Object.assign(this.kendaraan[this.editedIndex], this.editedItem)
      } else {
        console.log('created Data');
        axios.post('/api/kendaraan/',{
            Plat_kendaraan:this.editedItem.Plat_kendaraan,
            Merk:this.editedItem.Merk,
            Tipe:this.editedItem.Tipe,
            kustomer_id:this.editedItem.kustomer_id,
            })
        .then(response => {
          console.log(response);
        })
        this.kendaraan.push(this.editedItem)
      }
      this.close()
    }
  }
}
</script>
<template>

    <v-layout align-space-around justify-center fill-height v-if="isLoggedIn">
    <v-flex>
    
  
    <v-toolbar flat color="white">
        <v-toolbar-title>Data Pegawai</v-toolbar-title>
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
         
          </template>
          
          <v-card>
            <v-card-title>
              <span class="headline">{{ formTitle }}</span>
            </v-card-title>
  
            <v-card-text>
              <v-container grid-list-md>
                <v-layout wrap>
                  <v-flex xs12 sm6 md4>
                    <v-text-field v-model="editedItem.Nama" label="Nama"></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md4>
                    <v-text-field v-model="editedItem.email" label="Email"></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md4>
                    <v-text-field v-model="editedItem.Alamat" label="Alamat"></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md4>
                    <v-text-field v-model="editedItem.Gaji" label="Gaji"></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md4>
                    <v-text-field v-model="editedItem.Role" label="Role"></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md4>
                    <v-text-field v-model="editedItem.password" label="Password" type="password"></v-text-field>
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
        :items="pegawai"
        :search="search"
        class="elevation-1"
      >
        <template v-slot:items="props">
          <td >{{ props.item.Nama }}</td>
          <td >{{ props.item.email }}</td>
          <td >{{ props.item.Alamat }}</td>
          <td >Rp. {{ props.item.Gaji }}</td>
          <td >{{ props.item.Role }}</td>
          <td class="layout px-0">
            <v-icon
              small
              class="mr-2"
              @click="editItem(props.item)"
            >
              edit
            </v-icon>
            <v-icon
              small
              @click="deleteItem(props.item)"
            >
              delete
            </v-icon>
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
      { text: 'Nama', value: 'Nama', sortable: true },
      { text: 'Email', value: 'Email', sortable: true },
      { text: 'Alamat', value: 'Alamat', sortable: true },
      { text: 'Gaji', value: 'Gaji', sortable: true },
      { text: 'Role', value: 'Role', sortable: true },
      { text: 'Actions', value: 'id', sortable: false }
    ],
    pegawai: [],
    editedIndex: -1,
    editedItem: {
      
    },
    defaultItem: {
      
    }
  }),

  computed: {
    formTitle () {
      return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
    }
  },

  watch: {
    dialog (val) {
      val || this.close()
    }
  },

  created () {
    this.initialize()
  },

  methods: {
    
    fetchpegawai() {
      axios.get('/api/pegawai/')
      .then(response => this.pegawai = response.data)
    },

    initialize () {
      this.fetchpegawai();
    },

    editItem (item) {
      this.editedIndex = this.pegawai.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialog = true
    },

    deleteItem (item) {
      const index = this.pegawai.indexOf(item)
      confirm('Are you sure you want to delete this item?') && this.pegawai.splice(index, 1)
      console.log('deleted data');

      axios.delete('/api/pegawai/'+item.id)
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
        Object.assign(this.pegawai[this.editedIndex], this.editedItem)

        axios.patch('/api/pegawai/'+this.editedItem.id,{
          Nama:this.editedItem.Nama,
          email:this.editedItem.Email,
          Alamat:this.editedItem.Alamat,
          Gaji:this.editedItem.Gaji,
          Role:this.editedItem.Role,
          password:this.editedItem.password,
          
           })
        .then(response => {
          console.log(response);
        })

      } else {
        this.pegawai.push(this.editedItem)
      }
      this.close()
    }
  }
}
</script>
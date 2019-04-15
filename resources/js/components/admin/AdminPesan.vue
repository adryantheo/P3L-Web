<template>

    <v-layout align-space-around justify-center fill-height v-if="isLoggedIn">
    <v-flex>
    
  
    <v-toolbar flat color="white">
        <v-toolbar-title>Pemesanan Barang</v-toolbar-title>
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
            <v-btn color="primary" dark class="mb-2" v-on="on">Tambah Pengadaan</v-btn>
            <v-btn color="primary" dark class="mb-2" @click="printOrders">Cetak Surat Pengadaan</v-btn>
          </template>
          
          <v-card>
            <v-card-title>
              <span class="headline">{{ formTitle }}</span>
            </v-card-title>
  
            <v-card-text>
              <v-container grid-list-md>
                <v-layout wrap>
                  <v-flex xs12 sm6 md4>
                    <v-text-field v-model="editedItem.Nama_Barang" label="Nama Barang"></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md4>
                    <v-select :items="items" v-model="editedItem.Status" label="Status"></v-select>
                  </v-flex>
                  <v-flex xs12 sm6 md4>
                    <v-text-field v-model="editedItem.Tanggal_Pesan" label="Tanggal Pesan"></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md4>
                    <v-text-field v-model="editedItem.sales_id" label="ID Sales"></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md4>
                    <v-text-field v-model="editedItem.Jumlah_Pesan" label="Jumlah Pesan"></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md4>
                    <v-text-field v-model="editedItem.Jumlah_Diterima" label="Jumlah Diterima"></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md4>
                    <v-text-field v-model="editedItem.Total_Harga_Beli" label="Total Harga"></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md4>
                    <v-text-field v-model="editedItem.sparepart_id" label="ID Sparepart"></v-text-field>
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
        :items="pesanbarang"
        :search="search"
        class="elevation-1"
      >
        <template v-slot:items="props">
         
          <td>{{ props.item.pesanan_barangs.Nama_Barang }}</td>
          <td> {{ props.item.pesanan_barangs.Status }}</td>
          <td>{{ props.item.pesanan_barangs.Tanggal_Pesan }}</td>
          <td> {{ props.item.pesanan_barangs.sales_id }}</td>
          <td> {{ props.item.Jumlah_Pesan }}</td>
          <td> {{ props.item.Jumlah_Diterima }}</td>
          <td> {{ props.item.Total_Harga_Beli }}</td>
          <td> {{ props.item.sparepart_id }}</td>
         
          <td class=" layout px-0">
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

      <div v-show="false" id="printMe">
            <div class="ma-3">              
                <div class="text-xs-center">                  
                    <p class="headline">ATMA AUTO</p>
                    <p class="" >MOTORCYCLE SPAREPARTS AND pesanbarangS</p>
                    <p class="">Jl. Babarsari No. 43 Yogyakarta 552181</p>
                    <p class="">Telp. (0274)487711</p>
                    <p class="">http://www.atmaauto.com</p>
                    <hr>
                    <br>
                    <p class="title">SURAT PEMESANAN</p>                                       
                </div>
                <div class="text-xs-right">
                  <p>No: </p>
                  <p>Tanggal: </p>                  
                </div>
                <div class="text-xs-left">
                  <p>Kepada Yth: </p>
                  <p>Nama Supplier</p>
                  <p>alamat</p>
                  <p>telp supplier</p>
                  <p>Mohon untuk disediakan barang-barang berikut:</p>                
                </div>
                <div>
                   <table style="width:100%" border="bold">
                     <tr>
                      <th>No</th>
                      <th>Nama Barang</th> 
                      <th>Merk</th>
                      <th>Tipe Barang</th>
                      <th>Satuan</th>
                      <th>Jumlah</th>
                    </tr>
                   </table>
                </div>
                <br><br>
                <div class="text-xs-right">
                  <p>Hormat kami,</p><br><br>
                  <p>(Philips Purnomo )</p>                  
                </div>
            </div>
        </div>
    
    </v-layout>

</template>

<script>
import spareparts from './AdminSparepart'
export default {
    
  data: () => ({

    items:['Sedang Dipesan', 'Pesanan Selesai'],

   
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
      
      { text: 'Nama Barang', value: 'Nama_Barang', sortable: true },
      { text: 'Status', value: 'Status', sortable: false },
      { text: 'Tanggal Pesan', value: 'Tanggal_Pesan', sortable: true },
      { text: 'ID Sales', value: 'sales_id', sortable: true },
      { text: 'Jumlah Pesan', value: 'Jumlah_Pesan', sortable: true },
      { text: 'Jumlah Diterima', value: 'Jumlah_Diterima', sortable: true },
      { text: 'Total Harga', value: 'Total_Harga_Beli', sortable: true },
      { text: 'ID Sparepart', value: 'sparepart_id', sortable: true },      
      { text: 'Actions', value: 'id', sortable: false }
    ],
    pesanbarang: [],
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

    printOrders() {
            this.$htmlToPaper('printMe');
        },
        
    fetchpesanbarang() {
      axios.get('/api/detailpesanan/all')
      .then(response => this.pesanbarang = response.data)
      
    },

   
    
    initialize() {
      this.fetchpesanbarang();
    },

    editItem (item) {
      this.editedIndex = this.pesanbarang.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialog = true
    },

    deleteItem (item) {
      const index = this.pesanbarang.indexOf(item)
      confirm('Are you sure you want to delete this item?') && this.pesanbarang.splice(index, 1)
      console.log('deleted data');

      axios.delete('/api/pesanbarang/'+item.id)
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

        axios.patch('/api/pesanbarang/'+this.editedItem.id,{
          Nama_pesanbarang:this.editedItem.Nama_pesanbarang,
           Tarif:this.editedItem.Tarif
           })
        .then(response => {
          console.log(response);
        })
       
        Object.assign(this.pesanbarang[this.editedIndex], this.editedItem)
      } else {
        console.log('created Data');
        axios.post('/api/pesanbarang/',{
          Nama_Barang:this.editedItem.Nama_Barang,
          Status:this.editedItem.Status,
          Tanggal_Pesan:this.editedItem.Tanggal_Pesan,
          sales_id:this.editedItem.sales_id,
           })
        .then(response => {
          console.log(response);
        })
        axios.post('/api/detailpesanan/',{
          Jumlah_Pesan:this.editedItem.Jumlah_Pesan,
          Jumlah_Diterima:this.editedItem.Jumlah_Diterima,
          sparepart_id:this.editedItem.sparepart_id,
          Total_Harga_Beli:this.editedItem.Total_Harga_Beli,
          pesanan__barang_id:this.editedItem.sales_id,
           })
        .then(response => {
          console.log(response);
        })
        this.pesanbarang.push(this.editedItem)
      }
      this.close()
    }
  }
}
</script>

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
                    <v-select :items="dataSparepart" item-text="Nama" item-value="Nama" v-model="editedItem.Nama_Barang" label="Nama Barang"></v-select>
                  </v-flex>
                  <v-flex xs12 sm6 md4>
                    <v-select :items="items" v-model="editedItem.Status" label="Status"></v-select>
                  </v-flex>
                  <!-- <v-flex xs12 sm6 md4>
                    <v-text-field v-model="editedItem.Tanggal_Pesan" label="Tanggal Pesan"></v-text-field>
                  </v-flex> -->
                  <v-flex xs12 sm6 md4>
                    <v-select :items="dataSales" item-text="Nama_Supplier" item-value="id" v-model="editedItem.sales_id" label="ID Sales"></v-select>
                  </v-flex>
                  <v-flex xs12 sm6 md4>
                    <v-text-field v-model="editedItem.Jumlah_Pesan" label="Jumlah Pesan"></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md4>
                    <v-text-field v-model="editedItem.Jumlah_Diterima" label="Jumlah Diterima"></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md4>
                    <v-text-field v-model="editedItem.Harga_Beli" label="Harga Beli"></v-text-field>
                  </v-flex>
                  <!-- <v-flex xs12 sm6 md4>
                    <v-text-field v-model="editedItem.Total_Harga_Beli" label="Total Harga"></v-text-field>
                  </v-flex> -->
                  <v-flex xs12 sm6 md4>
                    <v-select :items="dataSparepart" item-text="Nama" item-value="id" v-model="editedItem.sparepart_id" label="ID Sparepart"></v-select>
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
          <td>{{ props.item.pesanan_barangs.created_at }}</td>
          <td> {{ props.item.pesanan_barangs.sales_id }}</td>
          <td> {{ props.item.Jumlah_Pesan }}</td>
          <td> {{ props.item.Jumlah_Diterima }}</td>
          <td>Rp. {{ props.item.Harga_Beli }}</td>
          <td> Rp. {{ props.item.Total_Harga_Beli }}</td>
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
                    <p class="" >MOTORCYCLE SPAREPARTS AND SERVICES</p>
                    <p class="">Jl. Babarsari No. 43 Yogyakarta 552181</p>
                    <p class="">Telp. (0274)487711</p>
                    <p class="">http://www.atmaauto.com</p>
                    <hr>
                    <br>
                    <p class="title">SURAT PEMESANAN</p>                                       
                </div>
                <div class="text-xs-right">
                  <template v-for="(data,i) in pesanbarang">
                  <tr :key="i">
                  <p>No: {{data.id}}</p>
                  <p>Tanggal: {{data.created_at}} </p>
                  </tr>
                  </template>                  
                </div>
                <div class="text-xs-left">
                  <template v-for="(data, i) in pesanbarang">
                  <tr :key="i">
                  <p>Kepada Yth: </p>
                  <p>{{data.pesanan_barangs.sales.Nama_Supplier}}</p>
                  <p>{{data.pesanan_barangs.sales.Alamat_Sales}}</p>
                  <p>{{data.pesanan_barangs.sales.Nomor_Telphone_Sales}}</p>
                  <p>Mohon untuk disediakan barang-barang berikut:</p>
                    </tr>
                  </template>                  
                                  
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
                    <template v-for="(data, i) in pesanbarang">
                      <tr :key="i">
                        <td>{{data.id}}</td>
                        <td>{{data.pesanan_barangs.Nama_Barang}}</td>
                        <td>{{data.spareparts.Merk}}</td>
                        <td>{{data.spareparts.Tipe}}</td>
                        <td>{{data.Jumlah_Pesan}}</td>
                        <td>Rp. {{data.Total_Harga_Beli}}</td>
                        
                      </tr>
                    </template>
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
import sales from './AdminSales'
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
      { text: 'Tanggal Pesan', value: 'created_at', sortable: true },
      { text: 'ID Sales', value: 'sales_id', sortable: true },
      { text: 'Jumlah Pesan', value: 'Jumlah_Pesan', sortable: true },
      { text: 'Jumlah Diterima', value: 'Jumlah_Diterima', sortable: true },
      { text: 'Harga Beli', value: 'Harga_Beli', sortable: true },
      { text: 'Total Harga', value: 'Total_Harga_Beli', sortable: true },
      { text: 'ID Sparepart', value: 'sparepart_id', sortable: true },      
      { text: 'Actions', value: 'id', sortable: false }
    ],
    pesanbarang: [],
    dataSales: [],
    dataSparepart: [], 
    detailpesanan: [],
    Total_Harga_Beli: 0,
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
    getTotalHarga(){
      
      var hargaBeli = parseFloat(this.dataSparepart.Harga_Beli)
      this.Total_Harga_Beli = this.hargaBeli
    }
    
    
  },

  watch: {
    dialog (val) {
      val || this.close()
    },
    "editedItem.sparepart_id"(val){
      console.log(val);      
    },
    "editedItem.sales_id"(val){
      console.log(val);
    },
    
  },

  created () {
    this.initialize()
  },

  methods: {

    printOrders() {
            this.$htmlToPaper('printMe');
        },

    getHargaBeli(){
       parseFloat(this.dataSparepart.Harga_Beli);

    },

    fetchsales(){
      axios.get('/api/sales/')
      .then(response => this.dataSales = response.data)

    },

    fetchsparepart(){
      axios.get('/api/sparepart/')
      .then(response => this.dataSparepart = response.data)

    },
        
    fetchpesanbarang() {
      axios.get('/api/detailpesanan/all')
      .then(response => this.pesanbarang = response.data)
      
    },
    fetchdetailpesanan() {
      axios.get('/api/detailpesanan/')
      .then(response => this.detailpesanan = response.data)
      
    },

   
    
    initialize() {
      this.fetchpesanbarang();
      this.fetchsales();
      this.fetchsparepart();
      this.fetchdetailpesanan()
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

      axios.delete('/api/detailpesanan/'+item.id)
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
          sales_id:this.editedItem.sales_id,
          Jumlah_Pesan:this.editedItem.Jumlah_Pesan,
          Jumlah_Diterima:this.editedItem.Jumlah_Diterima,
          sparepart_id:this.editedItem.sparepart_id,
          Harga_Beli:this.editedItem.Harga_Beli,
          Total_Harga_Beli:this.editedItem.Jumlah_Pesan * this.editedItem.Harga_Beli,
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

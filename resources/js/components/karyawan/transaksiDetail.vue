<template>
    <v-layout align-space-around justify-center fill-height v-if="isLoggedIn">
        <v-flex>  
        

        <v-data-table
            :headers="headerService"
            :items="TService"
            :search="search"
            class="elevation-1">
         <template v-slot:items="props">
        
            <td>{{ props.item.service_id }}</td>
            <td> {{ props.item.user_id }}</td>
            <td>{{ props.item.kendaraan_id }}</td>
            <td> {{ props.item.Status }}</td>
            <td> {{ props.item.Jumlah_Service }}</td>
            <td> {{ props.item.Total_Biaya }}</td>
            
            <td class=" layout px-0">
                <v-icon
                small
                class="mr-2"
                @click="editItemService(props.item)"
                >
                edit
                </v-icon>
                <v-icon
                small
                @click="deleteItemService(props.item)"
                >
                delete
                </v-icon>
            </td>
         </template>
                        
        </v-data-table>

        <br>

        <v-data-table
            :headers="headerSparepart"
            :items="TSparepart"
            :search="search"
            class="elevation-1"
            >
            <template v-slot:items="props">
            
                <td>{{ props.item.sparepart_id }}</td>
                <td> {{ props.item.Jumlah_Dibeli }}</td>
                <td>{{ props.item.Subtotal }}</td>
                
                
                
            
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
                    <p class="title">SURAT PERINTAH KERJA</p>                                       
                </div>
                    <br><br>
             </div>
            </div>
    </v-layout>

</template>

<script>

export default {

  props:{
      transaksi: {
          type: String,
          required: true,
      },

  },
    
  data: () => ({

    items:['Sedang Dikerjakan','Sudah Selesai'],

    isLoggedIn: localStorage.getItem('jwt') != null,

    beforeMount(){
        this.setComponent(this.$route.params.page)
        this.user = JSON.parse(localStorage.getItem('user'))
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')
        },
        
    dialog: false,
    dialogSparepart: false,
    dialogService: false,
    search: '',
    headers: [
      { text: 'Nama Customer', value: 'Nama_Barang', sortable: true },
      { text: 'Telepon Customer', value: 'Status', sortable: false },
      { text: 'Motor Customer', value: 'created_at', sortable: true },
      { text: 'Nama CS', value: 'sales_id', sortable: true },
      { text: 'Nama Montir', value: 'Jumlah_Pesan', sortable: true },
      { text: 'Tanggal', value: 'Jumlah_Diterima', sortable: true },
            
      { text: 'Actions', value: 'id', sortable: false }
    ],
    headerService: [
      { text: 'ID Service', value: '', sortable: true },
      { text: 'Pegawai', value: '', sortable: false },
      { text: 'Kendaraan', value: '', sortable: false },
      { text: 'Status', value: '', sortable: false },
      { text: 'Jumlah Service', value: '', sortable: true },
      { text: 'Total Biaya', value: '', sortable: true },   
      { text: 'Actions', value: 'id', sortable: false }
    ],
    headerSparepart: [
      { text: 'ID Sparepart', value: '', sortable: true },
      { text: 'Jumlah Beli', value: '', sortable: false },
      { text: 'Subtotal', value: '', sortable: false },   
      { text: 'Actions', value: 'id', sortable: false }
    ],
   
    sparepart: [],
    TService: [],
    TSparepart:[],
    service: [],
    kustomer: [],
    kendaraan: [], 
    detailTransaksi: [],
    pegawai: [],
    pickedItem: null,
    idTS: 0,
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

    openDialogDetail(item){
      console.log(item);
      this.pickedItem = item;
      this.dialog = true;
    },

    printOrders() {
            this.$htmlToPaper('printMe');
        },

    getHargaBeli(){
       parseFloat(this.dataSparepart.Harga_Beli);

    },

    fetchkustomer(){
      axios.get('/api/kustomer/')
      .then(response => this.kustomer = response.data)

    },

    fetchkendaraan(){
      axios.get('/api/kendaraan/')
      .then(response => this.kendaraan = response.data)

    },
        
    fetchpesanbarang() {
      axios.get('/api/detailpesanan/all')
      .then(response => this.pesanbarang = response.data)
      
    },
    fetchTransaksiDetail() {
      axios.get(`/api/transaksi/${this.transaksi}`)
       .then(response => this.detailTransaksi = response.data)
      this.TService = detailTransaksi.transaksi_service;
      this.TSparepart = detailTransaksi.transaksi_sparepart;
         
    },

    fetchservice(){
      axios.get('/api/service/')
      .then(response => this.service = response.data)
      
    },
    fetchpegawai(){
      axios.get('/api/pegawai/')
      .then(response => this.pegawai = response.data)
    },
    
    fetchsparepart(){
      axios.get('/api/sparepart/')
      .then(response => this.sparepart = response.data)
    },

   
    
    initialize() {
      this.fetchpesanbarang();
      this.fetchkustomer();
      this.fetchkendaraan();
      this.fetchTransaksiDetail();
      this.fetchservice();
      this.fetchpegawai();
      this.fetchTService();
      this.fetchTSparepart();
      this.fetchsparepart()
    },

    editItem (item) {
      this.editedIndex = this.transaksi.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialog = true
    },

    editItemService (item) {
      this.editedIndex = this.TService.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialogService = true
    },

    deleteItem (item) {
      const index = this.transaksi.indexOf(item)
      confirm('Are you sure you want to delete this item?') && this.pesanbarang.splice(index, 1)
      console.log('deleted data');

      axios.delete('/api/transaksi/'+item.id)
        .then(response => {
          console.log(response);
        })

    },

     deleteItemService (item) {
      const index = this.TService.indexOf(item)
      confirm('Are you sure you want to delete this item?') && this.TService.splice(index, 1)
      console.log('deleted data');

      axios.delete('/api/transaksi-service/'+item.id)
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
      console.log('created Data');
      axios.post('/api/transaksi/',{
          cabang_id:1,
          nama_cs:"hehe",
          Total_Pembelian: 0,
          Total_Service: 0,
          Total_Seluruh: 0,
          Diskon: 0,
          Status: "Pending",           
          kustomer_id: this.editedItem.kustomer_id,
          user_id: 1,

           })
        .then(response => {
          console.log(response);
        })
        this.close()
        
     //   this.pesanbarang.push(this.editedItem)
      // if (this.editedIndex > -1) {
      //   console.log('Edited Data');

      //   axios.patch('/api/pesanbarang/'+this.editedItem.id,{
      //     Nama_pesanbarang:this.editedItem.Nama_pesanbarang,
      //      Tarif:this.editedItem.Tarif
      //      })
      //   .then(response => {
      //     console.log(response);
      //   })
       
      //   Object.assign(this.pesanbarang[this.editedIndex], this.editedItem)
      // }
      //  else 
      //  {
      //   console.log('created Data');
      //   axios.post('/api/transaksi/',{
      //     cabang_id:1,
      //     Total_Pembelian: 0,
      //     Total_Service: 0,
      //     Total_Seluruh: 0,
      //     Diskon: 0,
      //     Status: "Pending",           
      //     kustomer_id: editedItem.kustomer_id,
      //     user_id: 1,

      //      })
      //   .then(response => {
      //     console.log(response);
      //   })
        
      //   this.pesanbarang.push(this.editedItem)
      // }
      // this.close()
    },
    saveService () {

      
      if (this.editedIndex > -1) {
        console.log('Edited Data');

        axios.patch('/api/transaksi-service/'+this.editedItem.id,{
          Total_Biaya: 0,
          Jumlah_Service: 0,
          Status: this.editedItem.StatusService,
          service_id: this.editedItem.service_id,
          kendaraan_id: 1,           
          transaksi_id: 1,
          user_id: 1,
           })
        .then(response => {
          console.log(response);
        })
       
        Object.assign(this.TService[this.editedIndex], this.editedItem)
      }else{
        console.log('created Data');
      axios.post('/api/transaksi-service/',{
          Total_Biaya: 0,
          Jumlah_Service: 0,
          Status: this.editedItem.StatusService,
          service_id: this.editedItem.service_id,
          kendaraan_id: 1,           
          transaksi_id: 1,
          user_id: 1,

           })
        .then(response => {
          console.log(response);
        })

      }

      
        this.close()
    },
    saveSparepart () {
      console.log('created Data');
      axios.post('/api/transaksi-sparepart/',{
          Jumlah_Dibeli:this.editedItem.Jumlah_Dibeli,
          Subtotal: this.editedItem.Jumlah_Dibeli*2000,
          Sisa_Stok: 0,
          transaksi_id: 1,
          sparepart_id: 1,
          user_id: 1,           
          
           })
        .then(response => {
          console.log(response);
        })
        this.close()
    }
        
  }
}
</script>

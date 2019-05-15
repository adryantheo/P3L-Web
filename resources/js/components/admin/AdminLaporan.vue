<template>
    <v-layout align-space-around justify-center fill-height v-if="isLoggedIn">
        <v-flex>  
          <v-layout row align-center>
            <table style="width:100%" border="bold">
              <tr>
                <th>No</th>
                <th>Sparepart</th> 
                <th>Service</th>
                <th>Total</th>
              </tr>
              <template >
                <tr>
                  <td> 1 </td>
                  <td>Rp. {{this.pendapatanSparepart.pendapatan}} </td>
                  <td>Rp. {{ this.pendapatanSparepart.pendapatan }} </td>
                  <td>Rp. {{ this.pendapatanTot.pendapatan }} </td>
                </tr>
              </template>
            </table>
                
            </v-layout>
            
      </v-flex>

  <!-- Print SPK -->

    <!-- <div v-show="false" id="printMe">
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
             <div class="text-xs-right">                  
                 <p>{{this.detailTransaksi.created_at}}</p>
                 <p>CS: {{this.dataPegawai.Nama}}</p>
                 <p>Montir: {{this.dataPegawai.Nama}}</p>
              </div>
              <div class="text-xs-left">
                 <p>No: {{this.detailTransaksi.id}}</p>
                 <p>Cust: {{this.dataKustomer.Nama_Kustomer}}</p>
                 <p>Telepon: {{this.dataKustomer.Telepon_Kustomer}}</p> 
              </div>                                       
        </div>
            <br><br>
            <div class="text-xs-center">
              <p class="headline">SERVICE</p>
              <table style="width:100%" border="bold">
              <tr>
                <th>No</th>
                <th>Nama</th> 
                <th>Jumlah</th>
              </tr>
              <template v-for="(data, i) in TService">
                <tr :key="i">
                  <td>{{data.id}}</td>
                  <td>{{data.services.Nama_Service}}</td>
                  <td>{{data.Jumlah_Service}}</td>
                </tr>
              </template>
            </table>
            </div>
            <br>
            <div class="text-xs-center">
              <p class="headline">SPAREPARTS</p>
              <table style="width:100%" border="bold">
              <tr>
                <th>No</th>
                <th>Nama</th> 
                <th>Merk</th>
                <th>Rak</th>
                <th>Jumlah</th>
              </tr>
              <template v-for="(data, i) in TSparepart">
                <tr :key="i">
                  <td>{{data.id}}</td>
                  <td>{{data.spareparts.Nama}}</td>
                  <td>{{data.spareparts.Merk}}</td>
                  <td>{{data.spareparts.Letak}}</td>
                  <td>{{data.Jumlah_Dibeli}}</td>
                </tr>
              </template>
            </table>
          </div>
      </div>
    </div> -->

  <!-- Print Nota -->

          <!-- <div v-show="false" id="printNot">
             <div class="ma-3">              
                <div class="text-xs-center">                  
                    <p class="headline">ATMA AUTO</p>
                    <p class="" >MOTORCYCLE SPAREPARTS AND SERVICES</p>
                    <p class="">Jl. Babarsari No. 43 Yogyakarta 552181</p>
                    <p class="">Telp. (0274)487711</p>
                    <p class="">http://www.atmaauto.com</p>
                    <hr>
                    <br>
                    <p class="title">NOTA LUNAS</p>
                      <div class="text-xs-right">                  
                        <p>{{this.detailTransaksi.created_at}}</p>
                        <p>CS: {{this.dataPegawai.Nama}}</p>
                        <p>Montir: {{this.dataPegawai.Nama}}</p>
                      </div>
                      <div class="text-xs-left">
                        <p>No: {{this.detailTransaksi.id}}</p>
                        <p>Cust: {{this.dataKustomer.Nama_Kustomer}}</p>
                        <p>Telepon: {{this.dataKustomer.Telepon_Kustomer}}</p> 
                      </div>                                                
                </div>
                    <br><br>
                    <div class="text-xs-center">
                      <p class="headline">SERVICE</p>
                      <table style="width:100%" border="bold">
                      <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Sub Total</th>
                      </tr>
                      <template v-for="(data, i) in TService">
                        <tr :key="i">
                          <td>{{data.id}}</td>
                          <td>{{data.services.Nama_Service}}</td>
                           <td>{{data.services.Tarif}}</td>
                          <td>{{data.Jumlah_Service}}</td>
                          <td>Rp. {{data.Total_Biaya}}</td>
                        </tr>
                      </template>
                    </table>
                    </div>
                    <br>
                    <div class="text-xs-center">
                      <p class="headline">SPAREPARTS</p>
                      <table style="width:100%" border="bold">
                      <tr>
                        <th>Kode</th>
                        <th>Nama</th> 
                        <th>Merk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Sub Total</th>
                      </tr>
                      <template v-for="(data, i) in TSparepart">
                        <tr :key="i">
                          <td>{{data.spareparts.Kode_Sparepart}}</td>
                          <td>{{data.spareparts.Nama}}</td>
                          <td>{{data.spareparts.Merk}}</td>
                          <td>Rp. {{data.spareparts.Harga_Jual}}</td>
                          <td>{{data.Jumlah_Dibeli}}</td>
                          <td>Rp. {{data.Subtotal}}</td>
                        </tr>
                      </template>
                    </table>
                  </div>
             </div>
            </div> -->


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
    dialogPay:false,
    search: '',
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
    dataKustomer:[],
    dataPegawai:[],
    pendapatanTot:[],
    pendapatanService:[],
    pendapatanSparepart:[],
    service: [],
    kustomer: [],
    kendaraan: [], 
    detailTransaksi: [],
    pegawai: [],
    pickedItem: null,
    idTS: 0,
    editedIndex: -1,
    editedItem: {},
    defaultItem: {}
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

    PayItem(){
      axios.patch(`/api/transaksi-paid/${this.transaksi}`);
      axios.patch(`/api/transaksi/${this.transaksi}`,{
        Status: "Sudah Selesai",
      });
      this.printNota();
        this.dialogPay = false;

    },

    openDialogDetail(item){
      console.log(item);
      this.pickedItem = item;
      this.dialog = true;
    },

    printOrders() {
            this.$htmlToPaper('printMe');
        },

    printNota() {
            this.$htmlToPaper('printNot');
        },

      fetchPendapatanTot(){
        axios.get('/api/transaksi/pendapatan/total')
        .then(response => this.pendapatanTot = response.data)

      },

      fetchPendapatanSer(){
        axios.get('/api/transaksi/pendapatan/service')
        .then(response => this.pendapatanService = response.data)

      },

      fetchPendapatanSpare(){
        axios.get('/api/transaksi/pendapatan/sparepart')
        .then(response => this.pendapatanSparepart = response.data)

      },

   
    fetchTransaksiDetail() {
      axios.get(`/api/transaksi/`)
       .then(response => {
         this.detailTransaksi = response.data
         console.log(response.data)
         this.TService = this.detailTransaksi.transaksi_service;
         this.TSparepart = this.detailTransaksi.transaksi_sparepart;
         this.dataKustomer = this.detailTransaksi.kustomer;
         this.dataPegawai = this.detailTransaksi.pegawai;
         })
      
    },

    initialize() {
      this.fetchPendapatanTot();
      this.fetchPendapatanSer();
      this.fetchPendapatanSpare();
      this.fetchTransaksiDetail();
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

    editItemSparepart (item) {
      this.editedIndex = this.TSparepart.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialogSparepart = true
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

    deleteItemSparepart (item) {
      const index = this.TSparepart.indexOf(item)
      confirm('Are you sure you want to delete this item?') && this.TSparepart.splice(index, 1)
      console.log('deleted data');

      axios.delete('/api/transaksi-sparepart/'+item.id)
        .then(response => {
          console.log(response);
        })
    },

    close () {
      this.dialog = false
      this.dialogSparepart = false
      this.dialogService = false
      this.dialogPay = false
      setTimeout(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      }, 300)
    },

    
    saveService () {

      
      if (this.editedIndex > -1) {
        console.log('Edited Data');
        axios.patch('/api/transaksi-service/'+this.editedItem.id,{
          Total_Biaya: this.editedItem.Jumlah_Service,
          Jumlah_Service: this.editedItem.Jumlah_Service,
          Status: this.editedItem.StatusService,
          service_id: this.editedItem.service_id,
          kendaraan_id: this.editedItem.kendaraan_id,           
          transaksi_id: `${this.transaksi}`,
          user_id: this.editedItem.user_id,
           })
        .then(response => {
          console.log(response);
        })
       
        Object.assign(this.TService[this.editedIndex], this.editedItem)
      }else{
        console.log('created Data');
        axios.post('/api/transaksi-service/',{
          Total_Biaya: this.editedItem.Jumlah_Service,
          Jumlah_Service: this.editedItem.Jumlah_Service,
          Status: this.editedItem.StatusService,
          service_id: this.editedItem.service_id,
          kendaraan_id: this.editedItem.kendaraan_id,           
          transaksi_id: `${this.transaksi}`,
          user_id: this.editedItem.user_id,
           })
        .then(response => {
          console.log(response);
        })
      }
        this.close()
    },
    saveSparepart () {

      if (this.editedIndex > -1) {
        console.log('Edited Data');
        axios.patch('/api/transaksi-sparepart/'+this.editedItem.id,{
          Jumlah_Dibeli:this.editedItem.Jumlah_Dibeli,
          Subtotal: this.editedItem.Jumlah_Dibeli*2000,
          Sisa_Stok: 0,
          transaksi_id: `${this.transaksi}`,
          sparepart_id: this.editedItem.sparepart_id,
          user_id: this.editedItem.user_id,
           })
        .then(response => {
          console.log(response);
        })
      }else{
        console.log('created Data');
        axios.post('/api/transaksi-sparepart/',{
          Jumlah_Dibeli:this.editedItem.Jumlah_Dibeli,
          Subtotal: this.editedItem.Jumlah_Dibeli,
          Sisa_Stok: 0,
          transaksi_id: `${this.transaksi}`,
          sparepart_id: this.editedItem.sparepart_id,
          user_id: this.editedItem.user_id,       
           })
        .then(response => {
          console.log(response);
        })

      }      
        this.close()
    }
        
  }
}
</script>

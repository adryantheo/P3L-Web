<?php

namespace App\Http\Controllers;

use App\Pesanan_Barang;
use Illuminate\Http\Request;

class PesananBarangController extends Controller
{
    
    public function index()
    {
        return response()->json(Pesanan_Barang::all(),200);
    }

    public function all()
    {
        return response()->json(Pesanan_Barang::with('sales')->get(),200);
    }

    
    public function store(Request $request)
    {
        $pesanan_Barang = Pesanan_Barang::create([
            'Nama_Barang' => $request->Nama_Barang,
            'Status' => $request->Status,
            'Tanggal_Pesan' => $request->Tanggal_Pesan,
            'sales_id' => $request->sales_id,
           
        ]);

        return response()->json([
            'status' => (bool) $pesanan_Barang,
            'data'   => $pesanan_Barang,
            'message' => $pesanan_Barang ? ' Pesanan Barang Baru Berhasil Ditambahkan!' : 'Error Menambahkan  Pesanan Barang Baru'
        ]);
    }

    
    public function show(Pesanan_Barang $pesanan_Barang)
    {
        return response()->json($pesanan_Barang,200);
    }

    public function update(Request $request, Pesanan_Barang $pesanan_Barang)
    {
        $status = $pesanan_Barang->update(
            $request->only([
                'Nama_Barang',
                'Status',
                'Tanggal_Pesan',
                'Tanggal_Terima',
                'sales_id'
               
        
            ])
        );
        return response()->json([
            'status' => $status,
            'message' => $status ? ' Pesanan Barang Diupdate!' : 'Error Mengupdate  Pesanan Barang'
        ]);
    }

   
    public function destroy(Pesanan_Barang $pesanan_Barang)
    {
        $status = $pesanan_Barang->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? ' Pesanan Barang Berhasil di Hapus!' : 'Error Menghapus  Pesanan Barang'
        ]);
    }
}

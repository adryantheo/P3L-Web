<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    
    public function index()
    {
        return response()->json(Transaksi::all(),200);
    }

    
    public function store(Request $request)
    {
        $transaksi = Transaksi::create([
            'Total_Pembelian' => $request->Total_Pembelian,
            'Total_Service' => $request->Total_Service,
            'Total_Seluruh' => $request->Total_Seluruh,
            'Diskon' => $request->Diskon,
            'Status' => $request->Status,
            'cabang_id' => $request->cabang_id,
            'kustomer_id' => $request->kustomer_id,
            'pegawai_id' => $request->pegawai_id,
            
        ]);

        return response()->json([
            'status' => (bool) $transaksi,
            'data'   => $transaksi,
            'message' => $transaksi ? 'Transaksi Baru Berhasil Ditambahkan!' : 'Error Menambahkan Transaksi Baru'
        ]);
    }

    
    public function show(Transaksi $transaksi)
    {
        return response()->json($transaksi,200);
    }

    
    public function update(Request $request, Transaksi $transaksi)
    {
        $status = $transaksi->update(
            $request->only([
                'Total_Pembelian', 
                'Total_Service',
                'Total_Seluruh',
                'Diskon', 
                'Status', 
                'cabang_id',
                'kustomer_id',
                'pegawai_id'
               
        
            ])
        );
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Transaksi Diupdate!' : 'Error Mengupdate Transaksi'
        ]);
    }

    
    public function destroy(Transaksi $transaksi)
    {
        $status = $transaksi->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Transaksi Berhasil di Hapus!' : 'Error Menghapus Transaksi'
        ]);
    }
}

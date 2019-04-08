<?php

namespace App\Http\Controllers;

use App\Transaksi_Sparepart;
use Illuminate\Http\Request;

class TransaksiSparepartController extends Controller
{
    
    public function index()
    {
        return response()->json(Transaksi_Sparepart::all(),200);
    }

    
    public function store(Request $request)
    {
        $transaksi_Sparepart = Transaksi_Service::create([
            'Jumlah_Dibeli' => $request->Jumlah_Dibeli,
            'Subtotal' => $request->Subtotal,
            'Sisa_Stok' => $request->Sisa_Stok,
            'Transaksi_Id' => $request->Transaksi_Id,
            'Sparepart_id' => $request->Sparepart_id,
            
        ]);

        return response()->json([
            'status' => (bool) $transaksi_Sparepart,
            'data'   => $transaksi_Sparepart,
            'message' => $transaksi_Sparepart ? 'Transaksi Baru Berhasil Ditambahkan!' : 'Error Menambahkan Transaksi Baru'
        ]);
    }

    
    public function show(Transaksi_Sparepart $transaksi_Sparepart)
    {
        return response()->json($transaksi_Sparepart,200);
    }

    
    public function update(Request $request, Transaksi_Sparepart $transaksi_Sparepart)
    {
        $status = $transaksi_Sparepart->update(
            $request->only([
                'Jumlah_Dibeli',
                'Subtotal',
                'Sisa_Stok',
                'Transaksi_Id',
                'Sparepart_id', 
               
        
            ])
        );
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Transaksi Diupdate!' : 'Error Mengupdate Transaksi'
        ]);
    }

    
    public function destroy(Transaksi_Sparepart $transaksi_Sparepart)
    {
        $status = $transaksi_Sparepart->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Transaksi Berhasil di Hapus!' : 'Error Menghapus Transaksi'
        ]);
    }
}

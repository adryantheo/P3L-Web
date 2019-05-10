<?php

namespace App\Http\Controllers;

use App\Transaksi_Service;
use Illuminate\Http\Request;

class TransaksiServiceController extends Controller
{
    
    public function index()
    {
        return response()->json(Transaksi_Service::all(),200);
    }

    
    public function store(Request $request)
    {
        $transaksi_Service = Transaksi_Service::create([
            'Total_Biaya' => $request->Total_Biaya,
            'user_id' => $request->user_id,            
            'Jumlah_Service' => $request->Jumlah_Service,
            'Status' => $request->Status,
            'service_id' => $request->service_id,
            'transaksi_id' => $request->transaksi_id,
            'kendaraan_id' => $request->kendaraan_id,
        ]);

        return response()->json([
            'status' => (bool) $transaksi_Service,
            'data'   => $transaksi_Service,
            'message' => $transaksi_Service ? 'Transaksi Baru Berhasil Ditambahkan!' : 'Error Menambahkan Transaksi Baru'
        ]);
    }

    
    public function show(Transaksi_Service $transaksi_Service)
    {
        return response()->json($transaksi_Service,200);
    }

    
    public function update(Request $request, Transaksi_Service $transaksi_Service)
    {
        $status = $transaksi_Service->update(
            $request->only([
                'Total_Biaya',
                'user_id',
                'Jumlah_Service',
                'Status',
                'service_id',
                'transaksi_id',
                'kendaran_id',
               
        
            ])
        );
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Transaksi Diupdate!' : 'Error Mengupdate Transaksi'
        ]);
    }

    public function destroy(Transaksi_Service $transaksi_Service)
    {
        $status = $transaksi_Service->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Transaksi Berhasil di Hapus!' : 'Error Menghapus Transaksi'
        ]);
    }
}

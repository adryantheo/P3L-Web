<?php

namespace App\Http\Controllers;

use App\Transaksi_Service;
use Illuminate\Http\Request;

class TransaksiServiceController extends Controller
{
    
    public function index()
    {
        return response()->json(Transaksi::all(),200);
    }

    
    public function store(Request $request)
    {
        $transaksi_Service = Transaksi_Service::create([
            'Total_Biaya' => $request->Total_Biaya,
            'Pegawai_Id' => $request->Pegawai_Id,
            'Jumlah_Service' => $request->Jumlah_Service,
            'Status' => $request->Status,
            'Transaksi_Id' => $request->Transaksi_Id,
            
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
                'Pegawai_Id',
                'Jumlah_Service',
                'Status',
                'Transaksi_Id', 
               
        
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

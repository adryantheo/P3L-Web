<?php

namespace App\Http\Controllers;

use App\Detail_Pesanan;
use Illuminate\Http\Request;

class DetailPesananController extends Controller
{
   
    public function index()
    {
        return response()->json(Detail_Pesanan::all(),200);
    }

    public function store(Request $request)
    {
        $detail_Pesanan = Detail_Pesanan::create([
            'Plat_kendaraan' => $request->Plat_kendaraan,
            'Merk' => $request->Merk,
            'Tipe' => $request->Tipe,
            'kustomer_id' => $request->kustomer_id
            
            
        ]);

        return response()->json([
            'status' => (bool) $detail_Pesanan,
            'data'   => $detail_Pesanan,
            'message' => $detail_Pesanan ? 'Detail_Pesanan Berhasil Ditambahkan!' : 'Error Menambahkan Detail_Pesanan'
        ]);
    }

    public function show(Detail_Pesanan $detail_Pesanan)
    {
        return response()->json($detail_Pesanan,200);
    }

    public function update(Request $request, Detail_Pesanan $detail_Pesanan)
    {
        $status = $detail_Pesanan->update(
            $request->only([
                'Plat_kendaraan', 
                'Merk', 
                'Tipe',
                'kustomer_id'
        
            ])
        );
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Detail_Pesanan Diupdate!' : 'Error Mengupdate Detail_Pesanan'
        ]);
    }

    public function destroy(Detail_Pesanan $detail_Pesanan)
    {
        $status = $detail_Pesanan->delete();

            return response()->json([
                'status' => $status,
                'message' => $status ? 'Detail_Pesanan Berhasil di Hapus!' : 'Error Menghapus Detail_Pesanan'
            ]);
    }
}

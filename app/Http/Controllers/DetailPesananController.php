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


    public function all()
    {
        return response()->json(Detail_Pesanan::with([
            'pesanan_barangs.sales', 
            'spareparts'
        ])->get(),200);
    }

    public function store(Request $request)
    {
        $detail_Pesanan = Detail_Pesanan::create([
            'Total_Harga_Beli' => $request->Total_Harga_Beli,
            'Jumlah_Diterima' => $request->Jumlah_Diterima,
            'Jumlah_Pesan' => $request->Jumlah_Pesan,
            'pesanan_id' => $request->pesanan_id,
            'sparepart_id' => $request->sparepart_id,
            
            
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
                'Total_Harga_Beli',
                'Jumlah_Diterima',
                'Jumlah_Pesan',
                'pesanan_id',
                'sparepart_id',
        
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

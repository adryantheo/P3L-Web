<?php

namespace App\Http\Controllers;

use App\Sparepart;
use Illuminate\Http\Request;

class SparepartController extends Controller
{
   
    public function index()
    {
        return response()->json(Sparepart::all(),200);
    }

   
    public function store(Request $request)
    {
        $sparepart = Sparepart::create([
            'Kode_Sparepart' => $request->Kode_Sparepart,
            'Nama' => $request->Nama,
            'Tipe' => $request->Tipe,
            'Merk' => $request->Merk,
            'Gambar' => $request->Gambar,
            'Jenis_Motor' => $request->Jenis_Motor,
            'Harga_Beli' => $request->Harga_Beli,
            'Harga_Jual' => $request->Harga_Jual,
            'Letak' => $request->Letak,
            'Stok' => $request->Stok,
            'Stok_Min' => $request->Stok_Min,      
           
           
        ]);

        return response()->json([
            'status' => (bool) $sparepart,
            'data'   => $sparepart,
            'message' => $sparepart ? 'Sparepart Berhasil Ditambahkan!' : 'Error Menambahkan Sparepart'
        ]);
    }

    public function uploadGambar(Request $request )
    {
        if($request->hasFile('Gambar')){
            $name = time()."_".$request->file('Gambar')->getClientOriginalName();
            $request->file('Gambar')->move(public_path('Gambar'), $name);
        }
        return response()->json(asset("images/$name"),201);
    }

    
    public function show(Sparepart $sparepart)
    {
        return response()->json($sparepart,200);
    }

    
    public function update(Request $request, Sparepart $sparepart)
    {
        $status = $sparepart->update(
            $request->only([
                'Kode_Sparepart' => $request->Kode_Sparepart,
                'Nama' => $request->Nama,
                'Tipe' => $request->Tipe,
                'Merk' => $request->Merk,
                'Gambar' => $request->Gambar,
                'Jenis_Motor' => $request->Jenis_Motor,
                'Harga_Beli' => $request->Harga_Beli,
                'Harga_Jual' => $request->Harga_Jual,
                'Letak' => $request->Letak,
                'Stok' => $request->Stok,
                'Stok_Min' => $request->Stok_Min,                  
        
            ])
        );
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Sparepart Diupdate!' : 'Error Mengupdate Sparepart'
        ]);
    }

    
    public function destroy(Sparepart $sparepart)
    {
        $status = $sparepart->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Pegawai Berhasil di Hapus!' : 'Error Menghapus Pegawai'
        ]);
    }
}

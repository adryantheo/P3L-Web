<?php

namespace App\Http\Controllers;

use App\kustomer;
use Illuminate\Http\Request;

class KustomerController extends Controller
{
    
    public function index()
    {
        return response()->json(kustomer::all(),200);
    }

    
   
    public function store(Request $request)
    {
        $kustomer = kustomer::create([
            'Nama_Kustomer' => $request->Nama_Kustomer,
            'Alamat_Kustomer' => $request->Alamat_Kustomer,
            'Telepon_Kustomer' => $request->Telepon_Kustomer,
            
            
            
        ]);

        return response()->json([
            'status' => (bool) $kustomer,
            'data'   => $kustomer,
            'message' => $kustomer ? 'Kustomer Berhasil Ditambahkan!' : 'Error Menambahkan Kustomer'
        ]);
    }

    
    public function show(kustomer $kustomer)
    {
        return response()->json($kustomer,200);
    }

    
  
    public function update(Request $request, kustomer $kustomer)
    {
        $status = $kustomer->update(
            $request->only([
                'Nama_Kustomer', 
                'Alamat_Kustomer', 
                'Telepon_Kustomer'                
        
            ])
        );
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Kustomer Diupdate!' : 'Error Mengupdate Kustomer'
        ]);
    }

    
    public function destroy(kustomer $kustomer)
    {
        $status = $kustomer->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Kustomer Berhasil di Hapus!' : 'Error Menghapus Kustomer'
        ]);
    }
}

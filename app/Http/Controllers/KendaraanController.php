<?php

namespace App\Http\Controllers;

use App\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    
    public function index()
    {
        return response()->json(Kendaraan::all(),200);
    }


    public function store(Request $request)
    {
        $kendaraan = Kendaraan::create([
            'Plat_kendaraan' => $request->Plat_kendaraan,
            'Merk' => $request->Merk,
            'Tipe' => $request->Tipe,
            'Id_Kustomer' => $request->Id_Kustomer
            
            
        ]);

        return response()->json([
            'status' => (bool) $kendaraan,
            'data'   => $kendaraan,
            'message' => $kendaraan ? 'Kendaraan Berhasil Ditambahkan!' : 'Error Menambahkan Kendaraan'
        ]);
    }

    public function show(Kendaraan $kendaraan)
    {
        return response()->json($kendaraan,200);
    }

    public function update(Request $request, Kendaraan $kendaraan)
    {
        $status = $kendaraan->update(
            $request->only([
                'Plat_kendaraan', 
                'Merk', 
                'Tipe',
                'Id_Kustomer'
        
            ])
        );
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Kendaraan Diupdate!' : 'Error Mengupdate Kendaraan'
        ]);
    }

    public function destroy(Kendaraan $kendaraan)
    {
        $status = $kendaraan->delete();

            return response()->json([
                'status' => $status,
                'message' => $status ? 'Kendaraan Berhasil di Hapus!' : 'Error Menghapus Kendaraan'
            ]);
    }
}

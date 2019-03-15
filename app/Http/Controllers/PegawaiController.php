<?php

namespace App\Http\Controllers;

use App\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    
    public function index()
    {
        return response()->json(Pegawai::all(),200);
    }

    public function store(Request $request)
    {
        $pegawai = Pegawai::create([
            'Nama' => $request->Nama,
            'Email' => $request->Email,
            'Alamat' => $request->Alamat,
            'Gaji' => $request->Gaji,
            'Role' => $request->Role,
            'Password' => $request->Password          
           
           
        ]);

        return response()->json([
            'status' => (bool) $pegawai,
            'data'   => $pegawai,
            'message' => $pegawai ? 'Pegawai Berhasil Ditambahkan!' : 'Error Menambahkan Pegawai'
        ]);
    }

    
    public function show(Pegawai $pegawai)
    {
        return response()->json($pegawai,200);
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $status = $pegawai->update(
            $request->only([
                'Nama' => $request->Nama,
                'Email' => $request->Email,
                'Alamat' => $request->Alamat,
                'Gaji' => $request->Gaji,
                'Role' => $request->Role,
                'Password' => $request->Password                  
        
            ])
        );
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Pegawai Diupdate!' : 'Error Mengupdate Pegawai'
        ]);
    }

    public function destroy(Pegawai $pegawai)
    {
        $status = $pegawai->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Pegawai Berhasil di Hapus!' : 'Error Menghapus Pegawai'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    
    public function index()
    {
        //GET
        $pegawai = Pegawai::all();

        return response()->json($pegawai,200);

    }
   
    
    public function store(Request $request)
    {
        //POST
        $pegawai = new Pegawai;
        $pegawai->nama = $request->nama;
        $pegawai->password = $request->password;
        $pegawai->no_telp = $request->no_telp;
        $pegawai->alamat = $request->alamat;
        

        $success = $pegawai->save();

        if(!$success)
            return response()->json('Gagal Menambahkan', 500);
        else
            return response()->json('Berhasil Menambahkan', 201);
    }

    
    public function show(Pegawai $pegawai)
    {
        //GET       
         $status = response()->json($pegawai, 200);

         if(!$status)
         return response()->json('Data Tidak Ditemukan', 404);
         else             
            return response()->json($pegawai, 200);
    }

    
    
   
    public function update(Request $request, Pegawai $pegawai)
    {
        //PATCH
        $status = $pegawai->update(
            $request->only(['nama', 'alamat', 'gaji', 'password',])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Data Berhasil di Update!' : 'Data Gagal di Update'
        ]);

    }

    
    public function destroy(Pegawai $pegawai)
    {
        //DELETE
        $status = response()->json($pegawai, 200);

         if(!$status)
         return response()->json('Data Tidak Ditemukan', 404);
         else
         {
             $hapus = $pegawai->delete();
             if(!$hapus)
                return response()->json('Data Gagal Dihapus',500);
            else
                return response()->json('Data Berhasil Dihapus',200);
         }

            

    }

        
}

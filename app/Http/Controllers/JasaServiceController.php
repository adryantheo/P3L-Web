<?php

namespace App\Http\Controllers;

use App\JasaService;
use Illuminate\Http\Request;

class JasaServiceController extends Controller
{
    
    public function index()
    {
        return response()->json(JasaService::all(),200);
    }

    public function store(Request $request)
    {
        $jasaService = JasaService::create([
            'Nama_Service' => $request->Plat_kendaraan,
            'Tarif' => $request->Merk,
            
        ]);

        return response()->json([
            'status' => (bool) $jasaService,
            'data'   => $jasaService,
            'message' => $jasaService ? 'Jasa Service Berhasil Ditambahkan!' : 'Error Menambahkan Jasa Service'
        ]);
    }

    public function show(JasaService $jasaService)
    {
        return response()->json($jasaService,200);
    }

    public function update(Request $request, JasaService $jasaService)
    {
        $status = $jasaService->update(
            $request->only([
                'Nama_Service', 
                'Tarif', 
                        
            ])
        );
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Jasa Service Diupdate!' : 'Error Mengupdate Jasa Service'
        ]);
    }

   
    public function destroy(JasaService $jasaService)
    {
        $status = $jasaService->delete();

            return response()->json([
                'status' => $status,
                'message' => $status ? 'Jasa Service Berhasil di Hapus!' : 'Error Menghapus Jasa Service'
            ]);
    }
}

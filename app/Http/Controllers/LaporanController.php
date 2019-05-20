<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Transaksi_Sparepart;
use App\Sparepart;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function getSparepart(Request $request, $year){

        for($i = 1; $i <= 12; $i++){
            $ppq[$i] = DB::table('transaksis')
                    ->join('transaksi__spareparts', 'transaksis.id', '=', 'transaksi__spareparts.transaksi_id')
                    ->join('spareparts', 'transaksi__spareparts.sparepart_id', '=', 'spareparts.id')
                    ->where('is_paid', '>', 0)
                    ->whereYear('transaksis.created_at', '=', $year)  
                    ->whereMonth('transaksis.created_at', '=', $i)
                    ->orderBy('transaksi__spareparts.Jumlah_Dibeli','desc')
                    ->groupBy('transaksi__spareparts.sparepart_id')
                    ->select('Nama',DB::raw('sum(transaksi__spareparts.Jumlah_Dibeli) AS Count'))
                    // ->sum('transaksi__spareparts.Jumlah_Dibeli')
                    ->first();                    
        } 

        return response()->json([
            'pendapatan' => $ppq,
            'message' => $ppq ? 'Transaksi Ditemukan!' : 'Error Tidak ada Transaksi'
        ]);
    }

    public function getJasa(){

    }

    public function getIncomeMonth(Request $request, $year){

        for($i = 1; $i <= 12; $i++){
        $pendapatan[$i] = DB::table('transaksis')
        ->where('is_paid', '>', 0)
        ->whereYear('created_at', '=', $year)  
        ->whereMonth('created_at', '=', $i)
        ->sum('Total_Seluruh');    
        }

        return response()->json([
            'pendapatan' => $pendapatan,
            'message' => $pendapatan ? 'Transaksi Ditemukan!' : 'Error Tidak ada Transaksi'
        ]);
    }

    public function getOutcome(){

    }

    public function getStok(){

    }

}

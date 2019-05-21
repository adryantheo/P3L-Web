<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Transaksi_Sparepart;
use App\Sparepart;
use App\Detail_Pesanan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function getSparepart(Request $request, $year){

        for($i = 1; $i <= 12; $i++){
            $epicSeller[$i] = DB::table('transaksis')
                    ->join('transaksi__spareparts', 'transaksis.id', '=', 'transaksi__spareparts.transaksi_id')
                    ->join('spareparts', 'transaksi__spareparts.sparepart_id', '=', 'spareparts.id')
                    ->where('is_paid', '>', 0)
                    ->whereYear('transaksis.created_at', '=', $year)  
                    ->whereMonth('transaksis.created_at', '=', $i)
                    ->orderBy('transaksi__spareparts.Jumlah_Dibeli','desc')
                    ->groupBy('transaksi__spareparts.sparepart_id')
                    ->select('Nama','Tipe',DB::raw('sum(transaksi__spareparts.Jumlah_Dibeli) AS Jumlah_Penjualan'))
                    // ->sum('transaksi__spareparts.Jumlah_Dibeli')
                    ->first();                    
        } 

        return response()->json([
            'Best_Seller' => $epicSeller,
           
        ]);
    }

    public function getJasa(Request $request, $year){

        for($i = 1; $i <= 12; $i++){
            $epicSeller[$i] = DB::table('transaksis')
                    ->join('transaksi__services', 'transaksis.id', '=', 'transaksi__services.transaksi_id')
                    ->join('services', 'transaksi__services.service_id', '=', 'services.id')
                    ->where('is_paid', '>', 0)
                    ->whereYear('transaksis.created_at', '=', $year)  
                    ->whereMonth('transaksis.created_at', '=', $i)
                    ->orderBy('transaksi__services.Jumlah_Service','desc')
                    // ->groupBy('transaksi__services.service_id')
                    ->select('created_at','Nama_Service',DB::raw('sum(transaksi__services.Jumlah_Service) AS Count'))
                    ->first();                    
        } 

        return response()->json([
            'Best_Seller' => $epicSeller           
        ]);

    }

    public function getIncomeMonth(Request $request, $year){

        for($i = 1; $i <= 12; $i++){
        $pendapatan[$i] = DB::table('transaksis')
        ->where('is_paid', '>', 0)
        ->whereYear('created_at', '=', $year)  
        ->whereMonth('created_at', '=', $i)
        ->select(DB::raw('sum(Total_Service) AS Service'), DB::raw('sum(Total_Pembelian) AS Sparepart'), DB::raw('sum(Total_Seluruh) AS Total'))
        ->first();
        }

        return response()->json([
            'pendapatan' => $pendapatan,
           
        ]);
    }

    public function getOutcome(Request $request, $year){

        for($i = 1; $i <= 12; $i++){
            $outcome[$i] = DB::table('detail__pesanans')
            // ->where('is_paid', '>', 0)
            ->whereYear('created_at', '=', $year)  
            ->whereMonth('created_at', '=', $i)
            ->sum('Total_Harga_Beli');    
            }
    
            return response()->json([
                'outcome' => $outcome,
               
            ]);

    }

    public function getStok(){

    }

}

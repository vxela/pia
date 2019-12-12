<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon as Carbon;
use Response;

class ScreenController extends Controller
{
    public function index() {
        $pia = \App\Models\Tbl_item::where('item_name', 'like', 'PIA %')->get();
        $time = Carbon::now()->format('Y-m-d');
        $count_cst = DB::table('tbl_stocks')
                    ->leftJoin('tbl_items', 'tbl_stocks.item_id', '=', 'tbl_items.id')
                    ->where('stock_date', 'like', $time)
                    ->where('stock_type', '=', 'in')
                    ->where('item_name', 'like', 'PIA %')
                    ->count();
        if ($count_cst == 0 ) {
            $time = Carbon::yesterday()->format('Y-m-d');
        }
        $cst = DB::table('tbl_stocks')
                    ->leftJoin('tbl_items', 'tbl_stocks.item_id', '=', 'tbl_items.id')
                    ->where('stock_date', '=', $time)
                    ->where('stock_type', '=', 'in')
                    ->where('item_name', 'like', 'PIA %')
                    ->get();

        // dd($cst);
        return view('screen.index', ['data_pia' => $pia, 'data_stock' => $cst, 'date' => $time]);
    }
    
    public function GetRtView() {
        return view('screen.index_rt');
    }

    public function realTime() {
        
        $pia = \App\Models\Tbl_item::where('item_name', 'like', 'PIA %')->get();
        $time = Carbon::now()->format('Y-m-d');
        $count_cst = DB::table('tbl_stocks')
                    ->leftJoin('tbl_items', 'tbl_stocks.item_id', '=', 'tbl_items.id')
                    ->where('stock_date', 'like', $time)
                    ->where('stock_type', '=', 'in')
                    ->where('item_name', 'like', 'PIA %')
                    ->count();
        if ($count_cst == 0 ) {
            $time = Carbon::yesterday()->format('Y-m-d');
        }

        $cst = DB::table('tbl_stocks')
                    ->leftJoin('tbl_items', 'tbl_stocks.item_id', '=', 'tbl_items.id')
                    ->where('stock_date', '=', $time)
                    ->where('stock_type', '=', 'in')
                    ->where('item_name', 'like', 'PIA %')
                    ->get();
                    
        // return $cst->toJson();         
        return Response::json($cst);            

    }
}

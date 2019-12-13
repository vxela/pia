<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
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

    public function loadData() {

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
                    ->orderBy('tbl_stocks.created_at', 'DESC')
                    ->get();

        $res = '';

        foreach ($cst as $data) {
            $res .= "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-3'><div class='d-flex border'><div class='bg-light text-dark p-4'><div class='d-flex align-items-center h-100'><i class='fa fa-3x fa-fw fa-cubes'></i></div></div><div class='flex-grow-1 bg-white p-4'><p class='text-uppercase text-secondary mb-0' style='font-weight: bold'>".
                    $data->item_name.    // here item name
                    "</p><h3 class='font-weight-bold mb-0' style='display: inline;'>".
                    $data->item_qty.    //here item dty
                    "</h3><small>".
                    $data->item_unit.   // here item unit
                    "</small></div></div></div>";
        }

        echo $res;

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
                    
        $data = $cst->toJson();

        if(Session::has('data_cst')) {
            if($data != Session::get('data_cst')) {
                Session::put('data_cst', $cst->toJson());
                // return Response::json($cst);
                return 'change';
            }
        } else {
            Session::put('data_cst', $cst->toJson());
        }

    }
}

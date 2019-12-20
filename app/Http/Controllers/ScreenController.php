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
        // $pia = \App\Models\Tbl_item::where('item_name', 'like', 'PIA %')->get();
        // $time = Carbon::now()->format('Y-m-d');
        // $count_cst = DB::table('tbl_stocks')
        //             ->leftJoin('tbl_items', 'tbl_stocks.item_id', '=', 'tbl_items.id')
        //             ->where('stock_date', 'like', $time)
        //             ->where('stock_type', '=', 'in')
        //             ->where('item_name', 'like', 'PIA %')
        //             ->count();
        // if ($count_cst == 0 ) {
        //     $time = Carbon::yesterday()->format('Y-m-d');
        // }
        // $cst = DB::table('tbl_stocks')
        //             ->leftJoin('tbl_items', 'tbl_stocks.item_id', '=', 'tbl_items.id')
        //             ->where('stock_date', '=', $time)
        //             ->where('stock_type', '=', 'in')
        //             ->where('item_name', 'like', 'PIA %')
        //             ->get();

        // // dd($cst);

        $preproduksi = \App\Models\Tbl_preproduction::count();

        if ($preproduksi === 0) {
            echo "if true";
        } else {
            // $data = \App\Models\Tbl_preproduction::groupBy('item_id')
            $data = DB::table('tbl_preproductions')
                            ->selectRaw('tbl_items.item_name, sum(jml_item) as jml, satuan_id, tbl_preproductions.user_id, date, time')
                            ->join('tbl_items', 'tbl_preproductions.item_id', '=', 'tbl_items.id')
                            ->where('date', '2019-12-19')
                            ->groupBy('item_id')
                            ->get();

            return $data->toJson();
                                            

        }
        // return view('screen.index', ['data_pia' => $pia, 'data_stock' => $cst, 'date' => $time]);
    }
    
    public function GetRtView() {
        return view('screen.index_rt');
    }

    public function loadData() {

        //inisiasi waktu hari ini
        $time = Carbon::now()->format('Y-m-d');

        $cst = DB::table('tbl_preproductions')
                    ->selectRaw('tbl_items.item_name, sum(jml_item) as jml, tbl_items.item_unit, satuan_id, tbl_preproductions.user_id, date, time')
                    ->join('tbl_items', 'tbl_preproductions.item_id', '=', 'tbl_items.id')
                    ->where('date', $time)
                    ->groupBy('item_id')
                    ->get();

        $res = '';
        $color = ['primary', 'success', 'danger', 'info', 'secondary', 'warning', 'light', 'dark'];
        foreach ($cst as $data) {
            $clr = $color[rand(0,7)];
            $clt = 'light'; if($clr == 'light') {$clt = 'dark';}
            $res .= "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-3'><div class='d-flex border'><div class='bg-".$clr." text-".$clt." p-4'><div class='d-flex align-items-center h-100'><i class='fa fa-3x fa-fw fa-cubes'></i></div></div><div class='flex-grow-1 bg-white p-4'><p class='text-uppercase text-secondary mb-0' style='font-weight: bold'>".
                    $data->item_name.    // here item name
                    "</p><h3 class='font-weight-bold mb-0' style='display: inline;'>".
                    $data->jml.    //here item dty
                    "</h3><small>".
                    $data->item_unit.   // here item unit
                    "</small></div></div></div>";
        }

        echo $res;

    }

    public function realTime() {
        
        //get time today
        $time = Carbon::now()->format('Y-m-d');

        //count data today
        $data_today = \App\Models\Tbl_preproduction::where('date', $time)->count();

        // echo $data_today;
        if($data_today != 0) {
            
            $cst = DB::table('tbl_preproductions')
                    ->selectRaw('tbl_items.item_name, sum(jml_item) as jml, satuan_id, tbl_preproductions.user_id, date, time')
                    ->join('tbl_items', 'tbl_preproductions.item_id', '=', 'tbl_items.id')
                    ->where('date', $time)
                    ->groupBy('item_id')
                    ->get();

            $data = md5($cst->toJson());

            if(Session::has('data_cst')) {
                if($data != Session::get('data_cst')) {

                    $res = 'changed';
                    Session::put('data_cst', md5($cst->toJson()));
                    // return Response::json($cst);
                    return $res;
                }
            } else {
                Session::put('data_cst', md5($cst->toJson()));
            }
        }


        // $pia = \App\Models\Tbl_item::where('item_name', 'like', 'PIA %')->get();
        // $time = Carbon::now()->format('Y-m-d');
        // $count_cst = DB::table('tbl_stocks')
        //             ->leftJoin('tbl_items', 'tbl_stocks.item_id', '=', 'tbl_items.id')
        //             ->where('stock_date', 'like', $time)
        //             ->where('stock_type', '=', 'in')
        //             ->where('item_name', 'like', 'PIA %')
        //             ->count();
        // if ($count_cst == 0 ) {
        //     $time = Carbon::yesterday()->format('Y-m-d');
        // }

        // $cst = DB::table('tbl_stocks')
        //             ->leftJoin('tbl_items', 'tbl_stocks.item_id', '=', 'tbl_items.id')
        //             ->where('stock_date', '=', $time)
        //             ->where('stock_type', '=', 'in')
        //             ->where('item_name', 'like', 'PIA %')
        //             ->get();
                    
        // $data = md5($cst->toJson());

        // if(Session::has('data_cst')) {
        //     if($data != Session::get('data_cst')) {

        //         $res = 'changed';
        //         Session::put('data_cst', md5($cst->toJson()));
        //         // return Response::json($cst);
        //         return $res;
        //     }
        // } else {
        //     Session::put('data_cst', md5($cst->toJson()));
        // }

    }
}

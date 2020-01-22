<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon as Carbon;

class ProductionController extends Controller
{
    public function index() {

        $date = Carbon::now()->format('Y-m-d');

        $preproduksi =  DB::table('tbl_preproductions')
                        ->selectRaw('tbl_items.id as id, tbl_items.item_name, sum(jml_item) as jml, satuan_id, tbl_preproductions.user_id, date, time')
                        ->join('tbl_items', 'tbl_preproductions.item_id', '=', 'tbl_items.id')
                        ->where('date', $date)
                        ->groupBy('item_id')
                        ->get();
        // dd($preproduksi);
        return view('v_produksi.index', ['data_preproduksi' => $preproduksi, 'date' => $date]);
    }
}

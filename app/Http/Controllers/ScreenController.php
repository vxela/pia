<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon as Carbon;

class ScreenController extends Controller
{
    public function index() {
        $pia = \App\Models\Tbl_item::where('item_name', 'like', 'PIA %')->get();
        $cst = DB::table('tbl_stocks')
                    ->leftJoin('tbl_items', 'tbl_stocks.item_id', '=', 'tbl_items.id')
                    ->where('stock_date', 'like', '2019-12-%')
                    ->where('item_name', 'like', 'PIA %')
                    ->get();

        // dd($cst);
        return view('screen.index', ['data_pia' => $pia, 'data_stock' => $cst]);
    } 
}

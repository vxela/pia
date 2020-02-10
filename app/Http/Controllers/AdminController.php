<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search') && $request->search != "") {
            $cst = DB::table('tbl_stocks')
                    ->leftJoin('tbl_items', 'tbl_stocks.item_id', '=', 'tbl_items.id')
                    ->select(DB::raw('item_id, item_name, sum(case when stock_type = "in" then item_qty else -item_qty end) as qty, item_unit'))
                    ->where('item_name', 'like', '%'.$request->search.'%')
                    ->groupBy('item_id')->paginate(8);
        } else {
            $cst = DB::table('tbl_stocks')
                    ->leftJoin('tbl_items', 'tbl_stocks.item_id', '=', 'tbl_items.id')
                    ->select(DB::raw('item_id, item_name, sum(case when stock_type = "in" then item_qty else -item_qty end) as qty, item_unit'))
                    ->groupBy('item_id')->paginate(8);
        }
        // dd($cst);
        $item = \App\Models\Tbl_item::latest()->offset(5)->limit(10)->get();
        $stock = \App\Models\Tbl_stock::latest()->offset(5)->limit(10)->get();
        return view('v_admin.index', [
                                        'data_item' => $item,
                                        'data_stock' => $stock,
                                        'data_cst' => $cst
                                    ]);
    }
}

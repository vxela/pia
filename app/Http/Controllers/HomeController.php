<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cst = \App\Models\Tbl_stock::selectRaw('item_id, sum(case when stock_type = "in" then item_qty else -item_qty end) as qty')
                ->groupBy('item_id')->get();
        // dd($cst);
        $item = \App\Models\Tbl_item::latest()->offset(5)->limit(10)->get();
        $stock = \App\Models\Tbl_stock::latest()->offset(5)->limit(10)->get();
        return view('app.index', ['data_item' => $item, 'data_stock' => $stock, 'data_cst' => $cst]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function itemStock() {
        $data = DB::select("select 
                                tbl_items.id as id_item,
                                tbl_items.item_name as name_item,
                                SUM(tbl_stocks.item_qty) as qty,
                                tbl_items.item_unit as satuan 
                            from tbl_items,
                                tbl_stocks 
                            where tbl_stocks.item_id = tbl_items.id 
                            GROUP BY tbl_items.item_name 
                            ORDER BY SUM(tbl_stocks.item_qty) ASC");

        dd($data);
        // return view('app.item_stock');
    }
}

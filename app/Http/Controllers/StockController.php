<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Carbon\Carbon as Carbon;
use App;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo 'helloworld';
        // $stock = \App\Models\Tbl_stock::latest()->offset(5)->limit(10)->get();
        $stock = \App\Models\Tbl_stock::latest()->paginate(10);
        return view('app.stock_list', ['data_stock' => $stock]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = \App\Models\Tbl_item::all();
        return view('app.create_stock', ['data_item' => $item]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item_id = \App\Models\Tbl_item::where('item_code', $request->item_cd)->first()->id;

        if(empty($request->stock_desk)) {
            $stock_desk = '-';
        } else {
            $stock_desk = $request->stock_desk;
        }
        
        $data_stock = array(
            'item_id' => $item_id,
            'stock_type' => $request->stock_type,
            'item_cd' => $request->item_cd,
            'item_qty' => $request->item_qty,
            'user_id' => auth()->user()->id,
            'stock_desk' => $stock_desk,
            'stock_date' => Carbon::now()->format('Y-m-d')
        );

        $in_stock = \App\Models\Tbl_stock::create($data_stock);

        
        if ($in_stock->exists) {
            $item = \App\Models\Tbl_item::where('id', $in_stock->item_id)->first();
            Session::flash('alert', ['status' => 'success', 'msg' => 'Tambah '.$in_stock->item_qty.' '.$item->item_unit.' Stock '.$item->item_name.' berhasil!']);

            return redirect('dashboard');
         } else {
            App::abort(500, 'Error');
         }

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
}

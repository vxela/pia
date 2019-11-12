<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.create_item');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(\App\Models\Tbl_item::count() == 0) {
            $lastid = 1;
        } else {
            $lastid = \App\Models\Tbl_item::latest()->first()->id + 1;
        }
        $item_cd = str_pad($lastid, 5, "0", STR_PAD_LEFT);

        $data_item = array(
            'item_code' => $item_cd,
            'item_name' => $request->item_name,
            'item_unit' => $request->item_unit,
            'item_price' => 0,
            'user_id' => auth()->user()->id
        );

        $in_item = \App\Models\Tbl_item::create($data_item);

        if ($in_item->exists) {
            Session::flash('alert', ['status' => 'success', 'msg' => 'Tambah Data '.$in_item->item_name.' berhasil!']);

            return back();
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
        $item = \App\Models\Tbl_item::find($id)->first();

        return view('app.item_show', ['item' => $item]);

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

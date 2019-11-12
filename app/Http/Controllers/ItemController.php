<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon as Carbon;
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

        $item = \App\Models\Tbl_item::find($id)->first();
        return view('app.item_edit', ['item' => $item]);

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
        $item = \App\Models\Tbl_item::find($id);

        $item->item_name = $request->item_name;
        $item->item_unit = $request->item_unit;
        $item->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        $save = $item->save();

        if(!$save) {
            App::abort(500, 'Error');
        } else {
            Session::flash('alert', ['status' => 'success', 'msg' => 'Update Data '.$item->item_name.' berhasil!']);

            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = \App\Models\Tbl_item::find($id);
        $delete = $item->forceDelete();

        if(!$delete) {
            App::abort(500, 'Error');
        } else {
            Session::flash('alert', ['status' => 'success', 'msg' => 'Delete data '.$item->item_name.' berhasil!']);

            return back();
        }

    }
}

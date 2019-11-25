<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Carbon\Carbon as Carbon;

class ProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = \App\Models\Tbl_item::where('gudang_id', 4)->get();
        $unit = \App\Models\Tbl_unit::all();
        return view('produksi.index', ['data_produk' => $produk, 'data_unit' => $unit]);
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
        $data = array(
            'item_id' => $request->produk_id,
            'jml_item' => $request->jml_produk,
            'satuan_id' => 3,
            'user_id' => 1,
            'date' => Carbon::now()->format('Y-m-d'),
            'time' => Carbon::now()->format('H:i:s')  
        );

        $produksi = \App\Models\Tbl_production::create($data);
        if ($produksi->exists) {
            Session::flash('alert', ['status' => 'success', 'msg' => 'Tambah data berhasil!']);
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

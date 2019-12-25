<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon as Carbon;

class PreproduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $produk = \App\Models\Tbl_item::where('gudang_id', 4)->get();
    //     $unit = \App\Models\Tbl_unit::all();
    //     // dd($produk);
    //     return view('preproduksi.index', ['data_produk' => $produk, 'data_unit' => $unit]);
    // }
    public function index(Request $r) {
        if ($r->has('date')) {
            $date = $r->date;
        } else {
            $date = Carbon::now()->format('Y-m-d');
        }

        $preproduksi =  DB::table('tbl_preproductions')
                        ->selectRaw('tbl_items.id as id, tbl_items.item_name, sum(jml_item) as jml, satuan_id, tbl_preproductions.user_id, date, time')
                        ->join('tbl_items', 'tbl_preproductions.item_id', '=', 'tbl_items.id')
                        ->where('date', $date)
                        ->groupBy('item_id')
                        ->get();
        // dd($preproduksi);
        return view('preproduksi.list_table', ['data_preproduksi' => $preproduksi]);
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
        $qty = $request->jml_produk;
        if($request->unit_id == 2) {
            $qty = $qty * 77;
        }
        $data = array(
            'item_id' => $request->produk_id,
            'jml_item' => $qty,
            'satuan_id' => 1,
            'user_id' => auth()->user()->id,
            'date' => Carbon::now()->format('Y-m-d'),
            'time' => Carbon::now()->format('H:i:s')            
        );
        
        $preproduksi = \App\Models\Tbl_preproduction::create($data);

        if ($preproduksi->exists) {

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

    public function simpleView() {
        $pia = \App\Models\Tbl_item::where('item_name', 'like', 'PIA %')->get();
        $unit = \App\Models\Tbl_unit::all();
        return view('preproduksi.simple_index', ['data_pia' => $pia, 'data_unit' => $unit]);
    }

    public function SimpleStore(Request $r) {
        dd($r->all());
    }

    public function showByItem($id) {
        $date = Carbon::now()->format('Y-m-d');
        $preproduksi = \App\Models\Tbl_preproduction::where('item_id', $id)
                                                        ->where('date', $date)
                                                        ->get();

        return view('preproduksi.detail_by_item', ['data_preproduksi' => $preproduksi]);
    }
}

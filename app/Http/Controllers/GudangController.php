<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $gudang = \App\Models\Tbl_warehouse::all();
        return view('app.gudang_list', ['data_gudang' => $gudang]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.gudang_create');
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
            'name' => strtoupper($request->gdg_name),
            'lokasi' => $request->gdg_lokasi,
            'user_id' => auth()->user()->id
        );

        $gudang = \App\Models\Tbl_warehouse::create($data);

        if ($gudang->exists) {
            Session::flash('alert', ['status' => 'success', 'msg' => 'Tambah  gudang '.$gudang->name.' berhasil!']);

            return redirect()->route('gudang.index');
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

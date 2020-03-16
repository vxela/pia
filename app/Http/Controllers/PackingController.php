<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon as Carbon;
use Session;

class PackingController extends Controller
{
    public function index() {
        $pia = \App\Models\Tbl_item::where('item_name', 'like', 'PIA %')->get();

        return view('packing.index', ['data_pia' => $pia]);
    }

    public function store(Request $r) {
        
        $data_packing = [
            'item_id'    => $r->id_pia,
            'jml_item'   => $r->jml_produk,
            'satuan_id'  => 1,
            'user_id'    => 2,
            'date'       => Carbon::now()->format('Y-m-d'),
            'time'       => Carbon::now()->format('H:i:s')
        ];
        
        $packing = \App\Models\Tbl_production::create($data_packing);

        $name = \App\Models\Tbl_item::find($packing->item_id)->item_name;

        Session::flash('alert', ['status' => 'success', 'msg' => 'Tambah '.$packing->jml_item.' '.$name.' berhasil!']);


        return redirect()->back();

    }

    public function store_campur(Request $r) {

        if(count($r->id_pia) == count($r->jml_produk)) {
            for($i = 0;  $i< count($r->id_pia); $i++) {
                if($r->jml_produk[$i] > 0) {
                    $data = [
                        'item_id'    => $r->id_pia[$i], 
                        'jml_item'   => $r->jml_produk[$i],
                        'satuan_id'  => 1,
                        'user_id'    => 2,
                        'date'       => Carbon::now()->format('Y-m-d'),
                        'time'       => Carbon::now()->format('H:i:s')
                    ];

                    $packing = \App\Models\Tbl_production::create($data);

                }
            }
        }

        Session::flash('alert', ['status' => 'success', 'msg' => 'Tambah data berhasil!']);
            
        return redirect()->back();
    }

    public function listdata() {
        $data = \App\Models\Tbl_production::where('date', Carbon::now()->format('Y-m-d'))
                                            ->orderBy('created_at', 'desc')                                            
                                            ->get();

        // dd($data);
        return view('packing.data_table', ['data_pia' => $data]);
    }
}

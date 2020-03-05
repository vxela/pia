<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon as Carbon;
use Mush;
use Response;

class OvenController extends Controller
{
    public function index() {
        $date = Carbon::now()->format('Y-m-d');
        $tunggu = \App\Models\Tbl_preproduction::where('date', $date)
                                                ->where('status_oven', 'tunggu')
                                                ->count();

        $panggang = \App\Models\Tbl_preproduction::where('date', $date)
                                                ->where('status_oven', 'masuk')
                                                ->count(); 

        $selesai = \App\Models\Tbl_preproduction::where('date', $date)
                                                ->where('status_oven', 'keluar')
                                                ->count();                                                                                                

        return view('oven.index', ['tg' => $tunggu, 'pg' => $panggang, 'out' => $selesai]);
    }

    public function LoadDataTunggu() {
        $date = Carbon::now()->format('Y-m-d');
        $tunggus = \App\Models\Tbl_preproduction::where('date', $date)
                                                ->where('status_oven', 'tunggu')
                                                ->get();

                                                
                                                $n=0;
                                                $data = array();
                                                
                                                foreach ($tunggus as $tunggu) {
                                                    $data[$n++] = [
                                                        "id" => $tunggu->id,
                                                        "item_jml" => Mush::getJmlSat($tunggu->jml_item),
                                                        "item_name" => $tunggu->getItem()->item_name
                                                    ];
                                                }

        return response::json($data);
    }

    public function LoadDataIn() {
        $date = Carbon::now()->format('Y-m-d');
        $tunggus = \App\Models\Tbl_preproduction::where('date', $date)
                                                ->where('status_oven', 'masuk')
                                                ->get();

                                                $n=0;
                                                $data = array();
                                                
                                                foreach ($tunggus as $tunggu) {
                                                    $data[$n++] = [
                                                        "id" => $tunggu->id,
                                                        "item_jml" => Mush::getJmlSat($tunggu->jml_item),
                                                        "item_name" => $tunggu->getItem()->item_name
                                                    ];
                                                }

        return response::json($data);
    }

    public function LoadDataOut() {
        $date = Carbon::now()->format('Y-m-d');
        $tunggus = \App\Models\Tbl_preproduction::where('date', $date)
                                                ->where('status_oven', 'keluar')
                                                ->get();

                                                $n=0;
                                                $data = array();
                                                
                                                foreach ($tunggus as $tunggu) {
                                                    $data[$n++] = [
                                                        "id" => $tunggu->id,
                                                        "item_jml" => Mush::getJmlSat($tunggu->jml_item),
                                                        "item_name" => $tunggu->getItem()->item_name
                                                    ];
                                                }

        return response::json($data);
    }

    public function LoadDataTungguToJson() {
        $date = Carbon::now()->format('Y-m-d');
        $data_tunggu = \App\Models\Tbl_preproduction::where('date', $date)
                                                ->where('status_oven', 'tunggu')
                                                ->paginate(10);

        return Response::json($data_tunggu);
    }

    public function MoveToOven(Request $r) {
        // dd($r->all());
        $prep = \App\Models\Tbl_preproduction::find($r->prep_id);

        $prep->status_oven = 'masuk';

        $prep->save();

        return redirect()->back();
    }

    public function MoveFromOven(Request $r) {
        // dd($r->all());
        $prep = \App\Models\Tbl_preproduction::find($r->prep_id);

        $prep->status_oven = 'keluar';

        $prep->save();

        return redirect()->back();
    }
}

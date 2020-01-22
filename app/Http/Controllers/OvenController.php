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
                                                ->paginate(10);

                                                $res = "<table class='table table-striped'>";
                                                foreach ($tunggus as $tunggu) {
                                                    $res .= "<tr>";
                                                    $jml = Mush::getJmlSat($tunggu->jml_item);
                                                    $res .= "<td><input type='checkbox' id=''></td>";
                                                    $res .= "<td class='col-9'><strong>".$tunggu->getItem()->item_name."</strong><hr class='my-0'><strong>".$jml."</strong></td>";
                                                    $res .= "<td class='col-2'>
                                                    <form action='".route('oven.move_to_oven')."' method='post'>
                                                        <button type='submit' class='btn btn-primary'>
                                                            <i class='fa fa-sign-in'></i>
                                                        </button>
                                                        <input type='hidden' name='prep_id' value='".$tunggu->id."'>
                                                        <input type='hidden' name='_token' value='".csrf_token()."'>
                                                    </form>
                                                    </td>";
                                                    $res .= "</tr>";
                                                }
                                        
                                                $res .= "</table>";
                                        
                                                echo $res;

        // return response::json($tunggus);
    }

    public function LoadDataIn() {
        $date = Carbon::now()->format('Y-m-d');
        $tunggus = \App\Models\Tbl_preproduction::where('date', $date)
                                                ->where('status_oven', 'masuk')
                                                ->paginate(10);

        $res = "<table class='table table-striped'>";
        foreach ($tunggus as $tunggu) {
            $res .= "<tr>";
            $jml = Mush::getJmlSat($tunggu->jml_item);
            $res .= "<td class='col-10'><strong>".$tunggu->getItem()->item_name."</strong><hr class='my-0'><strong>".$jml."</strong></td>";
            $res .= "<td class='col-2'>
            <form action='".route('oven.move_from_oven')."' method='post'>
                <button type='submit' class='btn btn-primary'>
                    <i class='fa fa-sign-in'></i>
                </button>
                <input type='hidden' name='prep_id' value='".$tunggu->id."'>
                <input type='hidden' name='_token' value='".csrf_token()."'>
            </form>
            </td>";
            $res .= "</tr>";
        }

        $res .= "</table>";

        echo $res;
    }

    public function LoadDataOut() {
        $date = Carbon::now()->format('Y-m-d');
        $tunggus = \App\Models\Tbl_preproduction::where('date', $date)
                                                ->where('status_oven', 'keluar')
                                                ->paginate(10);

        $res = "<table class='table table-striped'>";
        foreach ($tunggus as $tunggu) {
            $res .= "<tr>";
            $jml = Mush::getJmlSat($tunggu->jml_item);
            $res .= "<td class='col-12'><strong>".$tunggu->getItem()->item_name."</strong><hr class='my-0'><strong>".$jml."</strong></td>";
            $res .= "</tr>";
        }

        $res .= "</table>";

        echo $res;
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon as Carbon;
use Mush;

class OvenController extends Controller
{
    public function index() {
        $date = Carbon::now()->format('Y-m-d');
        $tunggu = \App\Models\Tbl_preproduction::where('date', $date)
                                                ->where('status_oven', 'tunggu')
                                                ->count();

        $panggang = \App\Models\Tbl_preproduction::where('date', $date)
                                                ->where('status_oven', 'oven')
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

        $res = "<table class='table table-striped'>";
        foreach ($tunggus as $tunggu) {
            $res .= "<tr>";
            $jml = Mush::getJmlSat($tunggu->jml_item);
            $res .= "<td class='col-10'><strong>".$tunggu->getItem()->item_name."</strong><hr class='my-0'><strong>".$jml."</strong></td>";
            $res .= "<td class='col-2'>
                            <a href='#' class='btn btn-primary'>
                                <i class='fa fa-sign-in'></i>
                            </a>
            </td>";
            $res .= "</tr>";
        }

        $res .= "</table>";

        echo $res;
    }
}

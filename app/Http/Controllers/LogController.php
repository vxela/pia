<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index() {

        $logs = \App\Models\Tbl_log::all();

        return view('v_admin.system_log_list', ['data_log' => $logs]);
        
    }
}

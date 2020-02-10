<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // 

        $users = \App\User::all();

        return view('v_admin.list_user', ['users' => $users]);
    }

    public function addUser() {
        
        $emp = \App\Models\Tbl_employee::all();
        return view('v_admin.add_user', ['data_emp' => $emp]);

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
        //
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

    public function getLastEmployeeId(){
        $n_emp = \App\Models\Tbl_employee::count();
        if($n_emp > 0) {
            $lst_emp = \App\Models\Tbl_employee::latest()->first();
            $emp_id = str_pad($lst_emp->id, 4, "0", STR_PAD_LEFT);

            return $emp_id;
        } else {
            return '0001';

        }
    }

    public function StoreEmployee(Request $r) {
        $lemp_id = $this->getLastEmployeeId();

        $data_emp = [
            'name'  => $r->emp_name,
            'code'  => $r->emp_code.$lemp_id,
            'nik'   => $r->nik,
            'address'   => $r->emp_address,
            'phone' => $r->no_hp,
            'date_in'   => $r->date_in,
            'user_id'   => auth()->user()->id,
            'job_id'    => 1
        ];
        
        $store = \App\Models\Tbl_employee::create($data_emp);

        if(!$store) {
            Session::flash('alert', ['status' => 'danger', 'msg' => ''.$store->name.' '.$store->nik.' Gagal di tambahkan dalam data pegawai']);
            return redirect()->back();
        } else {
            Session::flash('alert', ['status' => 'success', 'msg' => ''.$store->name.' '.$store->nik.' Berhasil di tambahkan dalam data pegawai']);
            return redirect()->back();
        }
    }
}

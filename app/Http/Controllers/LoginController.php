<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function auth(Request $request) {

        if($request->name == null) {
            Session::flash('alert', ['type' => 'danger', 'msg' => 'username kosong!!']);
            return back();
        } elseif ($request->password == null) {
            Session::flash('alert', ['type' => 'danger', 'msg' => 'password kosong!!']);
            return back();
        } else {
            if(Auth::attempt($request->only('name', 'password'))) {
                $user = \App\User::find(auth()->user()->id);
                return redirect()->route($user->role->route);
            }
            else {
                Session::flash('alert', ['type' => 'danger', 'msg' => 'username atau password salah!!']);
                return redirect()->route('login');
            }
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

}

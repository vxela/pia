<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mush;
use Session;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function auth(Request $request) {

        if($request->name == null) {
            Mush::LogLoginFail($model = 'User', $data = 'username null');
            Session::flash('alert', ['type' => 'danger', 'msg' => 'username kosong!!']);
            return back();
        } elseif ($request->password == null) {
            Mush::LogLoginFail($model = 'User', $data = 'password null');
            Session::flash('alert', ['type' => 'danger', 'msg' => 'password kosong!!']);
            return back();
        } else {
            if(Auth::attempt($request->only('name', 'password'))) {
                $user = \App\User::find(auth()->user()->id);
                Mush::LogLoginSuccess($model = 'User', $data = 'login : '.auth()->user()->name, $user_id = auth()->user()->id);
                return redirect()->route($user->role->route);
            }
            else {
                Mush::LogLoginFail($model = 'User', $data = 'login : '.$request->name, $desc = 'username atau password salah!');
                Session::flash('alert', ['type' => 'danger', 'msg' => 'username atau password salah!!']);
                return redirect()->route('login');
            }
        }
    }

    public function logout() {
        Mush::LogLogout($model = 'User', $data = 'logout : '.auth()->user()->name);
        Auth::logout();
        return redirect()->route('login');
    }

}

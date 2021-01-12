<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(){

        return view('Back.auth.login');
    }
    public function loginpost(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('admin.login')->withErrors('Email və ya şifrə yanlışdır');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}

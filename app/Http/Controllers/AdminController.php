<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function home(){
        return view('admin.home');
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function lockscreen(){
        return view('admin.lockscreen');
    }
    public function signup(){
        return view('admin.signup');
    }
    public function create_account(Request $request){
        $this->validate($request, ['email' => 'email|required|unique:admins',
                                    'motdepasse'  => 'requored|min:6' ]);

    }
}

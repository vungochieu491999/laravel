<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function getLogin(Request $request){
        return view('Admin::pages.auth.login');
    }

    public function postLogin(Request $request){
        return view('Admin::pages.auth.login');
    }

    public function getRegister(Request $request){
        return view('Admin::pages.auth.login');
    }

    public function postRegister(Request $request){
        return view('Admin::pages.auth.login');
    }

}

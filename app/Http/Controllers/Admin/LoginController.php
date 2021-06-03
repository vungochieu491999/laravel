<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function getIndex(Request $request){
        return view('Admin::pages.auth.login');
    }

}

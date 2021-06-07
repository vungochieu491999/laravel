<?php


namespace App\Http\Controllers\Theme;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function getLogin(Request $request)
    {
        return view('Theme::pages.auth.login');
    }

    public function postLogin(Request $request)
    {

    }

}

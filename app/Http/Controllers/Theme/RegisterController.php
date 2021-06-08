<?php


namespace App\Http\Controllers\Theme;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function getRegister(Request $request)
    {
        return view('Theme::pages.auth.register');
    }

    public function postRegister(Request $request)
    {

    }
}

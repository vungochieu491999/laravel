<?php


namespace App\Http\Controllers\Theme;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function getIndex(Request $request)
    {
        return view('Theme::pages.posts.show');
    }

}

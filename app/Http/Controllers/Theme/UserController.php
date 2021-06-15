<?php


namespace App\Http\Controllers\Theme;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Supports\PageTitle;

class UserController extends Controller
{

    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @param $username
     * @return \Illuminate\Http\Response
     */
    public function getProfile($username)
    {
        page_title()->setTitle(config('general.theme.home_name'));
        $posts = Post::all();
        $prefix = config('general.theme.prefix_home');
        return view('Theme::pages.index', compact('posts','prefix'));
    }
}

<?php


namespace App\Http\Controllers\Theme;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Supports\PageTitle;

class HomeController extends Controller
{

    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @param PageTitle $pageTitle
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        page_title()->setTitle(config('general.theme.home_name'));
        $posts = Post::all();
        $prefix = config('general.theme.prefix_home');
        return view('Theme::pages.index', compact('posts','prefix'));
    }

    public function about()
    {
        page_title()->setTitle(config('general.theme.about'));

        $posts = Post::all();
        $prefix = config('general.theme.prefix_home');
        return view('Theme::pages.index', compact('posts','prefix'));
    }

    public function contact()
    {
        page_title()->setTitle(config('general.theme.about'));
        
        $posts = Post::all();
        $prefix = config('general.theme.prefix_home');
        return view('Theme::pages.index', compact('posts','prefix'));
    }

    public function store()
    {
        page_title()->setTitle(config('general.theme.about'));

        $posts = Post::all();
        $prefix = config('general.theme.prefix_home');
        return view('Theme::pages.index', compact('posts','prefix'));
    }
}

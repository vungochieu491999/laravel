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
        page_title()->setTitle(config('general.theme.home_name'));
        return view('Theme::pages.about');
    }

    public function contact()
    {
        page_title()->setTitle(config('general.theme.home_name'));
        return view('Theme::pages.contact');
    }

    public function store()
    {
        page_title()->setTitle(config('general.theme.home_name'));
        return view('Theme::pages.store');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postsShow($id)
    {
        page_title()->setTitle(config('general.theme.home_name'));
        return view('Theme::pages.posts.show', compact('post'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoriesShow($id)
    {
        page_title()->setTitle(config('general.theme.home_name'));
        return view('Theme::pages.categories.show', compact('category'));
    }
}

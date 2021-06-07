<?php


namespace App\Http\Controllers\Theme;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $posts = Post::all();
        return view('Theme::pages.index', compact('posts'));
    }

    public function about()
    {
        return view('Theme::pages.about');
    }

    public function contact()
    {
        return view('Theme::pages.contact');
    }

    public function store()
    {
        return view('Theme::pages.store');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postsShow($id)
    {
        $post = Post::find($id);
        return view('Theme::pages.posts.show', compact('post'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoriesShow($id)
    {
        $category = Category::find($id);
        return view('Theme::pages.categories.show', compact('category'));
    }
}

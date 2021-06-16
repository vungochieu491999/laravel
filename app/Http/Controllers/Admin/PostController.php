<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function __construct()
    {

    }

    public function getIndex()
    {
        page_title()->setTitle(trans('theme_general.post'));

        $prefix = config('general.theme.post');

        $posts = Post::orderBy('created_at')->get();

        return view('Admin::pages.posts.index', compact('posts','prefix'));
    }

    public function postAddMethodPost(Request $request)
    {
        return view('Admin::pages.posts.index', compact('posts','prefix'));
    }

    public function postAddMethodGet(Request $request)
    {
        $request->all();
        $post = Post::insert(['category_id' => 1, 'user_id' => 1, 'title']);

        return view('Admin::pages.posts.index', compact('posts','prefix'));
    }

}

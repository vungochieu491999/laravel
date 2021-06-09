<?php


namespace App\Http\Controllers\Theme;


use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function getIndex(Request $request)
    {
        return view('Theme::pages.posts.show');
    }

    public function postShow(Request $request, string $slug)
    {
        $post = Post::where('slug', $slug)->first();
        $prefix = config('general.theme.prefix_community');
        return view('Theme::pages.posts.show',compact('post','prefix'));
    }

}

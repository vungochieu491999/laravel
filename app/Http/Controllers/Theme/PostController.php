<?php


namespace App\Http\Controllers\Theme;


use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function getIndex(Request $request)
    {
        return view('Theme::pages.posts.show');
    }

    public function create(Request $request)
    {
        $title = $request->title;
        
        $slug  = Str::slug($title);

        $countExistPost = Post::where('slug', $slug)->get()->count();
        
        if($countExistPost != 0) $slug .= '-'. ($countExistPost+1);


        $prefix = config('general.theme.prefix_community');
        return view('Theme::pages.posts.show',compact('post','prefix'));
    }

    public function store(Request $request)
    {
        $prefix = config('general.theme.prefix_community');
        return view('Theme::pages.posts.show',compact('post','prefix'));
    }

    public function postShow(Request $request, string $slug)
    {
        $post = Post::where('slug', $slug)->first();
        $prefix = config('general.theme.prefix_community');
        return view('Theme::pages.posts.show',compact('post','prefix'));
    }

}

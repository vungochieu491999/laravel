<?php


namespace App\Http\Controllers\Theme;


use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class CommunityController extends Controller
{

    public function getIndex(Request $request)
    {
        $posts = Post::inRandomOrder()->limit(5)->get();
        $prefix = config('general.theme.prefix_community');
        return view('Theme::pages.community.index', compact('posts','prefix'));
    }

}

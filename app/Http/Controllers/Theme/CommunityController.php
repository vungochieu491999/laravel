<?php


namespace App\Http\Controllers\Theme;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CommunityController extends Controller
{

    public function getIndex(Request $request)
    {
        page_title()->setTitle(trans('theme_general.community'));

        $posts = Post::orderBy('created_at')->limit(200)->get();
        $categories = Category::get();

        $years = Post::get()
            ->groupBy(function($val) {
                return Carbon::parse($val->created_at)->format('Y');
            });

        $prefix = config('general.theme.prefix_community');
        return view('Theme::pages.community.index', compact('posts','prefix','categories', 'years'));
    }

    public function getTopicYear(Request $request, $year)
    {
        page_title()->setTitle(trans('theme_general.community'));

        $posts = Post::whereYear('created_at',$year)->orderBy('created_at')->limit(200)->get();
        $categories = Category::get();

        $prefix = config('general.theme.prefix_community');
        return view('Theme::pages.community.index', compact('posts','prefix','categories'));
    }

}

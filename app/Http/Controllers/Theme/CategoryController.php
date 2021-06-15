<?php


namespace App\Http\Controllers\Theme;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function categoryShow(Request $request, string $slug)
    {
        page_title()->setTitle(trans('theme_general.category'));

        $post = Category::where('slug', $slug)->first();
        $prefix = config('general.theme.prefix_category');
        return view('Theme::pages.posts.show',compact('post','prefix'));
    }

}

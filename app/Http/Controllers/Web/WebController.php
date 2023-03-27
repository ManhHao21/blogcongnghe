<?php

namespace App\Http\Controllers\Web;
use App\Models\Categories;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use DB;
class WebController extends Controller
{
    public function index(){
         $categories = Categories::whereNULL('parent_id')->get();
         $category = Categories::all();
        $hightlight = Post::where('highlight_post', 1)->take(5)->get();
        $new = Post::where('new_post', 1) ->take(10)->get();
        // dd($categories);
        return view('index', compact('hightlight', 'new', 'categories'));
    }

    public function category($id){
    }

    public function post($id){
        $post = post::where('id', $id)->first();
        return view('blocks.fontend.post', compact('post'));
    }
    
}

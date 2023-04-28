<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class homeController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('layouts.backend', compact('user'));
    }

    public function charAt(){
        $postsCountByCategory = Post::join('categories', 'posts.categories_id', '=', 'categories.id')
                            ->selectRaw('categories.name, count(posts.id) as count')
                            ->groupBy('categories.id', 'categories.name')
                            ->get();

        return view('blocks.backend.content', compact('postsCountByCategory'));
    }
}

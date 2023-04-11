<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        $comments = Comment::all();
        // $count = $item->comments->where('post_id', $item->post_id)->count();
        return view('blocks.backend.comments.index', compact('comments'));
    }

    public function create(){

    }

    public function store(){

    }

    public function edit(){

    }

    public function update(){

    }

    public function delete($id){
        $comments = Comment::find($id);
        return view('blocks.backend.comments.delete',compact('comments') );
    }
    public function deletecomment($id){
        Comment::where('id', $id)->delete();
        return redirect()->route('admin.comment.index')->with('msg', 'Xóa danh mục thành công');
    }
}

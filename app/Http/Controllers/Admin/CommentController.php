<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    public function index(){
        if (Auth::user()->is_admin == 0 ){
            // return view('errors.404');
            return redirect()->route('admin.post.index');
        }
        $comments = Comment::paginate(3);
        // $count = $item->comments->where('post_id', $item->post_id)->count();
        return view('blocks.backend.comments.index', compact('comments'));
    }

    public function delete($id){
        if (Auth::user()->is_admin == 0 ){
            // return view('errors.404');
            return redirect()->route('admin.post.index');
        }
        $comments = Comment::find($id);
        return view('blocks.backend.comments.delete',compact('comments') );
    }
    public function deletecomment($id){
        if (Auth::user()->is_admin == 0 ){
            // return view('errors.404');
            return redirect()->route('admin.post.index');
        }
        Comment::where('id', $id)->delete();
        return redirect()->route('admin.comment.index')->with('msg', 'Xóa danh mục thành công');
    }

    public function show($id){
        if (Auth::user()->is_admin == 0 ){
            return redirect()->route('admin.post.index');
        }
        $comment = Comment::where('id', $id)->get();
        return view('blocks.backend.comments.show', compact('comment'));
    }


    public function postShow($id) {
        if (Auth::user()->is_admin == 0 ){
            return redirect()->route('admin.post.index');
        }
        $comment = Comment::findOrFail($id);
        $comment->is_comment = 1;
        $comment->save();
        
        return redirect()->back()->with('msg', 'Duyệt liên hệ thành công');
    }
}

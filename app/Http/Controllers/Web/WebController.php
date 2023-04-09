<?php

namespace App\Http\Controllers\Web;
use App\Models\Categories;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Post;
use Illuminate\Http\Request;
use DB;
class WebController extends Controller
{
    public function index(){
         $categories = Categories::whereNULL('parent_id')->get();
         $category = Post::orderBy('created_at', 'desc')->paginate(5);
         $categori =  Categories::all();
        $banner = Post::where('slide_post', 1)->orderBy('created_at', 'desc')->take(4)->get();
        $hightlight = Post::where('highlight_post', 1)->take(1)->get();
        $hightlightNew = Post::where('highlight_post', 1)->take(3)->get();
        $newhightlight = Post::where('highlight_post', 1)->orWhere('new_post', 1)->orderBy('created_at', 'desc')->take(3)->get();
        $new = Post::where('new_post', 1) ->take(10)->get();
        $newPost = Post::where('new_post', 1) ->take(3)->get();
        
        // dd($categories);
        return view('index', compact('banner', 'new', 'categories', 'category', 'categori', 'newhightlight', 'hightlight', 'newPost'));
    }

    public function category($slug){
        $categories = Categories::whereNULL('parent_id')->get();
        $category = Categories::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->latest()->paginate(5);
        $categori =  Categories::all();
        $hightlight = Post::where('highlight_post', 1)->take(5)->get();
        $new = Post::where('new_post', 1)->orderBy('created_at', 'desc')->take(10)->get();
        return view('blocks.fontend.category', compact('categories', 'category', 'posts', 'categori', 'new', 'hightlight'));
    }
    

    public function post($slug){
        $categories = Categories::whereNULL('parent_id')->get();
        $post = Post::where('slug', $slug)->first();
        $post->update([
            'view_counts'=> $post->view_counts+ 1
        ]);
        return view('blocks.fontend.post', compact('post', 'categories'));
    }
    
    public function comment(Request $request, $id){
        $post = Post::find($id);
        $comment = new Comment;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->content = $request->content;
        $comment->post_id = $id;
        $comment->save();
        return redirect()->back();
    }

    public function contact(){
        $categories = Categories::whereNULL('parent_id')->get();
        return view('blocks.fontend.contact', compact('categories'));
    }

    public function sendContact(Request $request) {
        // dd($request->all());
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        
        return redirect()->back()->with('msg', 'Gửi liên hệ thành công');
    }
    
}

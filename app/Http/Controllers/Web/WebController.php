<?php

namespace App\Http\Controllers\Web;
use App\Models\Categories;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use SimplePie\SimplePie;

class WebController extends Controller
{
    public function index(){
        $rss = file_get_contents('https://tuoitre.vn/rss/cong-nghe.rss');
        $xml = simplexml_load_string($rss);
        // dd($xml);
        // dd($xml->channel->item[1]);
        $new = Post::where('new_post', 1) ->take(6)->get();
        $new1 = [];
        $new2 = [];
        $new3 = [];
        
        $rss1 = file_get_contents('https://vnexpress.net/rss/giai-tri.rss');
        $xml1 = simplexml_load_string($rss1);
        // Lặp qua dữ liệu và đưa từng bài viết vào mảng tương ứng
        foreach ($new as $index => $post) {
            if ($index % 3 == 0) {
                $new1[] = $post;
            } else if ($index % 3 == 1) {
                $new2[] = $post;
            } else {
                $new3[] = $post;
            }
        }
        $hightlight = Post::where('highlight_post', 1)->orderBy('created_at', 'desc')->take(3)->get();
        // $hightlightTop = Post::where('highlight_post', 1)->orderBy('created_at', 'asc')->take(5)->get();
        $hightlight1 = [];
        $hightlight2 = [];
        $hightlight3 = [];
        foreach ($hightlight as $index => $post) {
            if ($index % 3 == 0) {
                $hightlight1[] = $post;
            } else if ($index % 3 == 1) {
                $hightlight2[] = $post;
            } else {
                $hightlight3[] = $post;
            }
        }
        $post = Post::orderBy('created_at', 'desc')->paginate(5);
        // dd($uniqueData);
        $categories = Categories::whereNULL('parent_id')->get();
        $categoryNew = Post::orderBy('created_at', 'desc')->where('highlight_post', 1)->take(3)->get();
        $categoryPost = Post::orderBy('created_at', 'desc')->where('new_post', 1)->take(3)->get();
        $categori =  Categories::all();
        $banner = Post::where('slide_post', 1)->orderBy('created_at', 'desc')->take(4)->get();
        $newPost = Post::where('new_post', 1) ->take(3)->get();
        return view('index', compact('post','new1','new2', 'new3','banner', 'categories', 'categori', 'hightlight1', 'hightlight2', 'hightlight3', 'newPost', 'xml', 'xml1', 'categoryNew', 'categoryPost'));
    }

    public function category($slug){
        $rss = file_get_contents('https://vnexpress.net/rss/gia-dinh.rss');
        $xml = simplexml_load_string($rss);
        // dd($xml);
        $rss1 = file_get_contents('https://vnexpress.net/rss/khoa-hoc.rss');
        $xml1 = simplexml_load_string($rss1);

        $rss2 = file_get_contents('https://vnexpress.net/rss/the-thao.rss');
        $xml2 = simplexml_load_string($rss2);

        $categories = Categories::whereNULL('parent_id')->get();
        $category = Categories::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->latest()->paginate(3);
        
        $categori =  Categories::all();
        $hightlight = Post::where('highlight_post', 1)->take(5)->get();
        $new = Post::where('new_post', 1)->orderBy('created_at', 'desc')->take(10)->get();
        return view('blocks.fontend.category', compact('categories', 'category', 'posts', 'categori', 'new', 'hightlight', 'xml', 'xml1', 'xml2', 'categoryNew', 'categoryPost'));
    }
    public function post($slug){
        $rss = file_get_contents('https://vnexpress.net/rss/gia-dinh.rss');
        $xml = simplexml_load_string($rss);
        // dd($xml);
        $rss1 = file_get_contents('https://vnexpress.net/rss/khoa-hoc.rss');
        $xml1 = simplexml_load_string($rss1);

        $rss2 = file_get_contents('https://vnexpress.net/rss/the-thao.rss');
        $xml2 = simplexml_load_string($rss2);

        $categories = Categories::whereNULL('parent_id')->get();
        $post = Post::where('slug', $slug)->first();
        $categori =  Categories::all();
        if ($post) {
            $post->update([
                'view_counts'=> $post->view_counts + 1
            ]);
            
            return view('blocks.fontend.post', compact('post', 'categories', 'categori', 'xml', 'xml1', 'xml2'));
        } else {
            return abort(404);
        }
    }
    
    
    public function comment(Request $request, $id){
        $post = Post::find($id);
        $comment = new Comment;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->content = $request->content;
        $comment->post_id = $id;
        $comment->is_comment = 0;
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

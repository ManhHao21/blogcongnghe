<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class PostController extends Controller
{
    public function index(){
        if(Auth::user()->is_admin == 0){
            $admin = Post::all();
        }
        $admin = Post::paginate(3);
        $user = Post::where('is_active','<>', 1)->paginate(2);
        return view('blocks.backend.post.index',compact('admin', 'user'));
    }

    public function create(){
        $categories = Categories::all();
        return view('blocks.backend.post.create', compact('categories'));
    }
    public function approve(){
        $posts = Post::paginate(20);
        return view('blocks.backend.post.post',compact('posts'));
    }

    public function show($id){
        $posts= Post::where('id', $id)->paginate(3);
        return view('blocks.backend.post.show',compact('posts'));
    }
    public function ShowPost($id){
        if (Auth::user()->is_admin == 0 ){
            return redirect()->route('admin.post.index');
        }
        $post = Post::findOrFail($id);
        $post->is_active = 1;
        $post->save();
        // dd($post);
        
        return redirect()->back()->with('msg', 'Duyệt bài viết  thành công');
    }
    public function store(Request $request){
        // dd($request->all());
        // dd($request->all());
    $this->validate($request, [
        'title' => 'required',
        'description' => 'required',
        'content' => 'required',
        'image' => 'required',
        'id' => 'required',
    ], [
        'title.required' => 'Tiêu đề không được để trống',
        'description.required' => 'description không được để trống',
        'content.required' => 'content không được để trống',
        'image.required' => 'hình ảnh không được để trống',
        'id.required' => 'danh mục không được để trống',
    ]);

    $slug = Str::slug($request->title);
    $checkSlug = Post::where('slug', $slug)->first();
    while($checkSlug){
        $slug = $checkSlug->slug . Str::random(2);
    }

    if($request->hasFile('image')){
        $file = $request->file('image');
        $name_file = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        if(strcasecmp($extension, 'jpg') === 0
            ||strcasecmp($extension, 'png') === 0 
            ||strcasecmp($extension, 'jepg') === 0 ){
            $image = Str::random(5) . "_" . $name_file;
            while(file_exists("image/post/".$image)){
                $image = Str::random(5) . "_" . $name_file;
            }
            $file->move('image/post', $image);
        }
    }  
    $post = new Post();
        if (Auth::user()->is_admin == 1) {
            $post->title = $request->title;
            $post->description = $request->description;
            $post->content = $request->content;
            $post->image = $image;
            $post->users_id = Auth::id();
            $post->new_post = $request->has('new_post') ? 1 : 0;
            $post->slug = $slug;
            $post->categories_id = $request->id;
            $post->is_active = 1;
            $post->highlight_post = $request->has('highlight_post') ? 1 : 0;
            $post->slide_post = $request->has('slide_post') ? 1 : 0;
        }else if (Auth::user()->is_admin == 0){
            $post->title = $request->title;
            $post->description = $request->description;
            $post->content = $request->content;
            $post->image = $image;
            $post->users_id = Auth::id();
            $post->new_post = $request->has('new_post') ? 1 : 0;
            $post->slug = $slug;
            $post->categories_id = $request->id;
            $post->is_active = 0;
            $post->highlight_post = $request->has('highlight_post') ? 1 : 0;
            $post->slide_post = $request->has('slide_post') ? 1 : 0;
            
        }
        
        $post->save();
        return redirect()->route('admin.post.index')->with('msg', 'Thêm bài viết thành công');
    }

public function edit($id){
        $post = Post::findOrFail($id);
        $category = Categories::all();
        return view('blocks.backend.post.edit',compact('post', 'category'));
    }

    public function update(Request $request, $id){
        // dd($request);
        $this->validate($request,
        [
            'title' => 'required',
            'description' => 'required',
            // 'content' => 'required',
        //    'image' => 'required',
            'id' => 'required',
        ], 
        [
            'title.required' => 'Tiêu đề không được để trống',
            'description.required' => 'description không được để trống',
            // 'content.required' => 'content không được để trống',
        //    'image.required' => 'hình ảnh không được để trống',
            'id.required' => 'danh mục không được để trống',
        ]);

        $slug = Str::slug($request->title);
        $checkSlug = Post::where('slug', $slug)->first();
        if($checkSlug){
            $slug = $checkSlug->slug . Str::random(2);
        }

        if($request->hasFile('image')){
            $file = $request->file('image');
            $name_file = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            if(strcasecmp($extension, 'jpg') === 0
            ||strcasecmp($extension, 'png') === 0 
            ||strcasecmp($extension, 'jpeg') === 0 ){
                $image = Str::random(5) . "_" . $name_file;
                while(file_exists("image/post/".$image)){
                    $image = Str::random(5) . "_" . $name_file;
                }
                $file->move('image/post', $image);
            }
        }
        $post = Post::find($id);
        if(Auth::user()->is_admin == 1){
        $post->is_active = 1;
        $post->highlight_post = $request->has('highlight_post') ? 1 : 0;
        $post->slide_post = $request->has('slide_post') ? 1 : 0;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $image;
        $post->content = $request->content;
        $post->users_id = Auth::id();
        $post->new_post = $request->has('new_post') ? 1 : 0;
        $post->slug = $slug;
        $post->categories_id = $request->id;
        
        }else{
            $post->is_active = 0;
            $post->highlight_post = $request->has('highlight_post') ? 1 : 0;
            $post->slide_post = $request->has('slide_post') ? 1 : 0;
            $post->title = $request->title;
            $post->description = $request->description;
            $post->image = $image;
            $post->content = $request->content;
            $post->users_id = Auth::id();
            $post->new_post = $request->has('new_post') ? 1 : 0;
            $post->slug = $slug;
            $post->categories_id = $request->id;
        }
        $post->save();

        // dd($request);
        return redirect()->route('admin.post.index', $id)->with('msg', 'cập nhật bài viết thành công');
    }

    public function delete($id){
        if (Auth::user()->is_admin == 0 ){
            // return view('errors.404');
            return redirect()->route('admin.post.index');
        }
        $post = Post::find($id);
        return view('blocks.backend.post.delete',compact('post') );
    }
    public function deletepost($id){
        if (Auth::user()->is_admin == 0 ){
            // return view('errors.404');
            return redirect()->route('admin.post.index');
        }
        Post::where('id', $id)->delete();
        return redirect()->route('admin.post.index')->with('msg', 'Xóa danh mục thành công');
    }

    public function imageUrl(){
        return asset('image/post/' . $this->image);
    }

    public function charAt(){
        return view('backend.content');
    }
}

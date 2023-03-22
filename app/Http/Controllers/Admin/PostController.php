<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){
        $posts = Post::paginate(20);
          return view('blocks.backend.post.index',compact('posts'));
    }

    public function create(){
        $categories = Categories::all();
        return view('blocks.backend.post.create', compact('categories'));
    }

    public function store(Request $request){
        // dd($request);
        $this->validate($request,
         [
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'image' => 'required',
            'category_id' => 'required',
         ], 
         [
            'title.required' => 'Tiêu đề không được để trống',
            'description.required' => 'description không được để trống',
            'content.required' => 'content không được để trống',
            'image.required' => 'hình ảnh không được để trống',
            'category_id.required' => 'danh mục không được để trống',
         ]);

        // $slug = Str::slug($request->name);
        // $checkSlug = Post::where('slug', $slug)->first();
        // while($checkSlug){
        //     $slug = $checkSlug->slug . Str::random(2);
        // }

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
        Post::create([
            'title' =>$request->title,
        'description' =>$request->description,
        'content'  =>$request->content,
        'image'  =>$image,
        'view_counts'  =>0,
        'users_id'  => 1,
        'new_post'  =>$request->new_post ?  1 :0,
        // 'slug'  =>$slug,
        'categories_id'  =>$request->category_id,
        'highlight_post' =>$request->highlight_post?
         1 : 0,
        ]);
        return redirect()->route('admin.post.index')->with('msg', 'bài viết thành công thành công');
    }

    public function edit($id){
        $post = Post::find($id);
        $category = Categories::all();
        return view('blocks.backend.post.edit',compact('post', 'category'));
    }

    public function update(Request $request, $id){
        $this->validate($request,
        [
           'title' => 'required',
           'description' => 'required',
           'content' => 'required',
        //    'image' => 'required',
           'category_id' => 'required',
        ], 
        [
           'title.required' => 'Tiêu đề không được để trống',
           'description.required' => 'description không được để trống',
           'content.required' => 'content không được để trống',
        //    'image.required' => 'hình ảnh không được để trống',
           'category_id.required' => 'danh mục không được để trống',
        ]);

    //    $slug = Str::slug($request->name);
    //    $checkSlug = Post::where('slug', $slug)->first();
    //    if($checkSlug){
    //        $slug = $checkSlug->slug . Str::random(2);
    //    }

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
       $post = Post::find($id);
       $post->update([
        'title' =>$request->title,
        'description' =>$request->description,
        'content'  =>$request->content,
        'image'  => isset($image) ? $image : $post->image,
        'new_post'  =>$request->new_post ?1 :0,
        // 'slug'  =>$slug,
        'categories_id'  =>$request->category_id,
        'highlight_post' =>$request->highlight_post ? 1 : 0,
       ]);
       
       return redirect()->route('admin.post.index', $id)->with('msg', 'cập nhật bài viết thành công thành công');
    }

    public function delete($id){
        post::where('id', $id)->delete();
        return redirect()->route('admin.post.index')->with('msg', 'Xóa danh mục thành công');
    }

    public function imageUrl(){
        return asset('image/post/' . $this->image);
    }
}

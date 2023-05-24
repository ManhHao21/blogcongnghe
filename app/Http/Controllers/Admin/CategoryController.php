<?php

namespace App\Http\Controllers\Admin;
use App\View\Components\Recusive;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
{
    // private $category;
    // public function __construct(Categories $category)
    // {
    //     $this->category = $category;
    // }
    public function index(){
        // if (Auth::user()->is_admin == 0 ){
        //     // return view('errors.404');
        //     return redirect()->route('admin.post.index');
        // }
        $categories =  Categories::paginate(3);
        return view('blocks.backend.categories.index',compact('categories'));
    }

    public function create(){
        // if (Auth::user()->is_admin == 0 ){
        //     // return view('errors.404');
        //     return redirect()->route('admin.post.index');
        // }
        $category = Categories::all();
        return view('blocks.backend.categories.create', compact('category'));
    }
    
    
    public function store(Request $request){
        if (Auth::user()->is_admin == 0 ){
            // return view('errors.404');
            return redirect()->route('admin.post.index');
        }
        $this->validate($request,
        [
            'name' => 'required'
        ], 
        [
            'name.required' => 'Không được để trống khi thêm danh mục'
        ]);

        $slug = Str::slug($request->name);
            $checkSlug = Categories::where('slug', $slug)->first();
        while($checkSlug){
            $slug = $checkSlug->slug . Str::random(2);
        }
        $category = new Categories();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        if ($request->has('parent_id') && Categories::exists($request->parent_id)) {
            $category->parent_id = $request->parent_id;
        } else {
            $category->parent_id = null;
        }

        
        $category->save();
        return redirect()->route('admin.category.index')->with('msg', 'tạo danh mục thành công');
    }

    public function edit($id){
        if (Auth::user()->is_admin == 0 ){
            // return view('errors.404');
            return redirect()->route('admin.post.index');
        }
        $categories =  Categories::find($id);
        $category = Categories::all();
        return view('blocks.backend.categories.edit', compact('category', 'categories'));
    }
    public function update(Request $request, $id){
        if (Auth::user()->is_admin == 0 ){
            // return view('errors.404');
            return redirect()->route('admin.post.index');
        }
        $this->validate($request,
        [
            'name' => 'required'
        ], 
        [
            'name.required' => 'Không được để trống khi thêm danh mục'
        ]);

        $slug = Str::slug($request->name);
            $checkSlug = Categories::where('slug', $slug)->first();
        while($checkSlug){
            $slug = $checkSlug->slug . Str::random(2);
        }
        $category = new Categories();
        $category = Categories::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        if ($request->has('parent_id') && Categories::exists($request->parent_id)) {
            $category->parent_id = $request->parent_id;
        } else {
            $category->parent_id = null;
        }
        $category->save();
    
        return redirect()->route('admin.category.edit', $id)->with('msg', 'cập nhật danh mục thành công');
    }
    public function delete($id){
        if (Auth::user()->is_admin == 0 ){
            // return view('errors.404');
            return redirect()->route('admin.post.index');
        }
        $categories = Categories::find($id);
        return view('blocks.backend.categories.delete',compact('categories') );
    }
    public function deletecategory($id){
        if (Auth::user()->is_admin == 0 ){
            // return view('errors.404');
            return redirect()->route('admin.post.index');
        }
        Categories::where('id', $id)->delete();
        return redirect()->route('admin.category.index')->with('msg', 'Xóa danh mục thành công');
    }
}

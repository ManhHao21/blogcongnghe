<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $categories =  Categories::all();
        return view('blocks.backend.categories.index',compact('categories'));
    }

    public function create(){
        return view('blocks.backend.categories.create');
    }

    public function store(Request $request){
        $this->validate($request,
         [
            'name' => 'required'
         ], 
         [
            'name.required' => 'Không được để trống khi thêm danh mục'
         ]);

        $slug = Str::slug($request->title);
            $checkSlug = Categories::where('slug', $slug)->first();
        while($checkSlug){
            $slug = $checkSlug->slug . Str::random(2);
        }
        Categories::create([
            'name' =>$request->name,
            'slug' => Str::slug($request->name),
            'parent_id' =>$request->parent_id
        ]);
        return redirect()->route('admin.category.index')->with('msg', 'tạo danh mục thành công');
    }

    public function edit($id){
        $category = Categories::find($id);
        return view('blocks.backend.categories.edit', compact('category'));
    }

    public function update(Request $request, $id){
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
        $category = Categories::find($id);
        $category->update([
            'name' =>$request->name,
            'slug' => $slug,
            'parent_id' =>$request->parent_id
        ]);
      
        return redirect()->route('admin.category.edit', $id)->with('msg', 'cập nhật danh mục thành công');
    }

    public function delete($id){
        Categories::where('id', $id)->delete();
        return redirect()->route('admin.category.index')->with('msg', 'Xóa danh mục thành công');
    }
}

<?php

namespace App\Http\Controllers\Admin;
use App\View\Components\Recusive;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;
    public function __construct(Categories $category)
    {
        $this->category = $category;
    }
    public function index(){
        $categories =  Categories::all();
        return view('blocks.backend.categories.index',compact('categories'));
    }

    public function create(){
       $htmlOption =  $this->getCategory($parentid = '');
        return view('blocks.backend.categories.create', compact('htmlOption'));
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
        
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory();
        return view('blocks.backend.categories.edit', compact('category', 'htmlOption'));
    }

    public function getCategory(){
        $data =  $this->category-> all();
        $recusive = new Recusive($data);

       $htmlOption =  $recusive->categoryRecusive();
       return $htmlOption;
    }

    public function update(Request $request, $id){
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
        $category = Categories::find($id);
        $category->update([
            'name' =>$request->name,
            'slug' => $slug,
            'parent_id' => $request->parent_id
        ]);
      
        return redirect()->route('admin.category.edit', $id)->with('msg', 'cập nhật danh mục thành công');
    }

    public function delete($id){
        Categories::where('id', $id)->delete();
        return redirect()->route('admin.category.index')->with('msg', 'Xóa danh mục thành công');
    }
}

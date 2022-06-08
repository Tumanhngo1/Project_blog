<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostCategoriesController extends Controller
{
    protected function validateForm(PostCategory $postCategory=null):array
    {
        $postCategory ??= new PostCategory();
        return request()->validate([
            'name' => 'required|min:6'
        ]);
    }

    public function index(){
        $categories =  PostCategory::orderByDesc('created_at')->paginate(20);
        return view('admin.categories.index',[
            'categories' => $categories
        ]);
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(){
        $attributes = $this->validateForm();
        $attributes['slug'] =  Str::slug(request()->name , '-');
        PostCategory::create($attributes);
        return redirect()->route('categories.index')->with('msg','Thêm Mới  Thành Công'); 
    }

    public function edit($slug){
        $category =PostCategory::where('slug',$slug)->firstOrFail();
        return view('admin.categories.edit',[
            'category' => $category
        ]);
    }

    public function update(PostCategory $category){
        $attributes = $this->validateForm();
        $attributes['slug'] = Str::slug(request()->name , '-');
        $category->update($attributes);
        return redirect('/admin/categories')->with('msg','Thêm Mới  Thành Công');
    }
    
    public function destroy($slug){
        PostCategory::where('slug',$slug)->delete();
        return redirect('/admin/categories')->with('msg','Xóa Thành Công');  
    }
}

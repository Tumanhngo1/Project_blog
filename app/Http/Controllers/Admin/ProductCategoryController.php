<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    protected function validateForm(ProductCategory $productCategory=null) : array
    {
        $productCategory ??= new ProductCategory();
        return request()->validate([
            'name' => 'required|min:4'
        ]);
    }

    public function index(){
        return view('admin.category_product.index',[
            'categories' => ProductCategory::paginate(3)
        ]);
    }
    public function create(){
        return view('admin.category_product.create');
    }
    public function store(){
        ProductCategory::create(array_merge($this->validateForm(),[
            'slug' => str::slug(request()->name, '-'),
        ]));
        return redirect('/admin/productcategories');
    }
    public function edit($slug){
        // dd(CategoryProduct::where('slug',$slug)->first());
        return view('admin.category_product.edit',[
           'category' => ProductCategory::where('slug',$slug)->first()
        ]);
    }
    
    public function update(ProductCategory $category,$slug){
        
        $attributes = $this->validateForm();
        $attributes['slug'] = str::slug(request()->name, '-');
        $category->update($attributes);
        // dd($category);
        return redirect('/admin/productcategories');
    }
    public function destroy($slug){
        ProductCategory::where('slug',$slug)->delete();
        return back();
    }
}

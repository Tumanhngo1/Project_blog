<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    protected function validateProduct(Product $product=null) : array
    {
        $product ??= new Product();
        return request()->validate([
            'price' => 'required|alpha_num',
            'title' => 'required',
            'image' =>  ['image'] ,
            'description' => 'required',
            'category_id' => ['required', Rule::exists('product_categories','id')],
        ]);
    }
    public function index(){
        $products = Product::orderByDesc('created_at')->paginate(5);
        return view('admin.products.index',[
            'products' => $products
        ]);
    }
    public function create(){
        return view('admin.products.create',[
            'categories'=> ProductCategory::all(),
        ]);
    }
    public function store(){
        Product::create(array_merge($this->validateProduct(),[
            'slug' => Str::slug(request()->title, '-'),
            'image' => request()->file('image')->store('thumbnails'),
        ]));
        return redirect('/admin/products')->with('msg','Thêm Mới  Thành Công'); 
    }

    public function show($slug){
        return view('admin.products.show',[
            'product' => Product::where('slug',$slug)->first()
        ]);
    }

    public function edit($slug){
        return view('admin.products.edit',[
            'product' => Product::where('slug',$slug)->first(),
            'categories' => ProductCategory::all()
        ]);
    }

    public function update(Product $product){
        $attributes = $this->validateProduct();
        if($attributes['image'] ?? false){
            $attributes['image'] = request()->file('image')->store('thumbnails');
        }
        $product->update($attributes);
        return redirect('/admin/products');
    }
    public function destroy($slug){
        Product::where('slug',$slug)->delete();
        return back();
    }
}

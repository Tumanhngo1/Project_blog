<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('ok');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories_attr.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product)
    {
        // dd(request()->all());
        $attribute = request()->validate([
            'color' => 'required'
        ]);
        $attribute['product_id'] = request()->product_id;
       $product->colors()->create($attribute);
        return redirect('/admin/products');

    }
    public function storesize(Product $product)
    {
        $attribute = request()->validate([
            'size' => 'required'
        ]);
        $attribute['product_id'] = request()->product_id;
        $product->sizes()->create($attribute);
        return redirect('/admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('admin.categories_attr.color',[
            'product' => Product::where('slug',$slug)->first()
        ]);
    }
    public function size($slug)
    {
        return view('admin.categories_attr.size',[
            'product' => Product::where('slug',$slug)->first()
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('admin.categories_attr.editcolor',[
            'product' => Product::where('slug',$slug)->first()
        ]);
    }
    public function sizeedit($slug)
    {
        return view('admin.categories_attr.editsize',[
            'product' => Product::where('slug',$slug)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        Color::where('id',$id)->delete();
        return back();
    }
    public function sizedestroy($id)
    {   
        Size::where('id',$id)->delete();
        return back();
    }
}

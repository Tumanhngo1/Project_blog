<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->filter(request(['search','category']))
        ->paginate(7);
        return view('users.products.products',[
          'products' => $products
        ]);
    }

    
    public function show($slug, Store $session){
        $product = Product::whereSlug($slug)->firstOrFail();

        $recentPros = $session->get('resent_products',[]);
        $recentPros[] = $product;
        if(count($recentPros) > 3){
            array_shift($recentPros);
        }
        $session->put('resent_products',$recentPros);
        $carts = session()->get('cart');
        return view('users.products.product',[
            'product' => $product,
            'carts' => $carts
        ]);
    }
}

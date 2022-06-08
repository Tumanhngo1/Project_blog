<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductCommentController extends Controller
{
    public function store(Product $product){
        request()->validate([
            'body' => 'required'
        ]);
        $product->productcoments()->create([
            'user_id' => request()->user()->id,
            'body' => request()->body
        ]);
        return back();
    }
}

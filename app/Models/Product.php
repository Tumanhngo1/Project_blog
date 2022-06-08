<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo(ProductCategory::class);
    }
    public function productcoments(){
        return $this->hasMany(ProductComment::class);
    }
    
    public function colors(){
        return $this->hasMany(Color::class);
    }
    public function sizes(){
        return $this->hasMany(Size::class);
    }

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, fn($query, $search)
        =>$query->where(fn($query)=>
                $query->where('title','like','%'.$search.'%')
                ->orWhere('price','like','%'.$search.'%')
            ));
        
        $query->when($filters['category'] ?? false, fn($query, $category)
        =>$query->whereHas('category',fn($query)
            =>$query->where('slug',$category)
            ));
    }
}

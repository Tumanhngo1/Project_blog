<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    // use SoftDeletes;
    // const STATUS_DRAFT = 'draft';
    // const STATUS_UNPUBLISHED = 'unpublished';
    // const STATUS_PUBLISHED = 'published';
    
    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, fn($query,$search)
        =>$query->where(fn($query)
            => $query->where('title','like','%'.$search.'%')
                    ->orWhere('excerpt','like','%'.$search.'%')
                    ->orWhere('description','like','%'.$search.'%')
                ));
        
        $query->when($filters['category'] ?? false, fn($query, $category)
            =>$query->whereHas('category',fn($query)
                    =>$query->where('slug',$category)
                ));
        $query->when($filters['author'] ?? false, fn($query, $author)
            =>$query->whereHas('author',fn($query)
                    =>$query->where('username',$author)
                ));
    }
    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function scopeUnpublished($query)
    {
        return $query->where('published', false);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function category(){
        return $this->belongsTo(PostCategory::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class)->orderByDesc('id');
    }

    public function replays(){
        return $this->hasMany(Replay::class)->orderByDesc('id');
    }
}

<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){
        $posts = Post::latest()->filter(request(['search','category','author']))
        ->paginate(10);
        return view('users.home.posts',[
            'posts' => $posts
        ]);
    }
    public function create()
    {
        $categories = PostCategory::all();
        return view('users.posts.create',compact('categories'));
    }
    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'description' => 'required',
            'image' => 'image',
            'category_id' => ['required', Rule::exists('post_categories','id')]
        ]);
        $data['slug'] = Str::slug(request()->title, '-');
        $data['image'] = request()->file('image')->store('thumbnails');
        $data['user_id'] = auth()->user()->id;
        Post::create($data);
        return redirect()->route('list_drafts');

        // $data = request()->only('title', 'body');
        // $data['slug'] = Str::slug($data['title'], '-');
        // $data['user_id'] = auth()->user()->id;
        // $post = Post::create($data);
        // return redirect()->route('edit_post', ['id' => $post->id]);
    }
    public function show($slug){
        $post = Post::whereSlug($slug)->firstOrFail();
        $post->increment('post_view');
        $popular = Post::orderByDesc('post_view')->take(3)->get();
        return view('users.home.post',[
            'post' => $post,
            'populars' => $popular
        ]);
        // $post = Post::published()->findOrFail($id);
        // return view('posts.show', compact('post'));
    }
    public function edit(Post $post)
    {
        return view('users.posts.edit', compact('post'));
    }
    public function update(Post $post)
    {
        $data = request()->only('title', 'body');
        $data['slug'] =Str::slug($data['title'], '-');
        $post->fill($data)->save();
        return back();
    }

    public function publish(Post $post)
    {
        $post->published = true;
        $post->save();
        return back();
    }

    public function drafts()
    {
        $posts = Post::where('user_id',auth()->user()->id)->get();
        // $postsQuery = Post::unpublished();
        // if(Gate::denies('post.draft')) {
        //     $postsQuery = $postsQuery->where('user_id', auth()->user()->id);
        // }
        // $posts = $postsQuery->paginate();
        return view('users.posts.drafts', compact('posts'));
    }

    public function destroy($id){
        Post::findOrFail($id)->delete();
        return redirect()->back();
    }
}

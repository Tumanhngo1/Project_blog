@extends('users.layouts.home')


@section('content')
<div id='nav-search'>
  <form action='/?search' class='search-form' role='search'>
  <input autocomplete='off' class='search-input' name='search' placeholder='Search this blog' type='search' value=''/>
  <span class='hide-search'></span>
  </form>
  </div>
  @if ($posts->count() ) 
  <div class='widget-content'>
  <article class='post'>
    <div class='post-image-wrap'>
   
      <img class="post-image" src="{{asset('storage/'. $posts[0]->image)}}" alt="">
    </div>
    <div class='post-header'>
      <div class='post-meta'>
      <a href='/?author={{ $posts[0]->author->username }}'>{{ $posts[0]->author->name }}</a>
      </span><time class='post-date published'
       datetime='2018-06-27T15:01:00-07:00'>{{ $posts[0]->created_at->diffForHumans() }}</time>
      </div>
    <h2 class='post-title'>
    <a href='/users/{{$posts[0]->slug}}'>{{$posts[0]->title}}</a>
    </h2>
    </div>
    <div class='post-content'>
    <p class='post-snippet'>{{$posts[0]->excerpt}}</p>
    <a class='read-more' href='/users/{{$posts[0]->slug}}'>Read more</a>
    </div>
  </article>
      </div>
      </div></div>
      </div>
    
      <div class='row-x1' id='content-wrapper'>
      <div class='container'>
      
      <main id='main-wrapper'>
      <div class='main-ads section' id='main-ads1' name='Main ADS1'><div class='widget HTML' data-version='2' id='HTML2'>
      <div class='widget-content'>
      <a class="sora-ads-full" href="javascript:;">Responsive Advertisement</a>

      </div>
      </div></div>
      <div class='main section' id='main' name='Main Posts'><div class='widget Blog' data-version='2' id='Blog1'>
      <div class='blog-posts hfeed container index-post-wrap'>
  @if ($posts->count()>1) 
      @foreach ($posts->skip(1) as $post)
      <article class='blog-post hentry index-post'>
      <div class='post-image-wrap'>
           
            <img class="post-image" src="{{asset('storage/'. $post->image)}}" alt="">
        </div>
        <div class='post-header'>
            <div class='post-meta'>

                <a href="/?author={{$post->author->username}}">{{$post->author->name}}</a>
        
                <time class='post-date published' datetime='2018-06-27T20:23:00-07:00'>{{$post->created_at->diffForHumans() }}</time>
            </div>
            <h2 class='post-title'>
            <a href='/users/{{$post->slug}}'>{{$post->title}}</a>
            </h2>
        </div>
        <div class='post-content'>
        <p class='post-snippet'>{{$post->excerpt}}</p>
        <a href="/?category={{ $post->category->slug }}">{{$post->category->name}}</a>
        <a class='read-more' href='/users/{{$post->slug}}'>Read more</a>
        </div>
      </article>
      @endforeach
      @endif
    {{$posts->links()}} 

    @else
    <p style="text-align: center; margin:10px;">Khong co bai viet</p>
    @endif
  

@endsection
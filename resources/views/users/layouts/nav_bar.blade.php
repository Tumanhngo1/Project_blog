
    
        <div class='widget-title'>
            <h3 class='title'>
            Most Popular
            </h3>
        </div>
        <div class='widget-content'>
            @foreach($populars as $popular)
            <article class='popular-post post'>
                <div class='post-image-wrap'>
                <a class='post-image' href='/users/{{$popular->slug}}'>
    
                    <img src="{{asset('storage/'. $popular->image)}}" alt="">
            
                </a>
                </div>
                <div class='post-header'>
                <div class='post-meta'>
                <time class='post-date published' datetime='2018-06-27T15:01:00-07:00'>{{$popular->created_at->diffForHumans()}}</time>
                <span class="label-count float-end">{{$popular->post_view}}</span>
                </div>  
                <h2 class='post-title'>
                <a href='/users/{{$popular->slug}}'>{{ $popular->title }}</a>
                </h2>
                </div>
            </article>
            @endforeach
        </div>
   

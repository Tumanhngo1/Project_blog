<div>
    @foreach ($post->comments as $comment)
    <section>
        <article class="flex">
            <div>
                <img style="width:5%;margin-top:3px" src="https://i.pravatar.cc/100" alt="">
            </div>
            <div>
                <header>
                    <h3 class="font-bold">{{ $comment->author->name }}</h3>
                    <p class="text-xs">{{ $comment->created_at->diffForHumans() }}</p>
                </header>
                <p>
                    {{ $comment->body }}
                </p>
            </div>
        </article>
    </section>
@endforeach
</div>


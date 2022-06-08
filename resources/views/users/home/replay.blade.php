
@foreach ($comment->replays as $replay)
    <section style="margin-left: 15px;">
        <article class="flex">
            <div>
                <header style="display:flex">
                    <div>
                        <h5 class="font-bold">{{ $replay->author->name }}</h5>
                    </div>
                    <div>
                        {{-- <p class="text-xs">{{ $replay->created_at->diffForHumans() }}</p> --}}
                    </div>

                </header>
                <p>
                    {{ $replay->body }}
                </p>

            </div>
        </article>
    </section>
@endforeach

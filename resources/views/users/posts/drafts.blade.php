@extends('users.layouts.home')

@section('content')
    <div class="container">
        <a class="btn btn-info mt-5 mb-3" href="{{ route('create_post') }}">Them bai viet</a>
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4">
                    <h2>{{ $post->title }}</h2>
                    <p>{!! $post->description !!}</p>
                    <p>
                        <a class="btn btn-success" href="{{ route('edit_post', $post->id) }}" role="button">Chỉnh sửa</a>

                        <a class="btn btn-success" onclick="return confirm('ok')" href="{{ route('post.delete', $post->id) }}" role="button">Xoa</a>

                    </p>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@extends('users.layouts.home')


@section('content')
    <div class="mt-5">
        <form action="{{ route('store_post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Tên danh mục</label>
                <select name="category_id" id="" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="name">Ten tac gia</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}">
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="image">Ảnh minh họa</label>
                <input type="file" id="image" name="image" class="form-control" required>
                @error('image')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="excerpt">Tên hiển thị vắn tắt</label>
                <input type="text" id="excerpt" name="excerpt" value="{{ old('excerpt') }}" class="form-control">
                @error('excerpt')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">description</label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-secondary mb-5">Dang bai</button>
        </form>
    </div>
@endsection

@extends('admin.layouts.home')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Danh mục sản phẩm</h1>
        </div>
        <div class="col-sm-6">
        
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  @if (Session::get('msg'))
  <span class="fixed alert alert-default-success " style=" float: right;" >{{  Session::get('msg')  }}</span>
@endif
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Chỉnh sửa danh mục</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <form action="/admin/posts/{{$post->slug}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
              <div class="card-body">
                <div class="form-group">
                  <label for="">Tên danh mục</label>
                  <select name="category_id" id="" class="form-control">
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{old('category_id')==$category->id || $post->category_id == $category->id?'selected':false}}>{{ $category->name }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Tên Tác giả</label>
                  <select name="user_id" id="" class="form-control">
                      @foreach ($users as $user)
                      <option value="{{ $user->id }}" {{old('user_id')==$user->id || $post->user_id == $user->id?'selected':false}}>{{ $user->name }}</option>
                      @endforeach
                  </select>
                </div>
             
                <div class="form-group">
                  <label for="">Tên bài viết</label>
                  <input type="text" id="" value="{{old('title') ?? $post->title}}" name="title" class="form-control" required>
                     @error('title')
                     <span  style="color: red">{{ $message }}</span>
                     @enderror
                </div>
                <div class="form-group flex">
              
                    <label for="">Ảnh minh họa</label>
                    <input type="file" id="" value="{{old('image') ?? $post->image}}" name="image" class="form-control">
                 
                  
                 <div class="col-6">
                  <img style="max-width: 20%; margin-top:10px" src="{{asset('storage/' .$post->image) }}" alt="">
                 </div>
                
                
                  @error('image')
                     <span  style="color: red">{{ $message }}</span>
                     @enderror
                </div>
             
                <div class="form-group">
                  <label for="">Tên hiển thị vắn tắt</label>
                  <input type="text" id="" value="{{old('excerpt') ?? $post->excerpt}}" name="excerpt" class="form-control">
                     @error('excerpt')
                     <span  style="color: red">{{ $message }}</span>
                     @enderror
                </div>
                <div class="form-group">
                  <label for="ckeditor">Nội dung</label>
                  <textarea name="description" id="mytextarea" cols="30" rows="10"  class="form-control">{{old('description') ?? $post->description}}</textarea>
                     @error('excerpt')
                     <span  style="color: red">{{ $message }}</span>
                     @enderror
                </div>
                <div class="form-group">
                  <label for="inputStatus">Trạng thái</label>
                  <select class="form-control"   id="">
                    <option value="0">Active</option>
                    <option style="color: red"  value="1">Disabled</option>
                  </select>
                </div>
              </div>
              <div class="row">
                  <div class="col-12 ml-3 mb-3">
                      <a href="/admin/posts" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-success">Update</button>
                  </div>
              </div>
        </form>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <div class="row">
      {{-- <div class="col-12">
        <a href="/post" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="btn btn-success">Thêm mới</button>
      </div> --}}
    </div>
 
  </section>
@endsection
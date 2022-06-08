@extends('admin.layouts.home')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h1>Thêm mới danh mục</h1> --}}
        </div>
        <div class="col-sm-6">
         
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
   
    <div class="row">
      <div class="col">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Danh mục bài viết</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
        <form action="/admin/products" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- @method('put') --}}
              <div class="card-body">
                <div class="form-group">
                  <label for="">Tên danh mục</label>
                  <select name="category_id" id="" class="form-control">
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}"{{old('category_id')==$category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                      @endforeach
                  </select>
                  @error('category_id')
                     <span  style="color: red">{{ $message }}</span>
                     @enderror
                </div>
                <div class="form-group">
                  <label for="title">Tên bài viết</label>
                  <input type="text" id="title" name="title" value="{{old('title')}}" class="form-control">
                     @error('title')
                     <span  style="color: red">{{ $message }}</span>
                     @enderror
                </div>
                <div class="form-group">
                  <label for="image">Ảnh minh họa</label>
                  <input type="file" id="image" name="image" class="form-control" required>
                     @error('image')
                     <span  style="color: red">{{ $message }}</span>
                     @enderror
                </div>
             
                <div class="form-group">
                  <label for="price">Giá</label>
                  <input type="text" id="price" name="price" value="{{old('price')}}"  class="form-control">
                     @error('price')
                     <span  style="color: red">{{ $message }}</span>
                     @enderror
                </div>
                <div class="form-group">
                  <label for="editor">Nội dung</label>
                  <textarea name="description" id="mytextarea" cols="30" rows="10"  class="form-control">{{old('description')}}</textarea>
                     @error('description')
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
                  <button type="submit" class="btn btn-success">Thêm mới</button>
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
        <a href="/category" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="btn btn-success">Thêm mới</button>
      </div> --}}
    </div>
 
  </section>
@endsection
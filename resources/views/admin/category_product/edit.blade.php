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
        <form action="/admin/productcategories/{{$category->slug}}" method="POST">
            @csrf
            @method('put')
              <div class="card-body">
                <div class="form-group">
                  <label for="">Tên danh mục</label>
                  <input type="text" id="" name="name" value="{{ $category->name}}" class="form-control">
                     @error('name')
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
                <div class="col-12">
                  <a href="/admin/productcategories" class="btn btn-secondary">Cancel</a>
                  <button type="submit" class="btn btn-success">update</button>
                </div>
              </div>
        </form>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <div class="row">

    </div>
 
  </section>
@endsection
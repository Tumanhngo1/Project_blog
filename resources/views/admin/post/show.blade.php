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

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
        <div>Tac gia: {{$post->author->name}}</div>    
        <div>Danh muc: {{$post->category->name}}</div> 
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th>
                        Bài đăng
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        {{ $post->title }}
                    </td>
                </tr>     
            </tbody>
            <thead>
                <tr>
                    <th>
                        Vắn tắt
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        {{ $post->excerpt }}
                    </td>
                </tr>     
            </tbody>
            <thead>
                <tr>
                    <th>
                        Bài đăng
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        {!! $post->description !!}
                    </td>
                </tr>     
            </tbody>
            <thead>
                <tr>
                    <th >
                        Ngày đăng
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        {{ $post->created_at }}
                    </td>
                </tr>     
            </tbody>
            
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div>
                            <a class="btn btn-primary btn-sm" href="/admin/posts">
                              <i class="fas fa-folder">
                              </i>
                              Back
                          </a>
                          <a class="btn btn-info btn-sm" href="{{ route('posts.edit',$post->slug) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                        </div>  
                    </td>
                </tr>
               
            </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    
  </section>
@endsection
@extends('admin.layouts.home')


@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Danh mục sản phẩm</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Categories</li>
          </ol>
         
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <a class="btn btn-success" href="/admin/posts/create">
            <i class="fas fa-folder">
            </i>
            Thêm mới bài viết
        </a>
        @if (Session::get('msg'))
           <span class="fixed alert alert-default-success " style=" float: right;" >{{  Session::get('msg')  }}</span>
        @endif
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 50%">
                        Tên bài viết
                    </th>
                    <th style="width: 10%">
                        Images
                    </th>
                    <th style="width: 15%" class="text-center">
                        Created_at
                    </th>
                    <th style="width: 15%" class="text-center">
                        Updated_at
                    </th>
                    <th style="width: 20%">
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $key => $post)
                <tr>
                    <td>
                        {{ $key+1 }}
                    </td>
                    <td>
                       {{ $post->title }}
                    </td>
                    <td>
                      {{-- <div class="col-6"> --}}
                       <img style="width: 100%" src="{{asset('storage/'. $post->image)}}" alt="{{asset('storage/'.$post->image) }}">
                      {{-- </div> --}}
                      </td>
                    <td class="project-state">
                        {{ date('d-M-Y', strtotime($post->updated_at))}}
                    </td>
                    <td class="project-state">
                        {{ date('d-M-Y', strtotime($post->created_at))}}
                    </td>
                    <td class="project-actions text-right">
                     <div>
                          <a class="btn btn-primary btn-sm" href="{{ route('posts.show',$post->slug) }}">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a class="btn btn-info btn-sm" href="{{ route('posts.edit',$post->slug) }}">
                          <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                      </div>
                        
                        <div>
                          <form action="/admin/posts/{{ $post->slug }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-info uppercase" onclick="return confirm('are u sure')" type="submit"><i class="fa-solid fa-trash-can"></i></button>
                          </form>
                        </div>
                       
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="float: right">
          {{ $posts->links() }}
        </div>
      
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    
  </section>
@endsection
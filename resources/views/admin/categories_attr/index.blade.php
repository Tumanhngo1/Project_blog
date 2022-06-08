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
        <a class="btn btn-success" href="{{ route('attr.create') }}">
            <i class="fas fa-folder">
            </i>
            Thêm mới danh mục
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
                    <th style="width: 15%">
                        Name
                    </th>
                    <th style="width: 20%">
                        Title
                    </th>
                    {{-- <th style="width: 8%" class="text-center">
                        Status
                    </th> --}}
                    <th style="width: 8%" class="text-center">
                        Created_at
                    </th>
                    <th style="width: 8%" class="text-center">
                        Updated_at
                    </th>
                    <th style="width: 20%">
                    </th>
                </tr>
            </thead>
            <tbody>
              
                @foreach ($categories as $key => $category)
                <tr>
                    <td>
                        {{ $key+1 }}
                    </td>
                    <td>
                       {{ $category->name }}
                    </td>
                    <td class="project_progress">
                        {{ $category->slug }}
                    </td>
                    {{-- <td class="project-state">

                        @switch($category->status)
                            @case(0)
                                
                                 Còn hàng
                               
                                @break
                            @case(1)
                            <div>
                              <span class="alert alert-danger sm">Còn hàng</span>
                            </div>
                                @break
                            @default
                                
                        @endswitch
                    </td> --}}
                    <td class="project-state">
                        {{ date('d-m-Y', strtotime($category->updated_at))}}
                    </td>
                    <td class="project-state">
                        {{ date('d-m-Y', strtotime($category->created_at))}}
                    </td>
                    <td class="project-actions text-right">
                      <div>
                        {{-- <a class="btn btn-primary btn-sm" href="#">
                          <i class="fas fa-folder">
                          </i>
                          View
                      </a> --}}
                      <a class="btn btn-info btn-sm" href="{{ route('categories.edit',$category->slug) }}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                      </a>
                      </div>
                        
                        <div>
                          <form action="/admin/categories/{{ $category->slug }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-info uppercase" onclick="return confirm('are u sure')" type="submit">Delete</button>
                          </form>
                        </div>
                       
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="float: right">
          {{ $categories->links() }}
        </div>
      
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    
  </section>
@endsection
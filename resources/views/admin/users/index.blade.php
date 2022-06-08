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
                <a class="btn btn-success" href="/admin/users/create">
                    <i class="fas fa-folder">
                    </i>
                    Thêm mới danh mục
                </a>
                @if (Session::get('msg'))
                    <span class="fixed alert alert-default-success "
                        style=" float: right;">{{ Session::get('msg') }}</span>
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
                               name
                            </th>
                            <th style="width: 15%">
                                username
                            </th>
                            <th style="width: 10%">
                                email
                            </th>
                            
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
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>
                                    {{ $key + 1 }}
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td class="project_progress">
                                    {{ $user->username }}
                                </td>
                                <td class="project_progress">
                                    {{ $user->email }}
                                </td>
                                {{-- <td class="project_progress">
                                    <img style="width: 30%" src="{{ asset('storage/' . $user->image) }}"
                                        alt="{{ asset('storage/' . $user->image) }}">
                                </td> --}}
                                {{-- <td class="project_progress">
                                    <a href="/admin/attr/{{ $user->slug }}" class="btn btn-success btn-sm"><i class="fa-solid fa-plus"></i></a>
                                    <a href="/admin/attr/{{ $user->slug }}/edit" class="btn btn-success btn-sm"><i class="fa-solid fa-minus"></i></a> --}}
                                  {{-- @if(isset($user->colors->color)) --}}
                                  {{-- <div>
                                    @foreach($user->colors as $color) 
                                    <span style="color:  {{$color->color}}">x</span>
                                    @endforeach
                                  </div> --}}
                                  
                                   
                                    {{-- @else --}}
                                   
                                  {{-- @endif --}}
                                </td>
                                {{-- <td class="project_progress">
                                    <a href="/admin/size/{{ $user->slug }}" class="btn btn-success btn-sm"><i class="fa-solid fa-plus"></i></a>
                                    <a href="/admin/size/{{ $user->slug }}/edit" class="btn btn-success btn-sm"><i class="fa-solid fa-minus"></i></a> --}}
                                  {{-- @if(isset($user->Attributes->size)) --}}
                                  {{-- <div>
                                    @foreach($user->sizes as $size)
                                    {{$size->size}}
                                    @endforeach
                                  </div> --}}
                               
                                  {{-- @else --}}
                                 
                                {{-- @endif --}}
                               
                                </td>
                                <td class="project-state">
                                    {{ date('d-m-Y', strtotime($user->updated_at)) }}
                                </td>
                                <td class="project-state">
                                    {{ date('d-m-Y', strtotime($user->created_at)) }}
                                </td>
                                <td class="project-actions text-right">
                                    <div>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('users.show', $user->id) }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>

                                        <a class="btn btn-info btn-sm" href="/admin/users/{{ $user->id }}/edit">
                                            <i class="fas fa-pencil-alt">
                                            </i>

                                        </a>
                                    </div>

                                    <div>
                                        <form action="/admin/users/{{ $user->id }}/delete" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-info uppercase" onclick="return confirm('are u sure')"
                                                type="submit"><i class="fa-solid fa-trash-can"></i></button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="float: right">
                    {{ $users->links() }}
                </div>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection

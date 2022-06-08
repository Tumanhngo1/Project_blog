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
                  <th>
                    id
                </th>
                    <th>
                        Khach hang
                    </th>
                    <th>
                        email
                    </th>
                    <th >
                        dia chi
                    </th>
                    <th >
                        phone
                    </th>
                    <th >
                        ten san pham
                    </th>
                    <th >
                        so luong
                    </th>
                    <th >
                        gia tien
                    </th>
                    <th >
                        tong tien
                    </th>
                    <th >
                        ngay dat hang
                    </th>
                    <th >
                        quan ly
                    </th>
                </tr>
            </thead>
            <tbody>
                 @foreach ($customers as $key => $customer) 
                <tr>
                    <td>
                        {{ $key+1 }}
                    </td>
                    <td>
                       {{ $customer->name }}
                    </td>
                    <td>
                       {{ $customer->email }}
                    </td>
                    <td>
                       {{ $customer->address }}
                    </td>
                    <td>
                       {{ $customer->phone }}
                    </td>
                    <td>
                        <ul>
                            @foreach($customer->orders as $oder)
                            <li><span>{{$oder->name}}</span></li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach($customer->orders as $oder)
                            <li><span>{{$oder->quantity}}</span></li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach($customer->orders as $oder)
                            <li><span>{{ number_format($oder->total, 0, '.', '.')}} VND</span></li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        @php
                        $total= 0;
                         foreach($customer->orders as $oder){
                            $total += $oder->total;
                         };
                        @endphp
                            {{number_format($total, 0, '.', '.')}}  VND 
                        </td>
              
                    <td class="project-state">
                        {{ date('d-M-Y', strtotime($customer->created_at))}}
                    </td>
                    <td class="project-state">
                        <a href="/admin/destroy/{{$customer->id}}"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
                @endforeach 
            </tbody>
        </table>
        <div style="float: right">
          {{ $customers->links() }}
        </div>
      
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    
  </section>
@endsection
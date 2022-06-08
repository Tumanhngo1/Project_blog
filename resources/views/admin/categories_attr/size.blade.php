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
            <h3 class="card-title">Thuoc tinh san pham</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
        <form action="/admin/size/{{$product->slug}}" method="POST">
            @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="">Tên san pham</label>
                  <input type="hidden" name="product_id" value="{{$product->id}}">
                  <section>
                    <option name="product_id" value="{{$product->id}}">{{$product->title}}</option>
                  </section>
                </div>
                
                <div class="form-group">
                  <label for="">Size</label>
                  <input type="text" name="size" value="" />
              
                  
                     @error('size')
                     <span  style="color: red">{{ $message }}</span>
                     @enderror
                </div>
              
              </div>
              <div class="row">
                <div class="col-12">
                  <a href="/admin/products" class="btn btn-secondary">Cancel</a>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

  // $("#changeName").change(function(){
  //   var ip = $('#changeName').val();
  //   if(ip == 'size'){
  //     $('.value2').show();
  //     $('.value1').hide();
  //   }
  //   else{
  //     $('.value1').show();
  //     $('.value2').hide();
  //   }
  // });
</script>
@endsection
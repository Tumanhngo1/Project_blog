@extends('users.layouts.home')

@section('content')
    <div id='nav-search'>
        <form action='/products/?search' class='search-form' role='search'>
            <input autocomplete='off' class='search-input' name='search' placeholder='Search this blog' type='search'
                value='' />
            <span class='hide-search'></span>

        </form>
    </div>
    <span class="ajax-message"></span>

    <div class="container-fluid mt-3 mb-3">
        <div class="row g-2">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card">
                        <div class="img-container">
                            <div class="d-flex justify-content-between align-items-center p-2 first">
                                <span class="percent">-25%</span> <span class="wishlist">
                                    <i class="fa fa-heart"></i></span>
                            </div> <img style="height:200px" src="{{ asset('storage/' . $product->image) }}" class="img-fluid">
                        </div>
                        <div class="product-detail-container">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="/products/{{ $product->slug }}">
                                    <h6 class="mb-0">{{ $product->title }}</h6> <span
                                        class="text-danger font-weight-bold">
                                </a>
                                {{ number_format($product->price, 0, '.', '.') }} đ</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <div class="ratings"> <i class="fa fa-star"></i> <span>4.5</span> </div>
                                <div class="">
                                    <label class="size">Size:</label>
                                    <select name="size" id="">
                                        @foreach ($product->sizes as $size)
                                            <option value="{{ $size->id }}">{{ $size->size }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-primary add-to-cart mt-2"
                                    data-id="{{ route('addToCart', $product->id) }}" data-toggle="modal"
                                    data-target="#myModal">Buy Now</button>
                                {{-- <a class="btn btn-info add-to-cart" data-id="{{ route('addToCart',$product->id) }}" href="#"><i class="fa-solid fa-cart-plus"></i></a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    


    {{-- <form action="{{route('payment')}}" method="POST">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h4>Thong tin mua hang</h4>
                    <div class="form-group">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Ho va Ten">
                    </div>
                    <div class="form-group">
                        <input type="text" id="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" cols="30" class="form-control" rows="10"></textarea>
                    </div>
                </div>
                <div class="col-6">
                    <h4>Thanh toan</h4>
                    <select name="pay" id="" class="form-control">
                        <option value="0">Thanh toan khi giao hang (COD)</option>
                        <option value="1">Chuyen khoan qua ngan hang</option>
                    </select>

                </div>
             
            </div>
            <div>
                <button type="submit" style="float: right" class="btn btn-success mb-3">Dat mua</button>
            </div>

        </div> 

    </form> --}}





    <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
      
              </div>
              <div class="view-render">
            </div>
              <div class="modal-body"> 
            <div class="modal-footer">
                <div>
                    <a class="btn btn-success" style="color: white" href="{{route('cart')}}">di toi gio hang</a>
                </div>
                {{-- <button class="btn btn-info payment" >Thanh toan</button> --}}
                <a href="/paymet-carts" class="btn btn-info" style="color: white">Thanh toan</a>
              </div>
              <div style="display: none" class="pay">
                <hr>
                {{-- @include('users.carts.payment') --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

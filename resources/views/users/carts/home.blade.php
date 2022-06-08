@extends('users.layouts.home')

@section('content')
    <div id='nav-search'>
        <form action='/products/?search' class='search-form' role='search'>
            <input autocomplete='off' class='search-input' name='search' placeholder='Search this blog' type='search'
                value='' />
            <span class='hide-search'></span>
        </form>
    </div>
   
    <div class="view-render">
        @include('users.carts.row')
        {{-- <table class="table mt-5" id="render">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">san pham</th>
                    <th scope="col">title</th>
                    <th scope="col">price</th>
                    <th scope="col">so luong</th>
                    <th scope="col">total</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            @php
                $total = 0;
            @endphp
            @if (Session::has('cart'))
                <tbody>
                    @foreach (Session::get('cart') as $id => $cart)
                    <tr id="cart_update" data-id="{{ $id }}">
                        <tr  data-id="{{$id}}">
                            <th scope="row">{{ $id }}</th>
                            <td style="width: 15%">
                                <img style="width:100%" src="{{ asset('storage/' . $cart['image']) }}" alt="">
                            </td>
                            <td style="width: 20%">{{ $cart['name'] }}</td>
                            <td id="price" price="{{ $cart['price'] }}">{{ number_format($cart['price'], '0', '.', '.') }}
                                VND
                            </td>
                            <td>
                                <div id="btn-qt">
                                    <button class="btn-qty discount update" data-id="{{ $id }}"
                                        data="{{ $id }}" id="add">-</button>
                                    <input type="number" data="{{ $id }}" id="qty_{{ $id }}"
                                        value="{{ $cart['quantity'] }}" min="0" class="update-cart"
                                        data-url="{{ route('update') }}">
                                    <button class="btn-qty increase update " data-id="{{ $id }}"
                                        data="{{ $id }}" id="add">+</button>
                                </div>
            
                            </td>
                            <td class="total" total-cart="{{ $cart['price'] * $cart['quantity'] }}">
                                {{ number_format($cart['price'] * $cart['quantity'], '0', '.', '.') }} VND
                            </td>
                            <td>
                                <a class="delete" data-url="{{ route('delete') }}" data-id="{{ $id }}"
                                    href=""><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                 
                        </tr>
    
                        @php
                            $total += $cart['price'] * $cart['quantity'];
                        @endphp
                    @endforeach
    
                </tbody>
            @endif
    
    
        </table>
        
        <div class="col-12" id="cart_total" style="text-align: right">
            <h3>Total: {{ number_format($total, '0', '.', '.') }} VND</h3> --}}
        {{-- </div> --}}
    </div>
    
    <hr>
    <div style="float: right" class="mb-5">
        <a class="btn btn-success" style="color: white" href="/products">mua tiep</a>
        {{-- <button class="btn btn-info payment">Thanh toan</button> --}}
        <a href="/paymet-carts" class="btn btn-info" style="color: white">Thanh toan</a>
    </div>

    <br>
    <div style="display: none" class=" pay">

        {{-- @include('users.carts.payment') --}}


    </div>
    @if (Session::has('resent_products'))
        <div class="container">
            <div class="row">
                <div class="border text-center mt-5" style="margin: 0 auto; width:70%; background:#b4cbd7">
                    <h3>San pham vua xem</h3>
                </div>
                @foreach (Session::get('resent_products') as $item)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="img-container">
                                <div class="d-flex justify-content-between align-items-center p-2 first"> <span
                                        class="percent">-15%</span>
                                    <span class="wishlist"><i class="fa fa-heart"></i></span>
                                </div>
                                <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid">
                            </div>
                            <div class="product-detail-container">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">{{ $item->title }}</h6> <span
                                        class="text-danger font-weight-bold">{{ number_format($item->price) }} VND</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <div class="ratings"> <i class="fa fa-star"></i> <span>4.5</span> </div>
                                    <div class="size"> <label class="radio"> <input type="radio"
                                                name="size2" value="small"> <span>S</span> </label> <label
                                            class="radio"> <input type="radio" name="size2" value="Medium" checked>
                                            <span>M</span> </label> <label class="radio"> <input type="radio"
                                                name="size2" value="Large"> <span>L</span> </label> </div>
                                </div>
                                <div class="mt-3">
                                    <a href="/products/{{ $item->slug }}" class="btn btn-danger"
                                        style="color: #b4cbd7">Buy Now</a>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script>
    $('.btn-qty').click(function(){
        var key = $(this).attr('data');
        // var id = $('#id_' + key).val();
        var qty = $('#qty_' + key).val();
        // alert('id:'+id + 'qty: '+qty);
        if($(this).hasClass('discount')){
            $(this).parents('tr').find('input').val(parseInt(qty) - 1)
            //  updateCart(id,parseInt(qty) - 1 )
        }
        else if($(this).hasClass('increase')){
            $(this).parents('tr').find('input').val(parseInt(qty) + 1)
            //  updateCart(id,parseInt(qty) + 1 )
        }
    })
</script> --}}

@endsection

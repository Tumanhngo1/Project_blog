@extends('users.layouts.home')

@section('content')
    <div class="container">

        <form action="{{ route('payment') }}" method="POST">
            @csrf
            <div class="row mt-5">
                <div class="col-4">
                    <h4>Thong tin mua hang</h4>
                    @auth
                    <div class="form-group">
                        <input type="text" id="name" name="name" value="{{Auth::user()->name}}" class="form-control" placeholder="Ho va Ten">
                    </div>
                    <div class="form-group">
                        <input type="text" id="email" name="email" value="{{Auth::user()->email}}" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <textarea name="address" id="address" cols="30" class="form-control" rows="10" placeholder="Dia chi"></textarea>
                        {{-- <select name="calc_shipping_provinces" class="form-control" >
                            <option value="">Tỉnh / Thành phố</option>
                          </select>
                          <select name="calc_shipping_district" class="form-control" >
                            <option value="">Quận / Huyện</option>
                          </select>
                          <input class="billing_address_1" name="" type="hidden" value="">
                          <input class="billing_address_2" name="" type="hidden" value=""> --}}
                    </div>
              
                    @else 
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
                        <textarea name="address" id="address" cols="30" class="form-control" rows="10" placeholder="Dia chi"></textarea>
                        {{-- <select name="calc_shipping_provinces" class="form-control" >
                            <option value="">Tỉnh / Thành phố</option>
                          </select>
                    </div> 
                    <div class="form-group">
                        <select name="" id="" class="form-control">
                            <option value="">Quận / Huyện</option>
                        </select> --}}
                    </div>
                    
                    @endauth
                   
                </div>
                <div class="col-4">
                    <h4>Thong tin san pham</h4>
                    <table class="table" id="render">
                        <thead>
                            <tr>
                                <th scope="col">title</th>
                                <th scope="col">so luong</th>
                                <th scope="col">total</th>

                            </tr>
                        </thead>
                        @php
                            $total = 0;
                        @endphp
                        @if (Session::has('cart'))
                            <tbody>
                                @foreach (Session::get('cart') as $id => $cart)
                                    <tr>
                                        <td style="width: 20%">{{ $cart['name'] }}</td>
                                        <td>{{ $cart['quantity'] }}</td>
                                        <td class="total">
                                            {{ number_format($cart['price'] * $cart['quantity'], '0', '.', '.') }} VND
                                        </td>

                                    </tr>
                                    @php
                                        $total += $cart['price'] * $cart['quantity'];
                                    @endphp
                                @endforeach
                            </tbody>
                        @endif
                    </table>

                </div>
                <div class="col-4">
                    <div class="form-group">
                        <h4>Thanh toan</h4>
                        <select name="pay" id="pay"  class="form-control">
                            <option value="30000">Thanh toan khi giao hang (COD)</option>
                            <option value="">Chuyen khoan qua ngan hang</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" name="coupon" class="form-control" placeholder="Nhap ma giam gia">
                    </div>

                    <div>
                        <span>Tam tinh: {{number_format($total)}} VND</span>
                    </div>
                    <div class="ship">
                        <span>Phi van chuyen:</span>
                    </div>
                    <hr>
                    <div>
                        <span>Tong thanh toan: {{ number_format($total) }} VND </span>
                    </div>
                </div>
            </div>
            <button class="btn btn-secondary mb-4" style="float: right">Thanh toan</button>
        </form>

    </div>
    <script>
      
    </script>
@endsection

<table class="table" id="render">
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
    {{-- @if(Session::has('cart')) --}}
        <tbody>
            @foreach (Session::get('cart') as $id => $cart)
        
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
                        <button class="btn-qty discount update" data-url="{{route('update')}}" data-id="{{ $id }}"
                            data="{{ $id }}" id="add">-</button>
                        <input type="number" data="{{ $id }}" id="qty_{{ $id }}"
                            value="{{ $cart['quantity'] }}" min="0" class="update-cart"
                            data-url="{{ route('update') }}">
                        <button class="btn-qty increase update " data-url="{{route('update')}}"  data-id="{{ $id }}"
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
                        @php
                            $total += $cart['price']*$cart['quantity'];   
                        @endphp
                @endforeach
        </tbody>
    {{-- @endif --}}
</table> 
<div class="col-12 " id="total_cart">
    <h3>Total: {{ number_format($total)}} VND</h3>
</div>
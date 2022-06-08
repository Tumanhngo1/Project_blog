<div>
    {{-- @dd($user->orders) --}}
    <p>Xin chào {{ $user->name }}</p>

    <p>Đơn hàng của bạn đã được giao thành công.

        Vui lòng đăng nhập để xác nhận bạn đã nhận hàng và hài lòng với sản phẩm trong vòng 7 ngày.
        Nếu bạn không xác nhận trong khoảng thời gian này, chung toi cũng sẽ thanh toán cho Người bán.
    </p>
    <p style="text-align: center">
        {{-- <a href="{{ route('confirm',['token'=>$user->token, 'customer'=>$user->id ]) }}" 
        style="display: inline-block; background:green; color:#ffff; padding:7px 25px">
        Xac nhan don hamg</a> --}}
    </p>
</div>
<table class="table mt-5" id="render" border="1" cellspacing="0" cellpadding="10" style="width: 100%">
    <thead>
        <tr>
            <th scope="col">san pham</th>
            <th scope="col">so luong</th>
            <th scope="col">tong tien</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user->orders as $id => $user)
            <tr>
                <td style="width: 20%">{{ $user['name'] }}</td>
                </td>{{ $user['quantity'] }}
                </td>
                <td>{{ number_format($user['total'], '0', '.', '.') }} VND</td>
            </tr>
        @endforeach

    </tbody>
</table>
<div>
    <p style="text-align: center">
        {{-- <a href="{{ route('confirm',['token'=>$user->token, 'customer'=>$user->id ]) }}" 
        style="display: inline-block; background:green; color:#ffff; padding:7px 25px">
        Xac nhan don hamg</a> --}}
    </p>
</div>

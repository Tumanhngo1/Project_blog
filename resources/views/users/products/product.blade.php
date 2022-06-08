@extends('users.layouts.home')

@section('content')
    <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">

                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1"><img src="{{ asset('storage/' . $product->image) }}" />
                            </div>
                            <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252" /></div>
                            <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252" /></div>
                            <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252" /></div>
                            <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252" /></div>
                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                            <li class="active"><a data-target="#pic-1" data-toggle="tab"><img
                                        src="http://placekitten.com/200/126" /></a></li>
                            <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a>
                            </li>
                            <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a>
                            </li>
                            <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a>
                            </li>
                            <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a>
                            </li>
                        </ul>

                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title">{{ $product->title }}</h3>
                        <div class="rating">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="review-no">41 reviews</span>
                        </div>

                        <h4 class="price">current price: <span>{{ number_format($product->price) }} VND</span>
                        </h4>
                        <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87
                                votes)</strong></p>
                        <h5 class="sizes">sizes:
                            <select name="size" id="">
                                @foreach ($product->sizes as $size)
                                    <option value="{{ $size->id }}">{{ $size->size }}</option>
                                @endforeach
                            </select>
                        </h5>
                        <h5 class="colors">colors:

                            <div class="form-group">
                                @foreach ($product->colors as $color)
                                    <input type="radio" class="form-control col-md-3"
                                        style="background: {{ $color->color }}" name="color{{ $color->id }}"
                                        value="30">
                                    {{-- <span style="color:  {{$color->color}}">x</span> --}}
                                @endforeach

                            </div>

                        </h5>
                        {{-- <div class="action"> --}}
                        <button class="btn btn-default add-to-cart " data="{{ $product->id }}"
                            data-id="{{ route('addToCart', $product->id) }}" type="button" data-toggle="modal"
                            data-target="#myModal">add to cart</button>
                        <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                    </div>
                </div>
                <div class="border mt-4">
                    <p class="product-description">{!! $product->description !!}</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
        <div class="border mt-2">
            @auth
                <form method="post" action="/products/{{ $product->slug }}/comments">
                    @csrf
                    <header class="flex items-center">
                        <h5>{{ ucfirst(auth()->user()->name) }}</h5>
                    </header>
                    <div class="form-group">
                        <textarea name="body" id="" class="form-control" cols="" rows="" required></textarea>
                    </div>
                    @error('body')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                    <div style="float: right">
                        <button type="submit" class="btn btn-success mt-3">send</button>
                    </div>
                </form>
            @endauth
            @foreach ($product->productcoments as $comment)
                <section>
                    <article class="flex">
                        <div>
                            <span class="font-bold">{{ ucfirst($comment->author->name) }} :</span>
                            <time class='post-date published'
                                datetime='2018-06-27T20:23:00-07:00'>{{ $comment->created_at->diffForHumans() }}</time>
                        </div>
                        <div>
                            <p>
                                {{ $comment->body }}
                            </p>
                        </div>
                    </article>
                </section>
            @endforeach
        </div>
    </div>
    <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                        <div class="view-render">

                        </div>
                        <div class="modal-footer">
                            <div>
                                <a class="btn btn-success" style="color: white" href="{{ route('cart') }}">di toi gio
                                    hang</a>
                            </div>
                            {{-- <button class="btn btn-info payment">Thanh toan</button> --}}
                            <a href="/paymet-carts" class="btn btn-info" style="color: white">Thanh toan</a>
                        </div>
                        <div style="display: none" class=" pay">
                            <hr>
                            {{-- @include('users.carts.payment') --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    </div>
@endsection

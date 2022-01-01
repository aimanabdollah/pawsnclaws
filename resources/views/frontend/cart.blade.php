@extends('layouts.front')

@section('title')
    My Cart
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a> /
                <a href="{{ url('cart') }}">
                    Cart
                </a>

            </h6>
        </div>
    </div>

    <div class="container my-5">
        <div class="card shadow product_data">
            <div class="card-body">
                <h3>Shopping Cart</h3>
                @php
                    $total = 0;
                    $count = 0;
                @endphp
                <hr>
                <div class="row mt-4">
                    <div class="col-md-1 my-auto">
                        <h6>
                            <center>No.</center>
                        </h6>
                    </div>
                    <div class="col-md-4 my-auto">
                        <h6>
                            Product Name
                        </h6>
                    </div>
                    <div class="col-md-2 my-auto">
                        <h6>Price</h6>
                    </div>
                    <div class="col-md-2 my-auto">
                        <h6>Total Price</h6>
                    </div>
                    <div class="col-md-1 my-auto">
                        <h6>Quantity</h6>
                    </div>
                    <div class="col-md-2 my-auto"></div>
                </div>
                <hr>


                @foreach ($cartitems as $item)
                    <div class="row product_data mt-2">

                        <div class="col-md-1 my-auto">
                            <center>
                                {{ $count = $count + 1 }}.</center>
                        </div>

                        <div class="col-md-1 my-auto">
                            <img src="{{ asset('assets/uploads/products/' . $item->products->image) }}" height="70px"
                                width="70px" alt="">
                        </div>

                        <div class="col-md-3 my-auto">
                            <h6>{{ $item->products->name }}</h6>
                        </div>

                        <div class="col-md-2 my-auto">
                            <h6>RM
                                {{ number_format($price = $item->products->original_price * (1 - $item->products->selling_price / 100), 2) }}
                            </h6>
                        </div>

                        <div class="col-md-2 my-auto">
                            @php
                                $price = $item->products->original_price * (1 - $item->products->selling_price / 100) * $item->prod_qty;
                            @endphp
                            <h6>RM{{ number_format($price, 2) }}</h6>
                        </div>

                        <div class="col-md-1 my-auto">

                            <input type="hidden" value="{{ $item->prod_id }}" class="prod_id">
                            @if ($item->products->qty >= $item->prod_qty)
                                <label for="Quantity"></label>
                                <div class="input-group text-center mb-3" style="width:80px;">

                                    {{-- <button type="button" class="decrement-btn input-group-text changeQuantity"
                                        data-type="minus" data-field="">-
                                    </button>
                                    <input type="number" id="quantity" name="quantity"
                                        class="form-control input-number text-center" value="{{ $item->prod_qty }}" min="1"
                                        max="10">
                                    <button type="button" class="increment-btn input-group-text changeQuantity" data-type="plus"
                                        data-field="">+
                                    </button> --}}

                                    <input type="number" id="qty-input" class="form-control changeQuantity text-center"
                                        value="{{ $item->prod_qty }}" min="1" max="{{ $item->products->qty }}" step="1"
                                        name="qty">

                                    {{-- <button class="input-group-text changeQuantity decrement-btn">-</button>
                                    <input type="text" name="quantity" class="form-control qty-input text-center"
                                        value="{{ $item->prod_qty }}">
                                    <button class="input-group-text changeQuantity increment-btn">+</button> --}}

                                </div>
                                @php
                                    $total += $price;
                                @endphp

                            @else
                                <span class="badge rounded-pill bg-danger float-start">Out of Stock</span>
                            @endif
                        </div>

                        <div class="col-md-2 my-auto">
                            <button class="btn btn-danger delete-cart-item" style="margin-left: 30px"><i
                                    class="fa fa-trash"></i>
                                Remove</button>
                        </div>
                    </div>

                @endforeach
            </div>
            <div class="card-footer">
                <h6>Total Amount: RM{{ number_format($total, 2) }}


                    <a href="/"><button class="btn btn-success float-end">Continue Shopping</button></a>
                </h6>
                @if ($count > 0)
                    <a href="{{ url('checkout') }}"><button class="btn btn-danger">Proceed to Checkout</button></a>
                @endif
            </div>
        </div>
    </div>
@endsection

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
                @endphp

                @foreach ($cartitems as $item)
                    <div class="row product_data mt-4">
                        <div class="col-md-2 my-auto">
                            <img src="{{ asset('assets/uploads/products/' . $item->products->image) }}" height="70px"
                                width="70px" alt="">
                        </div>
                        <div class="col-md-3 my-auto">
                            <h6>{{ $item->products->name }}</h6>
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6>RM {{ $item->products->selling_price }}</h6>
                        </div>
                        <div class="col-md-3 my-auto">
                            <input type="hidden" value="{{ $item->prod_id }}" class="prod_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3" style="width:130px;">

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
                                    value="{{ $item->prod_qty }}" min="1" max="10" step="1" name="qty">

                                {{-- <button class="input-group-text changeQuantity decrement-btn">-</button>
                                <input type="text" name="quantity" class="form-control qty-input text-center"
                                    value="{{ $item->prod_qty }}">
                                <button class="input-group-text changeQuantity increment-btn">+</button> --}}

                            </div>
                        </div>
                        <div class="col-md-2 my-auto">
                            <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Remove</button>
                        </div>
                    </div>
                    @php
                        $total += $item->products->selling_price * $item->prod_qty;
                    @endphp
                @endforeach
            </div>
            <div class="card-footer">
                <h6>Total Price: RM{{ $total }}

                    <button class="btn btn-outline-success float-end">Proceed to Checkout</button>
                </h6>
            </div>
        </div>
    </div>
@endsection

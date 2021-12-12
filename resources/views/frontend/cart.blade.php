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
                @foreach ($cartitems as $item)

                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{ asset('assets/uploads/products/' . $item->products->image) }}" height="70px"
                                width="70px" alt="">
                        </div>
                        <div class="col-md-5">
                            <h6>{{ $item->products->name }}</h6>
                        </div>
                        <div class="col-md-3">
                            <input type="hidden" class="prod_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3" style="width:130px;">
                                <span class="input-group-btn">
                                    <button type="button" class="quantity-left-minus btn btn-primary btn-number"
                                        data-type="minus" data-field="">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </span>
                                <input type="text" id="quantity" name="quantity"
                                    class="form-control input-number text-center" value="{{ $item->prod_qty }}" min="1"
                                    max="10">
                                <span class="input-group-btn">
                                    <button type="button" class="quantity-right-plus btn btn-primary btn-number"
                                        data-type="plus" data-field=""> <i class="fa fa-plus"></i>
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <h3>Remove</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

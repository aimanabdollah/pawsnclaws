@extends('layouts.front')

@section('title', $products->name)

@section('content')

    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('category') }}">
                    Collections
                </a> /
                <a href="{{ url('category/' . $products->category->slug) }}">
                    {{ $products->category->name }}
                </a> /
                <a href="{{ url('category/' . $products->category->slug . '/' . $products->slug) }}">
                    {{ $products->name }}
                </a>
            </h6>
        </div>
    </div>


    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/products/' . $products->image) }}" height="350px" width="350px"
                            alt="">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $products->name }}
                            @if ($products->popular == '1')
                                <label style="font-size: 16px;"
                                    class="float-end badge bg-danger trending_tag">Featured</label>

                            @endif
                        </h2>

                        <hr>
                        <label class="me-3"><b>Price: </b><s> RM {{ $products->original_price }}</s></label>
                        <label class="fw-bold">RM {{ $products->selling_price }}</label>
                        <p class="mt-3">
                            <b>Brand: </b>{{ $products->small_description }}
                        </p>
                        <p class="mt-3">
                            <b>Category: </b>{{ $products->category->name }}
                        </p>

                        <hr>
                        @if ($products->qty > 0)
                            <label class="badge bg-success">In stock</label>
                        @else
                            <label class="badge bg-danger">Out of stock</label>
                        @endif

                        {{-- <input type="hidden" class="productid" value="{{ $products->id }}"> --}}
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width:130px;">

                                    {{-- <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" class="form-control qty-input text-center" value="1">
                                    <button class="input-group-text increment-btn">+</button> --}}

                                    <button type="button" class="decrement-btn input-group-text" data-type="minus"
                                        data-field="">-

                                    </button>

                                    <input type="text" id="quantity" name="quantity"
                                        class="form-control input-number text-center" value="1" min="1" max="10">

                                    <button type="button" class="increment-btn input-group-text" data-type="plus"
                                        data-field="">+
                                    </button>

                                </div>
                            </div>
                            <div class="col-md-9">
                                <br />
                                <button type="button" class="btn btn-danger me-3 addToCartBtn float-start">Add to Cart
                                    <i class="fa fa-shopping-cart"></i></button>
                                <button type="button" class="btn btn-success me-3 float-start">Add to Wishlist <i
                                        class="fa fa-heart"></i></button>
                            </div>
                        </div>

                    </div>
                </div>
                <hr>
                <h4>Description</h4>
                {{ $products->description }}
                <div class="col-lg-2">
                    <div class="input-group">

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

{{-- @section('scripts')
    <script>
        // $(document).ready(function() {
        //     $('.increment-btn').click(function(e) {
        //         e.preventDefault();

        //         var inc_value = $('.qty-input').val();
        //         var value = parseInt(inc_value, 10);
        //         value = isNan(value) ? 0 : value;
        //         if (value < 10) {
        //             value++;
        //             $('.qty-input').val(value);
        //         }
        //     });
        // });

        $(document).ready(function() {

            $('.addToCartBtn').click(function(e) {
                e.preventDefault();

                var product_id = $(this).closest('.product_data').find('.prod_id').val();
                var product_qty = $(this).closest('.product_data').find('.input-number').val();

                // alert(product_id);
                // alert(product_qty);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/add-to-cart",
                    data: {
                        'product_id': product_id,
                        'product_qty': product_qty,
                    },
                    success: function(response) {
                        swal(response.status);

                    }
                });
            });

            var quantitiy = 0;
            $('.quantity-right-plus').click(function(e) {

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

            });

            $('.quantity-left-minus').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });
    </script>

@endsection --}}

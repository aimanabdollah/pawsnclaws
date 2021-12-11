@extends('layouts.front')

@section('title', $products->name)

@section('content')

    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">Collections / {{ $products->category->name }} / {{ $products->name }}</h6>
        </div>
    </div>


    <div class="container">
        <div class="card shadow">
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
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width:130px;">

                                    {{-- <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" class="form-control qty-input text-center" value="1">
                                    <button class="input-group-text increment-btn">+</button> --}}
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-primary btn-number"
                                            data-type="minus" data-field="">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="quantity"
                                        class="form-control input-number text-center" value="0" min="1" max="10">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-primary btn-number"
                                            data-type="plus" data-field=""> <i class="fa fa-plus"></i>
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                    </span>




                                </div>
                            </div>
                            <div class="col-md-9">
                                <br />
                                <button type="button" class="btn btn-success me-3 float-start">Add to Wishlist <i
                                        class="fa fa-heart"></i></button>
                                <button type="button" class="btn btn-danger me-3 float-start">Add to Cart <i
                                        class="fa fa-shopping-cart"></i></button>
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

@section('scripts')
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

@endsection

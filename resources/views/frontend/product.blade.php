@extends('layouts.front')

@section('title')
    Product
@endsection


@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>All Products</h2>


                    <div class="row">
                        @foreach ($products as $prod)
                            <div class="col-md-3 mb-3">
                                <a href="{{ url('product/' . $prod->slug) }}">
                                    <div class="card">
                                        <img src="{{ asset('assets/uploads/products/' . $prod->image) }}"
                                            alt="Category Image" style="height: 250px">
                                        <div class="card-body">
                                            <h5>{{ $prod->name }}</h5>
                                            <span style="margin:3px;"
                                                class="badge rounded-pill bg-danger float-start">RM{{ $prod->selling_price }}</span>
                                            <span style="margin:3px;"
                                                class="badge rounded-pill bg-warning text-dark float-start">{{ $prod->small_description }}</span>
                                            <span style="margin:3px;"
                                                class="badge rounded-pill bg-info text-dark float-end">{{ $prod->category->name }}</span>

                                        </div>
                                    </div>
                                </a>

                            </div>
                        @endforeach
                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.front')

@section('title')
    Product
@endsection


@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('product') }}">
                    Collections /
                </a>
            </h6>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>All Products

                        <div class="row g-3  align-items-center mt-2 mb-2">
                            <div class="col-lg-12">
                                <form action="/product" method="GET">
                                    <span class="input-group-text border-1 float-start" id="search-addon">
                                        <input type="search" id="inputPassword6" name="search" class="form-control"
                                            aria-describedby="passwordHelpInline" placeholder="Search Product Name Here"
                                            minlength="3" maxlength="10" style="width:308px">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fa fa-search"></i></button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </h2>

                    <div class="row">
                        {{-- @foreach ($products as $prod)
                            <div class="col-md-3 mb-3">
                                <a href="{{ url('category/' . $prod->category->slug . '/' . $prod->slug) }}">
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
                        @endforeach --}}

                        @forelse ($products as $prod)
                            @php
                                $price_after_discount = 0;
                                $int = 1;
                                $int2 = 100;
                                $price_after_discount = $prod->original_price * ($int - $prod->selling_price / $int2);
                            @endphp
                            <div class="col-md-3 mb-3 mt-3">
                                <a href="{{ url('category/' . $prod->category->slug . '/' . $prod->slug) }}">
                                    <div class="card">
                                        <img src="{{ asset('assets/uploads/products/' . $prod->image) }}"
                                            alt="Product Image" style="height: 250px">
                                        <div class="card-body">
                                            <h5>{{ $prod->name }}</h5>


                                            @if ($prod->selling_price > 0)
                                                <h5>
                                                    <span style="margin:3px;"
                                                        class="badge rounded-pill bg-danger float-start"><s>RM{{ $prod->original_price }}</s></span>
                                                </h5>
                                                <h5> <span style="margin:3px;"
                                                        class="badge rounded-pill bg-info text-dark float-start">RM{{ number_format($price_after_discount, 2) }}</span>
                                                </h5>

                                                <h5> <span style="margin:3px;"
                                                        class="badge rounded-pill bg-warning text-dark float-end">{{ number_format($prod->selling_price, 0) }}%
                                                        OFF</span> </h5>

                                            @else
                                                <h5><span style="margin:3px;"
                                                        class="badge rounded-pill bg-danger float-start">RM{{ $prod->original_price }}</span>
                                                </h5>
                                            @endif

                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty

                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                No results found for <strong>{{ request()->query('search') }}.</strong> Please try to
                                search
                                again.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endforelse

                    </div>



                </div>
            </div>
        </div>
    </div>
    @include('layouts.inc.frontendfooter')
@endsection

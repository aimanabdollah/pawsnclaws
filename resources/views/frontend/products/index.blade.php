@extends('layouts.front')

@section('title')
    {{ $category->name }}
@endsection


@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('category') }}">
                    Collections
                </a> /
                <a href="{{ url('category/' . $category->slug) }}">
                    {{ $category->name }}
                </a>
            </h6>
        </div>
    </div>


    <div class="py-5">
        <div class="container">

            <div class="row">

                <h2>{{ $category->name }}</h2>
                {{-- @foreach ($products as $prod)
                    <div class="col-md-3 mt-3">
                        <a href="{{ url('category/' . $category->slug . '/' . $prod->slug) }}">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/products/' . $prod->image) }}" alt="Product Image"
                                    style="height: 250px">
                                <div class="card-body">

                                    <h5>{{ $prod->name }}</h5>

                                    <span
                                        class="badge rounded-pill bg-danger float-start">RM{{ $prod->selling_price }}</span>
                                    <span
                                        class="badge rounded-pill bg-info text-dark float-end">{{ $prod->small_description }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach --}}

                @foreach ($products as $prod)
                    @php
                        $price_after_discount = 0;
                        $int = 1;
                        $int2 = 100;
                        $price_after_discount = $prod->original_price * ($int - $prod->selling_price / $int2);
                    @endphp
                    <div class="col-md-3 mt-3">
                        <a href="{{ url('category/' . $prod->category->slug . '/' . $prod->slug) }}">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/products/' . $prod->image) }}" alt="Product Image"
                                    style="height: 250px">
                                <div class="card-body shadow">
                                    <h5>{{ $prod->name }}</h5>
                                    @if ($prod->selling_price > 0)
                                        <h5><span style="margin:3px;"
                                                class="badge rounded-pill bg-danger float-start"><s>RM{{ $prod->original_price }}</s></span>
                                        </h5>
                                        <h5><span style="margin:3px;"
                                                class="badge rounded-pill bg-info text-dark float-start">RM{{ number_format($price_after_discount, 2) }}</span>
                                        </h5>
                                        <h5><span style="margin:3px;"
                                                class="badge rounded-pill bg-warning text-dark float-end">{{ number_format($prod->selling_price, 0) }}%
                                                OFF</span></h5>

                                    @else
                                        <h5><span style="margin:3px;"
                                                class="badge rounded-pill bg-danger float-start">RM{{ $prod->original_price }}</span>
                                        </h5>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

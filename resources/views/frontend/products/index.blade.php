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
                @foreach ($products as $prod)
                    <div class="col-md-3 mt-3">
                        <div class="card">
                            <img src="{{ asset('assets/uploads/products/' . $prod->image) }}" alt="Product Image"
                                style="height: 250px">
                            <div class="card-body">
                                <a href="{{ url('category/' . $category->slug . '/' . $prod->slug) }}">
                                    <h5>{{ $prod->name }}</h5>
                                </a>
                                <span class="badge rounded-pill bg-danger float-start">RM{{ $prod->selling_price }}</span>
                                <span
                                    class="badge rounded-pill bg-info text-dark float-end">{{ $prod->small_description }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

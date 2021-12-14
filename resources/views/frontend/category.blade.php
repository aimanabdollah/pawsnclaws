@extends('layouts.front')

@section('title')
    Category
@endsection


@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>All Categories</h2>
                    <div class="row g-3 align-items-center mt-2 mb-2">
                        <div class="col-auto">
                            <form action="/category" method="GET">
                                <input type="search" id="inputPassword6" name="search" class="form-control"
                                    aria-describedby="passwordHelpInline" placeholder="Search Category Name Here"
                                    style="width:308px;">
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($category as $cate)
                            <div class="col-md-3 mb-3">
                                <a href="{{ url('category/' . $cate->slug) }}">
                                    <div class="card">
                                        <img src="{{ asset('assets/uploads/category/' . $cate->image) }}"
                                            alt="Category Image" style="height: 250px">
                                        <div class="card-body">
                                            <h5>{{ $cate->name }}</h5>
                                            <p>
                                                {{ $cate->description }}
                                            </p>
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

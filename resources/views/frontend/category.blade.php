@extends('layouts.front')

@section('title')
    Category
@endsection


@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>All Categories

                        <div class="row g-3  align-items-center mt-2 mb-2">
                            <div class="col-lg-12">
                                <form action="/category" method="GET">
                                    <span class="input-group-text border-1 float-start" id="search-addon">
                                        <input type="search" id="inputPassword6" name="search" class="form-control"
                                            aria-describedby="passwordHelpInline" placeholder="Search Category Name Here"
                                            style="width:308px"> <i class="fa fa-search" style="margin-left: 13px"></i>
                                </form>
                            </div>
                        </div>
                    </h2>
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

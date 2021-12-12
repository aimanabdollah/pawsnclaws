@extends('layouts.front')

@section('title')
    Welcome to Paws'n Claws
@endsection

@section('content')
    @include('layouts.inc.slider')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Featured Product</h2>
                <div class="owl-carousel featured_carousel owl-theme">
                    @foreach ($featured_products as $prod)
                        <div class="item">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/products/' . $prod->image) }}" alt="Product Image"
                                    style="height: 250px">
                                <div class="card-body shadow">
                                    <h5>{{ $prod->name }}</h5>
                                    <span style="margin:3px;"
                                        class="badge rounded-pill bg-danger float-start">RM{{ $prod->selling_price }}</span>
                                    <span style="margin:3px;"
                                        class="badge rounded-pill bg-warning text-dark float-start"><s>RM{{ $prod->original_price }}</s></span>
                                    <span style="margin:3px;"
                                        class="badge rounded-pill bg-info text-dark float-end">{{ $prod->category->name }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <h2>Featured Category</h2>
                <div class="owl-carousel featured_carousel owl-theme">
                    @foreach ($featured_category as $category)
                        <div class="item">
                            <a href="{{ url('category/' . $category->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/category/' . $category->image) }}"
                                        alt="Category Image" style="height: 250px">
                                    <div class="card-body shadow">
                                        <h5>{{ $category->name }}</h5>
                                        <p>{{ $category->description }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    @endsection

    @section('scripts')
        <script>
            $('.featured_carousel').owlCarousel({
                loop: true,
                margin: 15,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    }
                }
            });
        </script>

    @endsection

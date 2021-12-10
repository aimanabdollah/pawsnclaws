@extends('layouts.front')

@section('title')
    Welcome to Paws'n Claws
@endsection

@section('content')
    @include('layouts.inc.slider')
    
    <div class="py-5">
        <div class="container">
            <div class="row">

                {{-- <div class="owl-carousel featured_carousel owl-theme">
                     @foreach ($featured_products as $prod)
                        <div class="item">
                            <div class="card" >
                                <img src="{{ asset('assets/uploads/products/'.$prod->image) }}" alt="Product Image" style="height: 250px">
                                <div class="card-body">
                                    <h5>{{ $prod->name }}</h5>
                                    <span class="float-start">RM{{ $prod->selling_price }}</span>
                                    <span class="float-end"><s>RM{{ $prod->original_price }}</s></span>
                                </div>
                            </div>
                        </div>    
                     @endforeach 
                </div> --}}
           

                <h2>Featured Product</h2>
                  @foreach ($featured_products as $prod)
                <div class="col-md-3 mt-3">
                    <div class="card" >
                        <img src="{{ asset('assets/uploads/products/'.$prod->image) }}" alt="Product Image" style="height: 250px">
                        <div class="card-body">
                            <h5>{{ $prod->name }}</h5>
                            <span class="float-start">RM{{ $prod->selling_price }}</span>
                            <span class="float-end"><s>RM{{ $prod->original_price }}</s></span>
                        </div>
                    </div>
                </div>    
                @endforeach   
        </div>  
    </div>

     <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Featured Category</h2>
             
                  @foreach ($featured_category as $category)
                <div class="col-md-3 mt-3">
                       <a href="{{ url('view-category/'.$category->slug) }}">
                    <div class="card" >
                        <img src="{{ asset('assets/uploads/category/'.$category->image) }}" alt="Category Image" style="height: 250px">
                        <div class="card-body">
                            <h5>{{ $category->name }}</h5>
                            <p>{{ $category->description }}</p>   
                        </div>
                    </div>
                    </a>
                </div>    
                @endforeach   
        </div>  
    </div>
@endsection

@section('scripts')
    <script>
    $('.featured-carousel').owlCarousel({
                loop: true,
                margin:0,
                responsiveClass: true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:5
                    }
                }
            });

    </script>
        
@endsection


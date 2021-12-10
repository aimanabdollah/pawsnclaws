@extends('layouts.front')

@section('title')
    Welcome to Paws'n Claws
@endsection

@section('content')
    @include('layouts.inc.slider')
    
    <div class="py-5"></div>
        <div class="container">
            <div class="row">

                {{-- <div class="owl-carousel featured owl-theme">
                     @foreach ($products as $prod)
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
                  @foreach ($products as $prod)
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
@endsection

{{-- @section('scripts')
<script>
 $('.owl-carousel').owlCarousel({
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
    
@endsection --}}


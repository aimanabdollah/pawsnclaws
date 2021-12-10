@extends('layouts.front')

@section('title')
   {{ $category->name }}
@endsection


@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">

                <h2>{{ $category->name }}</h2>
                  @foreach ($products as $prod)
                <div class="col-md-3 mb-3">
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
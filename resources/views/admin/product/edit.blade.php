@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Product</h4>

    </div>
    <div class="card-body">
        <form action="{{  url('update-product/'.$products->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">

                 <div class="col-md-12 mb-3">
                     <select class="form-select" name="cate_id" >
               <option value="">{{ $products->category->name }}</option>
                       
                     </select>
                </div>

                 {{-- <div class="col-md-12 mb-3">
                     <select class="form-select" name="cate_id" >
                             <option value="">{{ $products->category->name }}</option>
                            @foreach ($products as $product)
                                <option>{{ $product->category->name }}</option>
                            @endforeach
                     </select>
                </div> --}}
{{-- 
                 <div class="col-md-12 mb-3">
                     <select class="form-select" name="cate_id" >
               <option selected>Select a Category</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach

                     </select>
                </div> --}}


                       <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text" class="form-control" value="{{ $products->name }}"  name="name">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" value="{{ $products->slug }}" name="slug">
                </div>
                
                {{-- <div class="col-md-12 mb-3">  
                    <label for="">Small Description</label>
                    <textarea name="small_description" rows="3" class="form-control">{{ $products->small_description }}</textarea>
                </div> --}}

                <div class="col-md-12 mb-3">  
                    <label for="">Description</label>
                    <textarea name="description" rows="3" class="form-control">{{ $products->description }}</textarea>
                </div>

                 <div class="col-md-6 mb-3">  
                    <label for="">Original Price</label>
                 <input type="number"class="form-control" value="{{ $products->original_price}}"  name="original_price"  min="0.00" max="10000.00" step="0.01">      
                </div>

                 <div class="col-md-6 mb-3">  
                    <label for="">Selling Price</label>
                 <input type="number" class="form-control" value="{{ $products->selling_price }}" name="selling_price"  min="0.00" max="10000.00" step="0.01">      
                </div>

                {{-- <div class="col-md-6 mb-3">  
                    <label for="">Tax</label>
                 <input type="number" class="form-control" value="{{ $products->tax }}" name="tax">      
                </div> --}}

           

                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" {{ $products->status =="1" ? 'checked': '' }} name="status">
                </div>
                
            

                <div class="col-md-6 mb-3">
                    <label for="">Popular</label>
                    <input type="checkbox" {{ $products->popular =="1" ? 'checked': '' }} name="popular">
                </div>

                <div class="col-md-6 mb-3">  
                    <label for="">Quantity</label>
                 <input type="number" class="form-control" value="{{ $products->qty }}"  min="0" max="10000" step="1" name="qty">      
                </div>


                <div class="col-md-6 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" class="form-control" value="{{ $products->meta_title }}" name="meta_title">
                </div>

                {{-- <div class="col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3" class="form-control">{{ $products->meta_keywords }}</textarea> 
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control">{{ $products->meta_description }}</textarea> 
                </div> --}}

               
                 @if($products->image)
                <img src="{{ asset('assets/uploads/products/'.$products->image) }}" width="200" height="200" alt="Product image">
                @endif

                <div class="col-md-12">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-success">Update</button>
                      <a href="{{ url('products') }}" class="btn btn-danger ">Cancel</a>
                </div>

           
            
            </div>
        </form>
      
    </div>
</div>
@endsection
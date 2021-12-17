@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="col-12">
            <h3>Product List </h3>
            <a href="{{ url('add-products') }}" class="btn btn-primary float-right" style="margin-right: 7.5%">Add New
                Product</a>

            <div class="row g-3 align-items-center mt-2">
                <div class="col-auto">
                    <form action="/products" method="GET">
                        <input type="search" id="inputPassword6" name="search" class="form-control"
                            aria-describedby="passwordHelpInline" placeholder="Search Product Name Here"
                            style="width:250px;">
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-boradered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>
                            <center>Category</center>
                        </th>
                        <th>
                            <center>Product Name</center>
                        </th>
                        <th>
                            <center>Selling Price</center>
                        </th>
                        <th>
                            <center>Image</center>
                        </th>
                        <th>
                            <center>Action</center>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 0; ?>
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}</td>
                            <td>
                                <center>{{ $item->category->name }}</center>
                            </td>
                            <td>
                                <center>{{ $item->name }}</center>
                            </td>
                            <td>
                                <center>RM
                                    {{ number_format($item->original_price * (1 - $item->selling_price / 100), 2) }}
                                </center>
                            </td>
                            <td>
                                <center>
                                    <img src="{{ asset('assets/uploads/products/' . $item->image) }}"
                                        class="cate-image" alt="image here">
                            </td>
                            </center>
                            <td>
                                <center>
                                    <a href="{{ url('edit-product/' . $item->id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ url('delete-product/' . $item->id) }}" class="btn btn-danger"
                                        onclick="return confirm('Are you sure to delete this product?')">Delete</a>
                                </center>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="mx-auto mt-3">
                    {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

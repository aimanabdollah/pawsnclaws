@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="col-12">
            <h3>Product List
                <a href="{{ url('add-products') }}" class="btn btn-primary float-right" style="margin-right: 7.5%">Add New
                    Product</a>
            </h3>

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
                            <td><?= ++$counter ?></td>
                            <td>
                                <center>{{ $item->category->name }}</center>
                            </td>
                            <td>
                                <center>{{ $item->name }}</center>
                            </td>
                            <td>
                                <center>RM {{ $item->selling_price }}</center>
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
        </div>
    </div>

@endsection

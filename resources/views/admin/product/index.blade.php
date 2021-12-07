@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        <h4>Product Page</h4>
        <hr>
    </div>
    <div class="card-body">
        <table class="table table-boradered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Selling Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $counter = 0; ?>
                @foreach ($products as $item)
                <tr>
                    <td><?= ++$counter;?></td>
                     <td>{{  $item->category->name }}</td>
                     <td>{{  $item->name }}</td>
                    <td>RM {{  $item->selling_price }}</td>
                    <td>
                        <img src="{{ asset('assets/uploads/products/'.$item->image) }}" class="cate-image" alt="image here">
                    </td>
                    <td>
                        <a href="{{  url('edit-product/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ url('delete-product/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                       
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
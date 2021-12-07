@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        <h4>Category Page</h4>
        <hr>
    </div>
    <div class="card-body">
        <table class="table table-boradered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                  <?php $counter = 0; ?>
                @foreach ($category as $item)
                <tr>
                    <td><?= ++$counter;?></td>
                    <td>{{  $item->name }}</td>
                    <td>{{  $item->description }}</td>
                    <td>
                        <img src="{{ asset('assets/uploads/category/'.$item->image) }}" class="cate-image" alt="image here">
                    </td>
                    <td>
                        <a href="{{ url('edit-category/'.$item->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('delete-category/'.$item->id) }}" class="btn btn-danger">Delete</a>
                       
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
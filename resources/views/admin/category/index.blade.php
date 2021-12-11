@extends('layouts.admin')

@section('content')
    <div class="card">

        <div class="col-12">
            <h3>Category List
                <a href="{{ url('add-category') }}" class="btn btn-primary float-right" style="margin-right: 4%">Add New
                    Category</a>
            </h3>
        </div>

        <hr>
        <div class="card-body">
            <table class="table table-boradered table-striped">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>
                            <center>Category Name</center>
                        </th>
                        <th>
                            <center>Description</center>
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

                    @foreach ($category as $item)
                        <tr>
                            <td>{{ ($category->currentPage() - 1) * $category->perPage() + $loop->iteration }}</td>
                            <td>
                                <center>{{ $item->name }}</center>
                            </td>
                            <td>
                                <center>{{ $item->description }}</center>
                            </td>
                            <td>
                                <center>
                                    <img src="{{ asset('assets/uploads/category/' . $item->image) }}"
                                        class="cate-image" alt="image here">
                            </td>
                            <td>
                                <center>
                                    <a href="{{ url('edit-category/' . $item->id) }}" class="btn btn-info ">Edit</a>
                                    <a href="{{ url('delete-category/' . $item->id) }}" class="btn btn-danger"
                                        onclick="return confirm('Are you sure to delete this category?')">Delete</a>
                                </center>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="row">
                <div class="mx-auto mt-3">
                    {!! $category->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

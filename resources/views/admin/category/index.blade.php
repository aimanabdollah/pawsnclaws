@extends('layouts.admin')

@section('content')
    <div class="card">

        <div class="col-12">
            <h3><b>Category List</b>
                <a href="{{ 'categories/add-category' }}" class="btn btn-success float-right">Add New
                    Category</a>
                <div class="row g-3 align-items-center mt-2 float-right" style="margin-right: 1%">
                    <div class="col-auto">
                        <form action="/categories" method="GET">
                            <input type="search" id="inputPassword6" name="search" class="form-control"
                                aria-describedby="passwordHelpInline" placeholder="Search Category Name Here"
                                style="width:250px;">
                        </form>
                    </div>
                </div>
            </h3>

        </div>


        <hr>
        <div class="card-body">

            <table class="table table-boradered table-striped">

                <thead>
                    <tr>
                        <th> <b>No. </b></th>
                        <th>
                            <b>
                                <center>Category Name</center>
                            </b>
                        </th>
                        <th>
                            <b>
                                <center>Description</center>
                            </b>
                        </th>
                        <th>
                            <b>
                                <center>Image</center>
                            </b>
                        </th>
                        <th>
                            <b>
                                <center>Action</center>
                            </b>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 0; ?>

                    @forelse ($category as $item)
                        <tr>
                            <td>{{ ($category->currentPage() - 1) * $category->perPage() + $loop->iteration }}.</td>
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
                                    <a href="{{ url('categories/edit-category/' . $item->id) }}"
                                        class="btn btn-warning "><span class="material-icons">
                                            edit
                                        </span>Edit</a>
                                    <a href="{{ url('categories/delete-category/' . $item->id) }}" class="btn btn-danger"
                                        onclick="return confirm('Are you sure to delete this category?')"><span
                                            class="material-icons">
                                            delete
                                        </span>Delete</a>
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

@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control" required></textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Popular</label>
                        <input type="checkbox" name="popular">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" required>
                    </div>

                    {{-- <div class="col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3" class="form-control"></textarea> 
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control"></textarea> 
                </div> --}}

                    <div class="col-md-12">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="{{ url('categories') }}" class="btn btn-danger ">Cancel</a>
                    </div>

                </div>
            </form>

        </div>
    </div>
@endsection

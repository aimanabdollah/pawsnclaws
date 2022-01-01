@extends('layouts.front')

@section('title')
    My Dashboard
@endsection



@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a> /
                <a href="{{ url('my-dashboard') }}">
                    Dashboard
                </a>

            </h6>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>My Dashboard</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats bg-primary text-white">
                                    <div class="card-header card-header-danger card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">shopping_bag</i>
                                        </div>
                                        <p class="card-category">Total Order</p>
                                        <h3 class="card-title">{{ $totalAllOrder }}</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">update</i> Just Updated
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats bg-danger text-white">
                                    <div class="card-header card-header-danger card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">shopping_bag</i>
                                        </div>
                                        <p class="card-category">Order Pending</p>
                                        <h3 class="card-title">{{ $totalOrderPending }}</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">update</i> Just Updated
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats bg-success text-white">
                                    <div class="card-header card-header-danger card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">shopping_bag</i>
                                        </div>
                                        <p class="card-category">Order Completed</p>
                                        <h3 class="card-title">{{ $totalOrderCompleted }}</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">update</i> Just Updated
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats bg-secondary text-white">
                                    <div class="card-header card-header-danger card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">shopping_bag</i>
                                        </div>
                                        <p class="card-category">Total Spend</p>
                                        <h3 class="card-title">RM {{ $totalSpend }}</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">update</i> Just Updated
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>






                    </div>
                </div>


            </div>
        </div>
    </div>



@endsection

@section('scripts')

    <script>
    </script>
@endsection

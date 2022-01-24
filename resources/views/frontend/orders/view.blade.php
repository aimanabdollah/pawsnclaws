@extends('layouts.front')

@section('title')
    My Orders
@endsection



@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a> /
                <a href="{{ url('my-orders') }}">
                    Orders
                </a>
                / Details

                </a>

            </h6>
        </div>
    </div>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Order View
                            <a href="{{ url('my-orders') }}" class="btn btn-primary float-end">Back</a>
                        </h4>
                        @php
                            $total = 0;
                            $count = 0;
                        @endphp
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h6>Order ID: {{ $orders->tracking_no }}</h6>
                            </div>

                            <div class="col-6">
                                @php
                                    $myvalue = $orders->created_at;
                                    
                                    $datetime = new DateTime($myvalue);
                                    $date = $datetime->format('d-m-Y');
                                    $time = $datetime->format('H:i');
                                    
                                @endphp
                                <h6>Order Date: {{ $date }}</h6>
                            </div>


                            <hr>

                            <div class="col-md-6 order-details">
                                <h4>Shipping Details</h4>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form" for="">First Name</label>
                                        <div class="form-control">{{ $orders->fname }}</div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form" for="">Last Name</label>
                                        <div class="form-control">{{ $orders->lname }}</div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form" for="">Email</label>
                                        <div class="form-control">{{ $orders->email }}</div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form" for="">Contact No.</label>
                                        <div class="form-control">{{ $orders->phone }}</div>
                                    </div>

                                </div>

                                <label class="form mt-2" for="">Address</label>


                                <div class="form-control">
                                    {{ $orders->address1 }},
                                    {{ $orders->address2 }}
                                    {{-- {{ $orders->city }}, <br>
                                    {{ $orders->state }},
                                    {{ $orders->country }} --}}
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-control">{{ $orders->pincode }}</div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-control">{{ $orders->city }}</div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-control">{{ $orders->state }}</div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-control">Malaysia</div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <hr>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Product Price</th>
                                            <th>Total Price</th>
                                            <th>Image</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderitems as $item)

                                            {{-- @php
                                                $myvalue = $item->created_at;
                                                
                                                $datetime = new DateTime($myvalue);
                                                $date = $datetime->format('d-m-Y');
                                                $time = $datetime->format('H:i');
                                                
                                            @endphp --}}
                                            <tr>
                                                <td>{{ $count = $count + 1 }}.
                                                <td>{{ $item->products->name }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>RM {{ number_format($item->price, 2) }}</td>
                                                <td>RM {{ number_format($item->price * $item->qty, 2) }}</td>
                                                <td>
                                                    <img src="{{ asset('assets/uploads/products/' . $item->products->image) }}"
                                                        width="50px" alt="">
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h5 class="px-2">Total Amount: <span class="float-end">RM
                                        {{ number_format($orders->total_price, 2) }}</span></h5>


                            </div>

                        </div>


                    </div>
                </div>


            </div>
        </div>
    </div>
    @include('layouts.inc.frontendfooter')

@endsection

@extends('layouts.admin')

@section('title')
    Orders
@endsection

@section('content')

    <div class="card">
        <div class="card-header">

            @php
                $myvalue = $orders->created_at;
                
                $datetime = new DateTime($myvalue);
                $date = $datetime->format('d-m-Y');
                $time = $datetime->format('H:i');
                
            @endphp

            <h3><b>Order ID: {{ $orders->tracking_no }} | Date: {{ $date }}</b>
                <a href="{{ url('orders') }}" class="btn btn-primary float-right">Back</a>
            </h3>





            @php
                $total = 0;
                $count = 0;
            @endphp
        </div>
        <hr>
        <div class="card-body">
            <div class="row">

                <hr>
                <div class="col-md-6 order-details">
                    <h4>Shipping Details</h4>
                    <hr>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label class="form" for="">First Name</label>
                            <div class="border">{{ $orders->fname }}</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form" for="">Last Name</label>
                            <div class="border">{{ $orders->lname }}</div>
                        </div>

                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label class="form" for="">Email</label>
                            <div class="border">{{ $orders->email }}</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form" for="">Contact No.</label>
                            <div class="border">{{ $orders->phone }}</div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="form" for="">Address</label>
                            <div class="border"> {{ $orders->address1 }},
                                {{ $orders->address2 }}
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <div class="border">{{ $orders->pincode }}</div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="border">{{ $orders->city }}</div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="border">{{ $orders->state }}</div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="border">Malaysia</div>
                        </div>

                    </div>

                </div>
                <div class="col-md-6">
                    <h4>Order Details</h4>
                    <hr>
                    <table class="table table-boradered table-striped">
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
                    <h5 class="px-2">Total Amount: <span class="float-right">RM
                            {{ number_format($orders->total_price, 2) }}</span></h5>

                    <div class="px-1">
                        <label for="Order Status"></label>
                        <form action="{{ url('update-order/' . $orders->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select class="form-select" name="order_status" id="">
                                <option {{ $orders->status == '0' ? 'selected' : '' }}value="0">Pending
                                </option>
                                <option {{ $orders->status == '1' ? 'selected' : '' }}value="1">Completed
                                </option>
                            </select>
                            <button type="submit" class="btn btn-primary float-right mt-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

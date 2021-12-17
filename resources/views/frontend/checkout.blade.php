@extends('layouts.front')

@section('title')
    Checkout
@endsection



@section('content')
    <div class="container mt-5">
        <form action="{{ url('place-order') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="fname"
                                        placeholder="Enter First Name">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->lname }}"
                                        name="lname" placeholder="Enter Last Name">
                                </div>
                                <div class="col-md-6  mt-3">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->email }}"
                                        name="email" placeholder="Enter Email">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Phone Number</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->phone }}"
                                        name="phone" placeholder="Enter Phone Number">
                                </div>
                                <div class="col-md-6  mt-3">
                                    <label for="">Address 1</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->address1 }}"
                                        name="address1" placeholder="Enter Address 1">
                                </div>
                                <div class="col-md-6  mt-3">
                                    <label for="">Address 2</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->address2 }}"
                                        name="address2" placeholder="Enter Address 2">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">City</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->city }}" name="city"
                                        placeholder="Enter City">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">State</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->state }}"
                                        name="state" placeholder="Enter State">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Country</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->country }}"
                                        name="country" placeholder="Enter Country">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Pin Code</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->pincode }}"
                                        name="pincode" placeholder="Enter Pin Code">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Order Detials</h6>
                            <hr>
                            <table class="table table-striped table-boardered">

                                <thead>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total Price</th>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp

                                    @foreach ($cartitems as $item)
                                        <tr>
                                            <td> {{ $item->products->name }}</td>
                                            <td> {{ $item->prod_qty }}</td>
                                            <td>
                                                RM{{ number_format($item->products->original_price * (1 - $item->products->selling_price / 100), 2) }}
                                            </td>
                                            <td>
                                                @php
                                                    $subprice = $item->products->original_price * $item->prod_qty * (1 - $item->products->selling_price / 100);
                                                @endphp
                                                RM{{ number_format($subprice, 2) }}

                                            </td>
                                        </tr>
                                        @php
                                            $total += $subprice;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            <h6>Total Amount: RM{{ number_format($total, 2) }}
                                <hr>

                                <button type="submit" class="btn btn-primary w-100">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection

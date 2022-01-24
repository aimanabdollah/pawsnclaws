@extends('layouts.front')

@section('title')
    Checkout
@endsection


@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a> /
                <a href="{{ url('cart') }}">
                    Cart
                </a> /
                <a href="{{ url('checkout') }}">
                    Checkout
                </a>

            </h6>
        </div>
    </div>
    <div class="container mt-5">
        <form action="{{ url('place-order') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Shipping Details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->name }}"
                                        name="fname" placeholder="Enter First Name">
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
                                    <label for="">PostCode</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->pincode }}"
                                        name="pincode" placeholder="Enter Pin Code">
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="">City</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->city }}"
                                        name="city" placeholder="Enter City">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">State</label>
                                    {{-- <input type="text" class="form-control" value="{{ Auth::user()->state }}"
                                        name="state" placeholder="Enter State"> --}}

                                    <select class="form-select" name=state aria-label="Default select example">
                                        <option selected>Please select a state</option>
                                        <option value="W.P Kuala Lumpur">W.P Kuala Lumpur</option>
                                        <option value="W.P Labuan">W.P Labuan</option>
                                        <option value="W.P Putrajaya">W.P Putrajaya</option>
                                        <option value="Johor">Johor</option>
                                        <option value="Kedah">Kedah</option>
                                        <option value="Kelantan">Kelantan</option>
                                        <option value="Melaka">Melaka</option>
                                        <option value="Negeri Sembilan">Negeri Sembilan</option>
                                        <option value="Pahang">Pahang</option>
                                        <option value="Perak">Perak</option>
                                        <option value="Perlis">Perlis</option>
                                        <option value="Pulau Pinang">Pulau Pinang</option>
                                        <option value="Sabah">Sabah</option>
                                        <option value="Sarawak">Sarawak</option>
                                        <option value="Selangor">Selangor</option>
                                        <option value="Terengganu">Terengganu</option>
                                    </select>
                                </div>
                                {{-- <div class="col-md-6 mt-3">
                                    <label for="">Country</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->country }}"
                                        name="country" placeholder="Enter Country">
                                </div> --}}

                                <div class="col-md-6 mt-3">
                                    <label for="">Country</label>
                                    <input type="text" class="form-control" value="Malaysia" name="country"
                                        placeholder="Enter Country">
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Order Details</h6>
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

                                <h6 style="margin-bottom: 3%">Payment Details
                                    <div class="float-end">
                                        <i class="fa fa-cc-mastercard" style="color:blue"></i>
                                        <i class=" fa fa-cc-visa" style="color:black"></i>
                                        <i class="fa fa-cc-discover" style="color:red"></i>
                                        <i class="fa fa-cc-jcb" style="color:purple"></i>
                                    </div>
                                </h6>






                                <div class="row checkout-form">
                                    <div class="col-sm-6">
                                        <label for="">Full Name</label>
                                        <input type="text" class="form-control" name="" placeholder="Card Holder's Name"
                                            required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="">No. Card</label>
                                        <input type="text" class="form-control" name=""
                                            placeholder="e.g. 1111-2222-3333-4444" required>
                                    </div>

                                    <div class="col-sm-4 mt-3">
                                        <label for="">Exp Date</label>
                                        <input type="number" class="form-control" name="" placeholder="Month" min="01"
                                            max="12" step="1" required>
                                        {{-- <select class="form-select" aria-label="Default select example" style="">
                                            <option selected>Month</option>
                                            <option value="">January</option>
                                            <option value="">February</option>
                                            <option value="">March</option>
                                            <option value="">April</option>
                                            <option value="">May</option>
                                            <option value="">June</option>
                                            <option value="">July</option>
                                            <option value="">August</option>
                                            <option value="">September</option>
                                            <option value="">October</option>
                                            <option value="">November</option>
                                            <option value="">December</option>
                                        </select> --}}
                                    </div>

                                    <div class="col-sm-4 mt-3">
                                        <label for=""></label>
                                        <input type="number" class="form-control" placeholder="Year" min="2010" max="2080"
                                            step="1" required>




                                    </div>

                                    <div class="col-sm-4 mt-3">
                                        <label for="">CVV</label>
                                        <input type="number" class="form-control" name="" placeholder="e.g. 123" min="100"
                                            step="1" required>
                                    </div>

                                </div>



                                {{-- <select class="form-select" name=country aria-label="Default select example"
                                    style="margin-bottom: 3%">
                                    <option selected>Please select a payment method</option>
                                    <option value="Online Payment">Online Payment</option>
                                    <option value="Cash On Delivery">Cash On Delivery</option>
                                </select> --}}


                                {{-- <div class="form-check">
                                    <input class="form-check-input" type="radio" name="country" value="Online Payment">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Online Payment
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="country" value="Cash On Delivery">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Cash On Delivery
                                    </label>
                                </div> --}}





                                {{-- <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                aria-expanded="false" aria-controls="flush-collapseOne">
                                                Accordion Item #1
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">Placeholder content for this accordion, which is
                                                intended to demonstrate the <code>.accordion-flush</code> class. This is the
                                                first item's accordion body.</div>
                                        </div>
                                    </div>


                                </div> --}}


                                <button type="submit" class="btn btn-primary w-100" style="margin-top: 3%">Place
                                    Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection

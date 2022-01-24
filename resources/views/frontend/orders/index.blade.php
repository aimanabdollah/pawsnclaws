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

            </h6>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>My Orders</h4>
                        @php
                            $total = 0;
                            $count = 0;
                        @endphp
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>
                                        <center>Order ID
                                    </th>
                                    <th>
                                        <center>Order Date
                                    </th>
                                    {{-- <th>Tracking Number</th> --}}
                                    <th>
                                        <center>Total Price</center>
                                    </th>
                                    <th>
                                        <center>Status</center>
                                    </th>
                                    <th>
                                        <center>Action</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)

                                    @php
                                        $myvalue = $item->created_at;
                                        
                                        $datetime = new DateTime($myvalue);
                                        $date = $datetime->format('d-m-Y');
                                        $time = $datetime->format('H:i');
                                        
                                    @endphp
                                    <tr>
                                        {{-- <td>{{ $count = $count + 1 }}.</td> --}}
                                        <td>{{ ($orders->currentPage() - 1) * $orders->perPage() + $loop->iteration }}.
                                        </td>
                                        <td>
                                            <center>{{ $item->tracking_no }}</center>
                                        </td>
                                        <td>
                                            <center>{{ $date }}</center>
                                        </td>
                                        {{-- <td>{{ $item->tracking_no }}</td> --}}
                                        <td>
                                            <center>RM {{ $item->total_price }}</center>
                                        </td>
                                        <td>
                                            <center>{{ $item->status == '0' ? 'Pending' : 'Completed' }}</center>
                                        </td>
                                        <td>
                                            <center>
                                                <a href="{{ url('view-order/' . $item->id) }}"
                                                    class="btn btn-primary">View</a>

                                                <a href="{{ url('invoice-order/' . $item->id) }}"
                                                    class="btn btn-success">Invoice</a>
                                            </center>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="row float-end">
                            <div class="mx-auto mt-3">
                                {!! $orders->links() !!}
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>

    @include('layouts.inc.frontendfooter')

@endsection

@extends('layouts.front')

@section('title')
    My Orders
@endsection



@section('content')
    <div class="container py-5">
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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Order Date/Time</th>
                                    <th>Tracking Number</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
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
                                        <td>{{ $count = $count + 1 }}.
                                        <td>{{ $date }} {{ $time }}</td>
                                        <td>{{ $item->tracking_no }}</td>
                                        <td>RM {{ $item->total_price }}</td>
                                        <td>{{ $item->status == '0' ? 'Pending' : 'Completed' }}</td>
                                        <td>
                                            <a href="{{ url('view-order/' . $item->id) }}" class="btn btn-primary">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection

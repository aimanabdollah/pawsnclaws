<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Invoice</title>
    <link rel="shortcut icon" type="image/png" href="https://image.flaticon.com/icons/png/512/64/64431.png" />
    <!-- Bootstrap -->
    <link href="{{ asset('frontend/css/bootstrap3.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>


    <div class="row">
        <div class="col-xs-6 text-center">
            <br>
            <img src="https://i.pinimg.com/564x/b4/1b/22/b41b220d53c4056c2c8576ca75627d9d.jpg" width="50%">
        </div>
        <div class="col-xs-6 text-right">
            @php
                $myvalue = $orders->created_at;
                
                $datetime = new DateTime($myvalue);
                $date = $datetime->format('d-m-Y');
                $time = $datetime->format('H:i');
                
            @endphp
            <h1>INVOICE</h1>
            <h5>Order: {{ $orders->tracking_no }}</h5>
            <h5>Date: {{ $date }}</h5>

        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>From: Paws'n Claws Sdn. Bhd.</h4>
                </div>
                <div class="panel-body">
                    <p>
                        Lot 23 <br>
                        Jalan Reko 2, Taman Saujana <br>
                        43600 Bangi <br>
                        Selangor Darul Ehsan <br>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xs-5 col-xs-offset-2 text-right">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>To: {{ $orders->fname }} {{ $orders->lname }}</h4>

                </div>
                <div class="panel-body">

                    <p>
                        {{ $orders->address1 }}<br>
                        {{ $orders->address2 }}<br>
                        {{ $orders->pincode }}, {{ $orders->city }} <br>
                        {{ $orders->state }} <br>
                    </p>
                </div>
            </div>
        </div>
    </div>

    @php
        $total = 0;
        $count = 0;
    @endphp

    <table class="table table-striped table-bordered">

        <tr>
            <th>No</th>
            <th>Product</th>
            <th class="text-right">Quantity</th>
            <th class="text-right">Price(RM)/Unit</th>
            <th class="text-right">Total(RM)</th>
        </tr>

        @foreach ($orders->orderitems as $item)
            <tr>
                <td>{{ $count = $count + 1 }}</td>
                <td>{{ $item->products->name }}</td>
                <td class="text-right">{{ $item->qty }}</td>
                <td class="text-right">RM {{ number_format($item->price, 2) }}</td>
                <td class="text-right">RM {{ number_format($item->price * $item->qty, 2) }}</td>

            </tr>
        @endforeach

        <tr>
            <td colspan="4" class="text-right">Grand Total</td>
            <td class="text-right">RM
                {{ number_format($orders->total_price, 2) }}</td>
        </tr>

    </table>


    <div class="panel-body">
        <center>
            <p>If you have any questions about this invoice, please contact</p>
        </center>
        <center>
            <p>Mr. Aiman Abdollah, +6011 2556 0093 </p>
        </center>
        <p><br></p>
        <center>
            <p>Computer-generated invoice. No signature is required.</p>
        </center>
    </div>


</body>

</html>

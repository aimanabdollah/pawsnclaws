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
                                            <i class="material-icons">shopping_cart</i>
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
                                            <i class="material-icons"><span class="material-icons">
                                                    pending_actions
                                                </span></i>
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
                                            <i class="material-icons">assignment_turned_in</i>
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
                                            <i class="material-icons">payments</i>
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
                        {{-- <div class="col-lg-12" style="margin-top: 3%">
                            <div class="card card-stats" id="curve_chart" style="height: 300px"></div>
                        </div> --}}






                        <div class="row">
                            <div class="col-lg-6" style="margin-top: 3%">
                                <div class="card card-stats" id="curve_chart" style="height: 300px"></div>
                            </div>

                            <div class="col-lg-6" style="margin-top: 3%">
                                <div class="card card-stats" id="columnchart_values" style="height: 300px"></div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6" style="margin-top: 3%">
                                <div class="ml-4">
                                    <div class="card card-stats" id="barchart" style="height: 300px"></div>
                                </div>

                            </div>

                            <div class="col-lg-6" style="margin-top: 3%">
                                <div class="card card-stats" id="piechart" style="height: 300px"></div>
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
        // LINE CHART FOR TOTAL SALES BY MONTH

        google.charts.load('current', {
            packages: ['corechart', 'line']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Month', 'Total Spend', 'Average Order Value'],
                <?php echo $chartSales; ?>
            ]);

            var options = {
                title: 'Total Spend and Average Order Value by Month',

                hAxis: {
                    title: 'Month'
                },
                vAxis: {
                    title: 'Spend in RM'
                },
                animation: {
                    "startup": true,
                    duration: 5000,
                    easing: 'out'
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }


        google.charts.load("current", {
            packages: ['corechart']
        });
        google.charts.setOnLoadCallback(orderstate);

        function orderstate() {
            var data = google.visualization.arrayToDataTable([
                ['State', 'No. of Order'],
                <?php echo $chartOrder; ?>
            ]);

            var options = {
                title: "No. Of Order by Month",
                colors: ['orange'],
                animation: {
                    "startup": true,
                    duration: 5000,
                    easing: 'out'
                },
                bar: {
                    groupWidth: "95%"
                },
                legend: {
                    position: "none"
                },
                hAxis: {
                    title: 'Month',

                },
                vAxis: {
                    title: 'No. of Order'
                }
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            chart.draw(data, options);
        }


        google.charts.load('current', {
            packages: ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback(topProduct);

        function topProduct() {

            var data = google.visualization.arrayToDataTable([
                ['Product Name', 'No. of Bought'],
                <?php echo $chartProduct; ?>
            ]);

            var options = {
                title: 'Top 3 Most Bought Product',
                animation: {
                    "startup": true,
                    duration: 5000,
                    easing: 'out'
                },
                colors: ['green'],
                chartArea: {
                    width: '50%'
                },
                hAxis: {
                    title: 'Amount',
                    minValue: 0
                },
                vAxis: {
                    title: 'Product Name'
                }
            };

            var chart = new google.visualization.BarChart(document.getElementById('barchart'));

            chart.draw(data, options);
        }



        // PIE CHART FOR ORDER BY PAYMENT TYPE

        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawpieChart);

        function drawpieChart() {

            var data = google.visualization.arrayToDataTable([
                ['Order Status', 'No. of Order'],
                <?php echo $chartStatus; ?>

            ]);

            var options = {
                title: 'No. of Order Based On Order Status',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
@endsection

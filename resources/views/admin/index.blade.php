@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3><b>Dashboard</b></h3>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">category</i>
                            </div>
                            <p class="card-category">Total Category</p>
                            <h3 class="card-title">{{ $category }}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">shopping_bag</i>
                            </div>
                            <p class="card-category">Total Product</p>
                            <h3 class="card-title">{{ $product }}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">shopping_cart</i>
                            </div>
                            <p class="card-category">Total Order</p>
                            <h3 class="card-title">{{ $order }}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">payments</i>
                            </div>
                            <p class="card-category">Total Sales</p>
                            <h3 class="card-title">RM {{ $amt_sales }}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card card-stats" id="piechart" style="height: 300px"></div>

                </div>
                <div class="col-lg-6">

                    <div class="card card-stats" id="chart_div" style="height: 300px"></div>
                </div>

                <div class="col-lg-6">
                    <div class="card card-stats" id="barchart" style="height: 300px"></div>
                </div>

                <div class="col-lg-6">
                    <div class="card card-stats" id="columnchart_values" style="height: 300px"></div>
                </div>



            </div>

        @endsection

        @section('scripts')
            <script>
                // PIE CHART FOR PRODUCT BY CATEGORY

                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawpieChart);

                function drawpieChart() {

                    var data = google.visualization.arrayToDataTable([
                        ['Category', 'No.of Product'],
                        <?php echo $chartData; ?>

                    ]);

                    var options = {
                        title: 'No. of Product by Category',
                        is3D: true,

                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                    chart.draw(data, options);
                }



                // LINE CHART FOR TOTAL SALES BY MONTH

                google.charts.load('current', {
                    packages: ['corechart', 'line']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Month', 'Sales'],
                        <?php echo $chartSales; ?>
                    ]);

                    var options = {
                        title: 'No. of Sales by Month',
                        hAxis: {
                            title: 'Month'
                        },
                        vAxis: {
                            title: 'Sales in RM'
                        }

                    };

                    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

                    chart.draw(data, options);
                }


                // BAR CHART FOR TOP 3 MOST SELLING PRODUCT

                google.charts.load('current', {
                    packages: ['corechart', 'bar']
                });
                google.charts.setOnLoadCallback(topProduct);

                function topProduct() {

                    var data = google.visualization.arrayToDataTable([
                        ['Product Name', 'No. of Sold'],
                        <?php echo $chartProduct; ?>
                    ]);

                    var options = {
                        title: 'Top 3 Most Selling Product',
                        chartArea: {
                            width: '50%'
                        },
                        hAxis: {
                            title: 'Total Sell',
                            minValue: 0
                        },
                        vAxis: {
                            title: 'Product Name'
                        }
                    };

                    var chart = new google.visualization.BarChart(document.getElementById('barchart'));

                    chart.draw(data, options);
                }


                // BAR CHART FOR TOP 5 MOST ORDER BY STATE


                google.charts.load("current", {
                    packages: ['corechart']
                });
                google.charts.setOnLoadCallback(orderstate);

                function orderstate() {
                    var data = google.visualization.arrayToDataTable([
                        ['State', 'No. of Order'],
                        <?php echo $chartState; ?>
                    ]);

                    var options = {
                        title: "Top 5 Most Order by State",
                        bar: {
                            groupWidth: "95%"
                        },
                        legend: {
                            position: "none"
                        },
                        hAxis: {
                            title: 'State',

                        },
                        vAxis: {
                            title: 'No. of Order'
                        }
                    };
                    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
                    chart.draw(data, options);
                }
            </script>



        @endsection

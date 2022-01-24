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
                            <p class="card-category" style="color: black">Total Category</p>
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
                            <p class="card-category" style="color: black">Total Product</p>
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
                            <p class="card-category" style="color: black">Total Order</p>
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
                            <p class="card-category" style="color: black">Total Sales</p>
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
                    <div class="card card-stats">
                        <div class="ml-4" id="barchart" style="height: 300px"></div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="card card-stats" id="chart_div" style="height: 300px"></div>
                </div>

                <div class="col-lg-6">
                    <div class="card card-stats" id="piechart" style="height: 300px"></div>
                </div>

                <div class="col-lg-6">
                    <div class="card card-stats" id="piechartOrder" style="height: 300px"></div>
                </div>




                {{-- <div class="col-lg-6">
                    <div class="card card-stats" id="columnchart_values" style="height: 300px"></div>
                </div> --}}

                <div class="col-lg-6">
                    <div class="card card-stats">
                        <div class="ml-4" id="barchart3" style="height: 300px"></div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card card-stats">
                        <div class="ml-4" id="barchart2" style="height: 300px"></div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="card card-stats">
                        <center>
                            <div id="chart_div2" style="height: 300px;"></div>
                        </center>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="card card-stats" id="avgspend_values" style="height: 300px"></div>
                </div>


                {{-- <div class="col-lg-6">
                    <div id="chart_map" style="height: 300px;"></div>
                </div> --}}

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
                        animation: {
                            "startup": true,
                            duration: 4000,
                            easing: 'out'
                        }
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                    chart.draw(data, options);
                }


                // PIE CHART FOR ORDER BY STATE

                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawpieChartOrder);

                function drawpieChartOrder() {

                    var data = google.visualization.arrayToDataTable([
                        ['Category', 'No.of Product'],
                        <?php echo $chartState; ?>

                    ]);

                    var options = {
                        title: 'No. of Order by State',
                        is3D: true,
                        animation: {
                            "startup": true,
                            duration: 4000,
                            easing: 'out'
                        }
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechartOrder'));

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
                        title: 'Amount of Sales by Month',
                        curveType: 'function',
                        // colors: ['purple'],
                        // colors: '#d799ae',
                        //     // chartArea: {
                        //          backgroundColor: '#C7CEEA'
                        // },
                        animation: {
                            "startup": true,
                            duration: 4000,
                            easing: 'out'
                        },
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
                        colors: ['green'],
                        chartArea: {
                            width: '50%'
                        },
                        animation: {
                            "startup": true,
                            duration: 4000,
                            easing: 'out'
                        },
                        hAxis: {
                            title: 'Total Sell',
                            minValue: 0
                        },
                        vAxis: {
                            title: ''
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
                        colors: ['orange'],
                        animation: {
                            "startup": true,
                            duration: 4000,
                            easing: 'out'
                        },
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




                // BAR CHART FOR TOP 3 MOST ORDER BY CUSTOMER

                google.charts.load('current', {
                    packages: ['corechart', 'bar']
                });
                google.charts.setOnLoadCallback(orderCust);

                function orderCust() {

                    var data = google.visualization.arrayToDataTable([
                        ['Customer Name', 'No. of Order'],
                        <?php echo $chartOrderCust; ?>
                    ]);

                    var options = {
                        title: 'Top 3 Most No. of Order by Customer ',
                        colors: ['#FF0000'],
                        animation: {
                            "startup": true,
                            duration: 4000,
                            easing: 'out'
                        },
                        chartArea: {
                            width: '50%'
                        },
                        hAxis: {
                            title: 'Total Order',
                            minValue: 0
                        },
                        vAxis: {
                            title: 'Customer Name'
                        }
                    };

                    var chart = new google.visualization.BarChart(document.getElementById('barchart2'));

                    chart.draw(data, options);
                }


                // BAR CHART FOR TOP 3 MOST SPEND BY CUSTOMER

                google.charts.load('current', {
                    packages: ['corechart', 'bar']
                });
                google.charts.setOnLoadCallback(spendCust);

                function spendCust() {

                    var data = google.visualization.arrayToDataTable([
                        ['Customer Name', 'Total Spend'],
                        <?php echo $chartSpendCust; ?>
                    ]);

                    var options = {
                        title: 'Top 3 Most Total Spend by Customer ',
                        chartArea: {
                            width: '50%'
                        },
                        animation: {
                            "startup": true,
                            duration: 4000,
                            easing: 'out'
                        },
                        hAxis: {
                            title: 'Total Spend',
                            minValue: 0
                        },
                        vAxis: {
                            title: 'Customer Name'
                        }
                    };

                    var chart = new google.visualization.BarChart(document.getElementById('barchart3'));

                    chart.draw(data, options);
                }



                // BAR CHART FOR TOTAL SPEND AND ORDER BY CUSTOMER

                google.charts.load('current', {
                    'packages': ['corechart', 'bar']
                });
                google.charts.setOnLoadCallback(drawStuff);

                function drawStuff() {

                    var button = document.getElementById('change-chart');
                    var chartDiv = document.getElementById('chart_div2');

                    var data = google.visualization.arrayToDataTable([
                        ['Customer Name', 'Total Spend', 'Total Order'],
                        <?php echo $chartOS; ?>
                    ]);

                    var materialOptions = {
                        width: 900,
                        chart: {
                            title: 'Total Spend and Order',
                            subtitle: 'by Customer'
                        },
                        series: {
                            0: {
                                axis: 'distance'
                            }, // Bind series 0 to an axis named 'distance'.
                            1: {
                                axis: 'brightness'
                            } // Bind series 1 to an axis named 'brightness'.
                        },
                        axes: {
                            y: {
                                distance: {
                                    label: 'Amount of Total Spend'
                                }, // Left y-axis.
                                brightness: {
                                    side: 'right',
                                    label: 'Number of Order'
                                } // Right y-axis.
                            }
                        }
                    };

                    var classicOptions = {

                        series: {
                            0: {
                                targetAxisIndex: 0
                            },
                            1: {
                                targetAxisIndex: 1
                            }
                        },
                        title: 'Total Spend and Order by Customer',
                        animation: {
                            "startup": true,
                            duration: 4000,
                            easing: 'out'
                        },
                        vAxes: {
                            // Adds titles to each axis.
                            0: {
                                title: 'Amount of Total Spend'
                            },
                            1: {
                                title: 'Number of Order'
                            }
                        }
                    };

                    function drawMaterialChart() {
                        var materialChart = new google.charts.Bar(chartDiv);
                        materialChart.draw(data, google.charts.Bar.convertOptions(materialOptions));
                        button.innerText = 'Change to Classic';
                        button.onclick = drawClassicChart;
                    }

                    function drawClassicChart() {
                        var classicChart = new google.visualization.ColumnChart(chartDiv);
                        classicChart.draw(data, classicOptions);
                        button.innerText = 'Change to Material';
                        button.onclick = drawMaterialChart;
                    }

                    drawClassicChart();
                };



                // BAR CHART FOR AVG SPEND


                google.charts.load("current", {
                    packages: ['corechart']
                });
                google.charts.setOnLoadCallback(avgspend);

                function avgspend() {
                    var data = google.visualization.arrayToDataTable([
                        ['Name', 'Average of Spend'],
                        <?php echo $chartAvg; ?>
                    ]);

                    var options = {
                        title: "Average of Total Spend by Customer",
                        colors: ['purple'],
                        animation: {
                            "startup": true,
                            duration: 4000,
                            easing: 'out'
                        },
                        bar: {
                            groupWidth: "95%"
                        },
                        legend: {
                            position: "none"
                        },
                        hAxis: {
                            title: '',

                        },
                        vAxis: {
                            title: 'Average of Total Spend'
                        }
                    };
                    var chart = new google.visualization.ColumnChart(document.getElementById("avgspend_values"));
                    chart.draw(data, options);
                }


                // google.load('visualization', '1', {
                //     'packages': ['geochart']
                // });
                // google.setOnLoadCallback(drawMarkersMap);

                // function drawMarkersMap() {
                //     var data = new google.visualization.DataTable();
                //     data.addColumn('string', 'State');
                //     data.addColumn('number', 'Data');
                //     data.addRows([
                //         [{
                //             v: 'MY-14',
                //             f: ' Wilayah Persekutuan Kuala Lumpur'
                //         }, 42],
                //         [{
                //             v: 'MY-15',
                //             f: ' Wilayah Persekutuan Labuan'
                //         }, 57],
                //         [{
                //             v: 'MY-16',
                //             f: ' Wilayah Persekutuan Putrajaya'
                //         }, 38],
                //         [{
                //             v: 'MY-01',
                //             f: ' Johor'
                //         }, 82],
                //         [{
                //             v: 'MY-02',
                //             f: ' Kedah'
                //         }, 46],
                //         [{
                //             v: 'MY-03',
                //             f: ' Kelantan'
                //         }, 51],
                //         [{
                //             v: 'MY-04',
                //             f: ' Melaka'
                //         }, 72],
                //         [{
                //             v: 'MY-05',
                //             f: ' Negeri Sembilan'
                //         }, 16],
                //         [{
                //             v: 'MY-06',
                //             f: ' Pahang'
                //         }, 2],
                //         [{
                //             v: 'MY-08',
                //             f: ' Perak'
                //         }, 87],
                //         [{
                //             v: 'MY-09',
                //             f: ' Perlis'
                //         }, 29],
                //         [{
                //             v: 'MY-07',
                //             f: ' Pulau Pinang'
                //         }, 49],
                //         [{
                //             v: 'MY-12',
                //             f: ' Sabah'
                //         }, 26],
                //         [{
                //             v: 'MY-13',
                //             f: ' Sarawak'
                //         }, 94],
                //         [{
                //             v: 'MY-10',
                //             f: ' Selangor'
                //         }, 35],
                //         [{
                //             v: 'MY-11',
                //             f: ' Terengganu'
                //         }, 79],
                //     ]);


                //     var options = {
                //         region: 'MY',
                //         displayMode: 'regions',
                //         resolution: 'provinces',
                //     };

                //     var chart = new google.visualization.GeoChart(document.getElementById('chart_map'));
                //     chart.draw(data, options);
                // };
            </script>



        @endsection

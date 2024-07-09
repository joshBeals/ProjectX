<x-app-layout>
    @include('partials.pageTitle', ['title' => "Report Dashboard", 'slug' => $report->reference])
    <!-- Container-fluid starts-->
    <div class="container-fluid ecommerce-dashboard">
        @include('partials.report.userCards')
        <div class="row">
            <div class="col-sm-12 col-xl-6 box-col-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Top Spenders By Users</h4>
                    </div>
                    <div class="card-body">
                        <div id="top-spend"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6 box-col-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Top Spenders By Orders</h4>
                    </div>
                    <div class="card-body">
                        <div id="top-spend-order"></div>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.report.serviceCards')
        <div class="row">
            <div class="col-sm-12 col-xl-6 box-col-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Services By orders</h4>
                    </div>
                    <div class="card-body">
                        <div id="service-orders"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6 box-col-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Top Spenders By Orders</h4>
                    </div>
                    <div class="card-body">
                        <div id="providers-orders"></div>
                    </div>
                </div>
            </div>
              <div class="col-sm-12 col-xl-6 box-col-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Status Share </h4>
                  </div>
                  <div class="card-body apex-chart">
                    <div id="status-share"></div>
                  </div>
                </div>
              </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</x-app-layout>

<script>

    var topUsersBySpend = {!! json_encode($data['top_users_by_spend']) !!};
    var topUsersByOrders = {!! json_encode($data['top_users_by_orders']) !!};
    var topServicesByOrders = {!! json_encode($data['service_by_orders']) !!};
    var topProvicersByOrders = {!! json_encode($data['provider_by_orders']) !!};
    var statusShare = {!! json_encode($data['status_share']) !!};

    // basic bar chart
    var options1 = {
    chart: {
        height: 350,
        type: "bar",
        toolbar: {
        show: false,
        },
    },
    plotOptions: {
        bar: {
        horizontal: true,
        },
    },
    dataLabels: {
        enabled: false,
    },
    series: [{
        data: Object.values(topUsersBySpend),
    }],
    xaxis: {
        categories: Object.keys(topUsersBySpend),
    },
    colors: [CrocsAdminConfig.primary],
    };

    var chart1 = new ApexCharts(document.querySelector("#top-spend"), options1);

    chart1.render();
    

    // basic bar chart
    var options2 = {
    chart: {
        height: 350,
        type: "bar",
        toolbar: {
        show: false,
        },
    },
    plotOptions: {
        bar: {
        horizontal: true,
        },
    },
    dataLabels: {
        enabled: false,
    },
    series: [{
        data: Object.values(topUsersByOrders),
    }],
    xaxis: {
        categories: Object.keys(topUsersByOrders),
    },
    colors: [CrocsAdminConfig.primary],
    };

    var chart2 = new ApexCharts(document.querySelector("#top-spend-order"), options2);

    chart2.render();

    
    // basic bar chart
    var options3 = {
    chart: {
        height: 350,
        type: "bar",
        toolbar: {
        show: false,
        },
    },
    plotOptions: {
        bar: {
        horizontal: true,
        },
    },
    dataLabels: {
        enabled: false,
    },
    series: [{
        data: Object.values(topServicesByOrders),
    }],
    xaxis: {
        categories: Object.keys(topServicesByOrders),
    },
    colors: [CrocsAdminConfig.primary],
    };

    var chart3 = new ApexCharts(document.querySelector("#service-orders"), options3);

    chart3.render();

    
    // basic bar chart
    var options4 = {
    chart: {
        height: 350,
        type: "bar",
        toolbar: {
        show: false,
        },
    },
    plotOptions: {
        bar: {
        horizontal: true,
        },
    },
    dataLabels: {
        enabled: false,
    },
    series: [{
        data: Object.values(topProvicersByOrders),
    }],
    xaxis: {
        categories: Object.keys(topProvicersByOrders),
    },
    colors: [CrocsAdminConfig.primary],
    };

    var chart4 = new ApexCharts(document.querySelector("#providers-orders"), options4);

    chart4.render();

    // pie chart
    var options5 = {
        chart: {
            width: 380,
            type: 'pie',
        },
        labels: Object.keys(statusShare),
        series: Object.values(statusShare),
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    show: false
                }
            }
        }],
        colors: [
            '#008FFB', '#00E396', '#FEB019', '#FF4560', '#775DD0'
        ],
    };
    
    var chart5 = new ApexCharts(document.querySelector("#status-share"), options5);

    chart5.render();

</script>

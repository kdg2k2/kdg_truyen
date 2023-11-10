<!DOCTYPE html>
<html lang="en">

<head>
    @include('pages.admin.partials.head')
</head>

<body>
    @include('pages.admin.partials.loader')

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            @include('pages.admin.partials.header')

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @include('pages.admin.partials.sidebar')
                    <div class="pcoded-content">
                        <div class="page-header card">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="fa fa-bar-chart bg-c-blue"></i>
                                        <div class="d-inline">
                                            <h5>Dashboard</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <div class="row">

                                            <div class="col-md-12 col-xl-6 ">
                                                <div class="card comp-card">
                                                    <div class="card-body">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h6 class="m-b-25">Lượt xem nhiều nhất</h6>
                                                                <h3 class="f-w-700 text-c-blue">{{ $max_view->view }}
                                                                </h3>
                                                                <a target="_blank" href="/{{ $max_view->slug }}" class="m-b-0">{{ $max_view->tentruyen }}</a>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="fas fa fa-eye bg-c-blue"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card comp-card">
                                                    <div class="card-body">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h6 class="m-b-25">Lượt theo dõi nhiều nhất</h6>
                                                                <h3 class="f-w-700 text-c-red">{{
                                                                    count($max_td->theodoi) }}</h3>
                                                                    <a target="_blank" href="/{{ $max_td->slug }}" class="m-b-0">{{ $max_td->tentruyen }}</a>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="fas fa fa-heart-o bg-c-red"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card comp-card">
                                                    <div class="card-body">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h6 class="m-b-25">Nhiều bình luận nhất</h6>
                                                                <h3 class="f-w-700 text-c-yellow">{{
                                                                    count($max_bl->binhluan) }}</h3>
                                                                    <a target="_blank" href="/{{ $max_bl->slug }}" class="m-b-0">{{ $max_bl->tentruyen }}</a>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="fas fa fa-commenting-o bg-c-yellow"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-xl-6 ">
                                                <div class="card comp-card">
                                                    <div class="card-body">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h6 class="m-b-25">Like nhiều nhất</h6>
                                                                <h3 class="f-w-700 text-c-green">{{ count($max_like->like) }}
                                                                </h3>
                                                                <a target="_blank" href="/{{ $max_like->slug }}" class="m-b-0">{{ $max_like->tentruyen }}</a>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="fas fa fa-thumbs-o-up bg-c-green"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card comp-card">
                                                    <div class="card-body">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h6 class="m-b-25">Dislike nhiều nhất</h6>
                                                                <h3 class="f-w-700 text-c-orenge">{{
                                                                    count($max_dislike->dislike) }}</h3>
                                                                    <a target="_blank" href="/{{ $max_dislike->slug }}" class="m-b-0">{{ $max_dislike->tentruyen }}</a>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="fas fa fa-thumbs-o-down bg-c-orenge"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 ">
                                                <div class="card sale-card">
                                                    <div class="card-header">
                                                        <h5>Biểu Đồ Phân Phối Truyện Theo Thể Loại</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <canvas id="theloai_chart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="styleSelector">
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('pages.admin.partials.footer')
    <script src="{{ asset('/vendor/chart.js/Chart.min.js') }}"></script>


    <script>
        var data = @json($theloaiData);
        var ctx = document.getElementById('theloai_chart').getContext('2d');
        const colors = ['rgba(255, 99, 132, 0.2)','rgba(75, 192, 192, 0.2)','rgba(54, 162, 235, 0.2)','rgba(153, 102, 255, 0.2)','rgba(75, 192, 192, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'];

        var myPieChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.labels,
                datasets: [{
                    data: data.data,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    label: 'Số Lượng Truyện'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        display: false
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
                
            }
        });
    </script>
</body>

</html>
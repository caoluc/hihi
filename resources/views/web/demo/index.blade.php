<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rihla</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/assets/demo/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/demo/css/common.css">
    <link rel="stylesheet" type="text/css" href="/assets/demo/css/style.css">
    <link rel="stylesheet" href="/assets/demo/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/demo/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="/assets/demo/css/slick.css">
    <script type="text/javascript" src="/assets/demo/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/assets/demo/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/demo/js/slick.js"></script>
    <script type="text/javascript" src="/assets/demo/js/slick.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.min.js"></script>
</head>

<body>
<div class="body-wrapper">
    <div id ="tb_header" class="tb-header">
        <div class="top-header">
            <div class="row">
                <div class="col-md-4 col-sm-12 tb-menu">
                    <input id="button" class="menuInput" type="checkbox">
                    <label for="button" class="menuLabel"></label>
                    <ul class="menu menu-animation">
                        <li>
                            <a class="link" href="#">
                                <img width="20" height="20" src="/assets/demo/images/news.png">
                                ニュース
                            </a>
                        </li>
                        <li>
                            <a class="link" href="#">
                                <img width="20" height="20" src="/assets/demo/images/onair.png">
                                番組表
                            </a>
                        </li>
                        <li>
                            <a class="link" href="#">
                                <img width="20" height="20" src="/assets/demo/images/rating.png">
                                ランキング
                            </a>
                        </li>
                        <li>
                            <a class="link" href="#">
                                <img width="20" height="20" src="/assets/demo/images/featured_articles.png">
                                特集
                            </a>
                        </li>
                        <li>
                            <a class="link" href="#">
                                <img width="20" height="20" src="/assets/demo/images/calendar.png">
                                カレンダー
                            </a>
                        </li>
                        <li>
                            <a class="link" href="#">
                                <img width="20" height="20" src="/assets/demo/images/friend.png">
                                フォロー
                            </a>
                        </li>
                        <li>
                            <a class="link" href="#">
                                <img width="20" height="20" src="/assets/demo/images/threads.png">
                                スレッド
                            </a>
                        </li>
                        <li>
                            <a class="link" href="#">
                                <img width="20" height="20" src="/assets/demo/images/movie.png">
                                動画
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-12 tb-logo">
                    <img src="/assets/demo/images/rihla_logo.png">
                </div>
                <div class="col-md-4 col-sm-12 top-links">
                    <div class="signin-links pull-right">
                        <ul>
                            <li>
                                <a href="#">
                                    <span>サインイン</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="icon-help pull-right">
                        <a href="#">
                            <img src="/assets/demo/images/ic-help.png">
                        </a>
                    </div>
                    <div class="icon-search pull-right">
                        <a href="#">
                            <img src="/assets/demo/images/ic-search.png">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="main" class="tb-main" role="document">
        <div class="row-content">
            <div id="contents" class="" role="main">
                <div class="entry-content">
                    <div class="main-content column-left">
                        <div class="item-left">
                            <div class="title-home name-onair">
                                <h3>Destination</h3>
                            </div>
                            <div class="tb-news">
                                <div class="title-new">
                                    <h2>Tour list</h2>
                                </div>
                                <div class="box-item">
                                    <div class="slider slider-item">
                                        @foreach($tours as $t)
                                        <div class="item-inner slick-slide">
                                            <a href="{!! action('Web\DemoController@index', ['tourId' => $t->id]) !!}">
                                                <img src="/assets/demo/images/img-item.png">
                                            </a>
                                            <div class="box-info">
                                                <div class="item-title">
                                                    <a href="{!! action('Web\DemoController@index', ['tourId' => $t->id]) !!}">{{ $t->name }}</a>
                                                </div>
                                                <div class="item-broad">
                                                    <span>{{ $t->destination->name }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="loading-item">
                                        <div class="loading-item-inner">
                                            <div class="icon-loading"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-content detail-right mobile-detail-hidden">
                        <div class="ic-close">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </div>
                        <div class="box-detail">
                            <h1 class="tittle-headline">{{ $tour->headline }}</h1>
                            <h1 class="tittle-name">{{ $tour->name }}</h1>
                            <h1 class="tittle-tourvalue">Value: <font color="blue">+25,000円</font></h1>
                            <div class="images">
                                <iframe
                                        width="480"
                                        height="480"
                                        frameborder="0" style="border:0"
                                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA-l407KOM06Pi8JlTwZTYOWaJRhOk4XZ8
    &q=Ha Noi, Viet Nam" allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                        <div class="movie-main">
                            <div class="work-overview">
                                <div class="nittei_comp" style="">
                                    <div class="nittei">
                                        スケジュール

                                        @for ($i = 1; $i <= $tour->period; $i++)

                                            <div class="mv_info" style="clear:both;">
                                                <div class="trbox1" style="position:relative;float:left;">
                                                    <div class="trd1">{{ $i }}日目</div>
                                                    <div class="slep" style="width:130px;"></div>
                                                    <div class="trmo" style="position:relative;width:130px;height:30px;">
                                                        <div class="trd2">移動距離</div>
                                                        <div class="right" style="position:absolute;right:0;top:0;">{{$tour->route->where('day', $i)->sum('distance')}}km</div>
                                                        <div class="trmc1" style="position:absolute;height:5px;width:100%;background-color:#999999"></div>
                                                        <div class="trmc2" style="position:absolute;height:5px;width:0px;background-color:#FF78E9;"></div>
                                                    </div>
                                                    <div class="trmo" style="position:relative;width:130px;height:30px;">
                                                        <div class="trd2">移動時間</div>
                                                        <div class="right" style="position:absolute;right:0;top:0;">{{$tour->route->where('day', $i)->sum('traveltime')}}分</div>
                                                        <div class="trmc1" style="position:absolute;height:5px;width:100%;background-color:#999999"></div>
                                                        <div class="trmc2" style="position:absolute;height:5px;width:0px;background-color:#FF78E9;"></div>
                                                    </div>
                                                </div>
                                                <div class="trbox2" style="position:relative;float:left;width:240px;padding:5px 10px;">
                                                    {{--*/ @$routes = $tour->route->where('day', $i)  /*--}}
                                                    @foreach($routes as $route)
                                                        @if (empty($route->sport_id1_memo )) @continue @endif
                                                        @if ($route != end($routes)) <span class="trd3"><font><font>{{ $route->sport_id1_memo }}</font></font></span><br><div style="padding:5px;"><img src="/assets/demo/images/tr_sita.png" alt="↓" width="10" height="8"></div>@endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div  style="clear:both;"></div>
                            <br>
                            <div class="mv_info" style="background-color: #FFFFFF">
                                <canvas id="myChart1" width="100%" height="100%"></canvas>
                            </div>
                            <div  style="clear:both;"></div>
                            <br>
                            <!--<div class="mv_info" style="background-color: #FFFFFF">
                                <canvas id="myChart2" width="100%" height="100%"></canvas>
                            </div>
                            <div  style="clear:both;"></div>
                            <br>-->
                            <div class="mv_info" style="background-color: #FFFFFF">
                                <p style="color:#888788; font-weight:bold; font-size: 22; padding-left: 20px">1日の活動時間の内訳</p>
                                <canvas id="myChart3" width="100%" height="100%"></canvas>
                            </div>
                            <div  style="clear:both;"></div>
                            <br>
                            <div class="overview">
                                <p>{{ $tour->description }}</p>
                            </div>
                            <div  style="clear:both;"></div>
                            <br>
                            <div class="tb-calendar">
                                <div class="title-calendar">
                                    <h3>2015年12月</h3>
                                </div>
                                <div class="row box-item">
                                    <ul class="row-item">
                                    {{--*/ @$departs = $tour->depart  /*--}}
                                    @foreach($departs as $depart)

                                        <li>
                                            <div class="box-calendar">
                                                <a href="#">
                                                    <img src="/assets/demo/images/img-item-calendar.png">
                                                </a>
                                                <div class="box-info">
                                                    <div class="item-title">
                                                        <a href="#"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="time-date">
                                                <span class="cd-date"></span>
                                                <span class="cd-time">{{ $depart->date }}</span>
                                            </div>
                                        </li>

                                    @endforeach
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="loading-page">
                        <div class="loading-page-inner">
                            <div class="icon-loading"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    //万円
    var data = {
        labels: [
            @foreach($departs as $depart)
                "{{ $depart->date }}",
            @endforeach
        ],
        datasets: [
            {
                label: "料金(サーチャージ料込目安)",
                fill: false,
                lineTension: 0.1,
                backgroundColor: "rgba(75,192,192,0.4)",
                borderColor: "rgba(207, 108, 166, 1)",
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: "rgba(207, 108, 166, 1)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 5,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(207, 108, 166, 1)",
                pointHoverBorderColor: "rgba(207, 108, 166, 1)",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: [@foreach($departs as $depart)
                        {{ $depart->rate/10000 }},
                    @endforeach],
                spanGaps: false,
            }
        ]
    };

    var ctx = document.getElementById("myChart1");
    var ctx = document.getElementById("myChart1").getContext("2d");
    var ctx = $("#myChart1");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: {
            tooltips: {
            }
        }
    });


    var data2 = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "My First dataset",
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1,
                data: [65, 59, 80, 81, 56, 55, 40],
            }
        ]
    };

//    var ctx2 = $("#myChart2");
//    var myBarChart = new Chart(ctx2, {
//        type: 'horizontalBar',
//        data: data2
//    });

    var data3 = {
        title: '1日の活動時間の内訳',
        labels: [
            "ﾂｱｰ観光",
            "自由時間",
            "移動時間"
        ],
        datasets: [
            {
                data: [{{ $tour->total_tourtime }}, {{ $tour->total_freetime }}, {{ $tour->total_traveltime }}],
                backgroundColor: [
                    "#cf6ca6",
                    "#e6accd",
                    "#878687"
                ],
                hoverBackgroundColor: [
                    "#cf6ca6",
                    "#e6accd",
                    "#878687"
                ]
            }]
    };

    var ctx3 = $("#myChart3");
    var myPieChart = new Chart(ctx3,{
        type: 'pie',
        data: data3
    });
    $(document).ready(function(){
        $(".slider-item").slick({
            infinite: false,
            speed: 300,
            slidesToShow: 1,
            variableWidth: true,
        });
    });
</script>

</body>
</html>
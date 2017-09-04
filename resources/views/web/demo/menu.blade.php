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

<div id ="tb_header" class="tb-header">
    <div class="top-header">
        <div class="row">
            <div class="col-md-4 col-sm-12 tb-menu">
                <input id="button" class="menuInput" type="checkbox">
                <label for="button" class="menuLabel"></label>
                <ul class="menu menu-animation">
                    @foreach ($menu as $m)
                    <li>
                        <a class="link" href="{!! $m->menu_link !!}">
                            <img width="20" height="20" src="{!! $m->icon_url !!}">
                            {!! $m->name !!}
                        </a>
                    </li>
                    @endforeach
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

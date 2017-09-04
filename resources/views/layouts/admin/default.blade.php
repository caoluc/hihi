<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $title or trans('admin/global.title') }}</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        @include('layouts.admin.includes.styles')
        @include('layouts.admin.includes.scripts')
    </head>
    <body class="hold-transition skin-purple-light sidebar-mini">
        <div class="wrapper">
            @include('layouts.admin.includes.header')
            @include('layouts.admin.includes.left')
            <div class="content-wrapper">
                @include('layouts.admin.includes.nav')
                <section class="content">
                    @include('layouts.admin.includes.notice_messages')
                    @yield('content')
                </section>
            </div>
            @include('layouts.admin.includes.footer')
            <div class="control-sidebar-bg"></div>
        </div>
    </body>
</html>

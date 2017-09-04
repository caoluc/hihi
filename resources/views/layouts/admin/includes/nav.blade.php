<section class="content-header">
    <h1>
        {{ trans('admin/' . $nav['controller'] . '.title') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\HomeController@index') }}"><i class="fa fa-dashboard"></i>{{ trans('admin/global.home') }}</a></li>
        <li class="active">{{ trans('admin/' . $nav['controller'] . '.title') }}</li>
    </ol>
</section>
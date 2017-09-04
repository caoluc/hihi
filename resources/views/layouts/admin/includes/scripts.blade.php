{!! Html::script('assets/js/jquery.min.js') !!}
{!! Html::script('assets/js/jquery-ui.min.js') !!}
{!! Html::script('assets/js/bootstrap.min.js') !!}
{!! Html::script('assets/adminlte/js/app.min.js') !!}
{!! Html::script('assets/js/admin/admin.js') !!}
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
@yield('script')

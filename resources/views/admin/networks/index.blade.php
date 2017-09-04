@extends('layouts.admin.default')

@section('style')

@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('admin/networks.label.add_network') }}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
                <div class="box-body">
                    <div class="form-group">
                        <label for="network_name" class="col-sm-3 control-label">{{ trans('admin/networks.label.network_name') }}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="network_name" placeholder="{{ trans('admin/networks.label.network_name') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="network_id" class="col-sm-3 control-label">{{ trans('admin/networks.label.network_id') }}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="network_id" placeholder="{{ trans('admin/networks.label.network_id') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="network_key" class="col-sm-3 control-label">{{ trans('admin/networks.label.network_key') }}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="network_key" placeholder="{{ trans('admin/networks.label.network_key') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="network_alias" class="col-sm-3 control-label">{{ trans('admin/networks.label.network_alias') }}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="network_alias" placeholder="{{ trans('admin/networks.label.network_alias') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="base_url" class="col-sm-3 control-label">{{ trans('admin/networks.label.base_url') }}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="base_url" placeholder="{{ trans('admin/networks.label.base_url') }}">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">{{ trans('admin/networks.button.add_new') }}</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('admin/networks.label.post_back') }}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
                <div class="box-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td style="min-width: 350px;">{{ trans('admin/networks.label.select_network') }}</td>
                            <td style="min-width: 200px;">{{ trans('admin/networks.label.select_function') }}</td>
                        </tr>
                        <tr>
                            <td>
                                <select class="form-control" style="width: 80%">
                                    <option>Hi hihi</option>
                                    <option>Ha haha</option>
                                </select>
                            </td>
                            <td>
                                <a href="javascript:;" class="btn btn-success">
                                    {{ trans('admin/networks.button.get_link_postback') }}
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label for="link_postback">{{ trans('admin/networks.label.link_postback') }}</label>
                            <input type="text" class="form-control" id="link_postback" placeholder="{{ trans('admin/networks.label.link_postback') }}">
                        </div>
                    </div>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('admin/networks.label.report_lead') }}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>{{ trans('admin/networks.label.id') }}</th>
                        <th>{{ trans('admin/networks.label.network_name') }}</th>
                        <th>{{ trans('admin/networks.label.network_id') }}</th>
                        <th>{{ trans('admin/networks.label.network_key') }}</th>
                        <th>{{ trans('admin/networks.label.network_alias') }}</th>
                        <th>{{ trans('admin/networks.label.base_url') }}</th>
                        <th style="min-width: 200px;">{{ trans('admin/networks.label.actions') }}</th>
                    </tr>
                    <tr>
                        <td>183</td>
                        <td>John Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="label label-success">Approved</span></td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        <td>
                            <button type="button" class="btn btn-info">{{ trans('admin/networks.button.edit') }}</button>
                            <button type="button" class="btn btn-danger">{{ trans('admin/networks.button.delete') }}</button>
                        </td>
                    </tr>
                    <tr>
                        <td>183</td>
                        <td>John Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="label label-success">Approved</span></td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        <td>
                            <button type="button" class="btn btn-info">{{ trans('admin/networks.button.edit') }}</button>
                            <button type="button" class="btn btn-danger">{{ trans('admin/networks.button.delete') }}</button>
                        </td>
                    </tr>
                    <tr>
                        <td>183</td>
                        <td>John Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="label label-success">Approved</span></td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        <td>
                            <button type="button" class="btn btn-info">{{ trans('admin/networks.button.edit') }}</button>
                            <button type="button" class="btn btn-danger">{{ trans('admin/networks.button.delete') }}</button>
                        </td>
                    </tr>
                  </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="callout callout-info">
          <h4>{{ trans('admin/networks.label.note') }}</h4>

          <p>{{ trans('admin/networks.messages.note') }}</p>
        </div>
    </div>
</div>
@stop

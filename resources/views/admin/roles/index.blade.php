@extends('layouts.admin.default')

@section('style')

@endsection

@section('content')
<div class="box">
    <div class="box-header"></div>
    <div class="box-body table-responsive no-padding">
        <div class="col-sm-12">
            <table class="table table-hover">
                <thead>
                    <tr role="row">
                        <th>#</th>
                        <th>{!! trans('admin/roles.label.title') !!}</th>
                        <th>{!! trans('admin/roles.label.actions') !!}</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($roles as $role)
                    <tr role="row">
                        <td>{!! $role->id !!}</td>
                        <td>{!! $role->title !!}</td>
                        <td class="fit-content">
                            {!! link_to_action('Admin\RolesController@getChangePermission', trans('admin/roles.permission'), [$role->id], ['class' => 'btn btn-sm btn-success']) !!}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <span class="label label-warning">{!! trans('roles.label.no_roles') !!}</span>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

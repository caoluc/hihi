@extends('layouts.admin.default')

@section('style')

@endsection

@section('content')
<div class="box">
    <div class="box-header"></div>
    <div class="box-body table-responsive no-padding">
        <div class="col-sm-12">
            <div class="sort-by">
                {!! Form::open(['url'=> request()->fullUrl(),
                    'class' => 'form-inline filter-sort-form', 'role' => 'form',
                    'method' => 'GET', 'onChange' => 'submit()']) !!}
                <div class="form-group">
                    {!! trans('admin/users.label.sort_by') !!}
                </div>
                <div class="form-group">
                    {!! Form::select('sortBy', $filter['optionsSort'], $filter['sortBy'], ['class' => 'form-control']) !!}
                    {!! Form::hidden('perPage', $filter['limit']) !!}
                </div>

                <div class="input-group input-group-sm pull-right">
                    {!! Form::text('keyword', $filter['keyword'] ?? null, [
                        'class' => 'form-control pull-right',
                        'placeholder' => trans('admin/users.label.search')
                    ]) !!}
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <table class="table table-hover">
                <thead>
                    <tr role="row">
                        <th>#</th>
                        <th>{!! trans('admin/users.label.name') !!}</th>
                        <th>{!! trans('admin/users.label.email') !!}</th>
                        <th>{!! trans('users.role') !!}</th>
                        <th>{!! trans('admin/users.label.actions') !!}</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($users as $user)
                    <tr role="row">
                        <td>{!! $user->id !!}</td>
                        <td>{!! $user->name !!}</td>
                        <td>{!! $user->email !!}</td>
                        <td>{!! $user->role ? $user->role->title : '' !!}</td>
                        <td class="fit-content">
                            @if (!$user->isCurrent())
                                @if ($user->trashed())
                                    {!! Form::open(['action' => ['Admin\UsersController@restore', $user->id], 'method' => 'POST']) !!}
                                    {!! Form::submit(trans('admin/users.label.restore'), [
                                        'class' => 'btn btn-sm btn-warning openbutton',
                                        'onclick' => "return confirm('" . trans('admin/users.messages.restore_confirm') . "');"
                                    ]) !!}
                                    {!! Form::close() !!}
                                @else
                                    {!! link_to_action('Admin\UsersController@edit', trans('admin/users.label.edit'), [$user->id], ['class' => 'btn btn-sm btn-success']) !!}
                                    {!! Form::open(['action' => ['Admin\UsersController@destroy', $user->id], 'method' => 'DELETE']) !!}
                                        {!! Form::submit(trans('admin/users.label.delete'), [
                                            'class' => 'btn btn-sm btn-danger openbutton',
                                            'onclick' => "return confirm('" . trans('admin/users.messages.delete_confirm') . "');"
                                        ]) !!}
                                    {!! Form::close() !!}
                                @endif
                            @else
                                {!! link_to_action('Admin\UsersController@edit', trans('admin/users.label.edit'), [$user->id], ['class' => 'btn btn-sm btn-success']) !!}
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <span class="label label-warning">{!! trans('admin/users.label.no_users') !!}</span>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="box-footer clearfix pagination-limit">
        <div class="select-limit">
            <div class="form-inline">
                <div class="form-group">
                    {{ trans('admin/users.label.per_page') }}
                </div>
                <div class="form-group">
                    {!! Form::select(
                        'perPage',
                        config('list.limit.lists'),
                        $filter['limit'],
                        ['class' => 'form-control', 'id' => 'per-page'])
                    !!}
                </div>
            </div>
        </div>
        {!! method_exists($users, 'appends') ? $users->appends(request()->except('page'))->links() : '' !!}
    </div>
</div>
@stop

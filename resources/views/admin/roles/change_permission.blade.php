@extends('layouts.admin.default')

@section('style')
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $role->title }}</h3>
    </div>
    {!! Form::open(['action' => ['Admin\RolesController@postChangePermission', $role->id], 'method' => 'POST', 'autocomplete' => 'off']) !!}
        <div class="box-body">
            <div class="form-group">
                {!! Form::label('permission', trans('admin/roles.permission'), ['class' => 'control-label']) !!}
                <br>
                <div class="container-fluid">
                    @foreach($listPermissions as $key => $permissions)
                        {!! Form::label('permission.' . $key, trans('admin/roles.permissions.' . $key), ['class' => 'control-label']) !!}
                        <div class="form-group">
                            @foreach($permissions as $permission)
                                {!! Form::checkbox('permission[]', $permission, in_array($permission, $rolePermissions)) !!}{{ $permission }}
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            {!! Form::submit(trans('labels.submit'), ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
</div>
@endsection

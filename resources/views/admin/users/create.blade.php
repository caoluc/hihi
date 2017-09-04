@extends('layouts.admin.default')

@section('style')
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{!! trans('admin/users.label.create_user') !!}</h3>
    </div>
    {!! Form::open(['action' => 'Admin\UsersController@store', 'files' => 'true', 'autocomplete' => 'off']) !!}
        <div class="box-body">
            <div class="form-group">
                {!! Form::label('role_id', trans('admin/users.label.role'), ['class' => 'control-label']) !!}
                {!! Form::select('role_id', $roles, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', trans('admin/users.label.name')) !!}
                {!! Form::text('name', null, ['placeholder'=> trans('admin/users.label.name'), 'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', trans('admin/users.label.email')) !!}
                {!! Form::email('email', null, ['placeholder'=> trans('admin/users.label.email'), 'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', trans('admin/users.label.password'), ['class' => 'control-label']) !!}
                {!! Form::password('password', ['placeholder'=> trans('admin/users.label.password'), 'class'=>'form-control']) !!}
            </div>
            {!! Form::submit(trans('labels.submit'), ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
</div>
@endsection

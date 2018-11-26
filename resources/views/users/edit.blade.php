@extends('layouts.app')

@section('content')
    <a href="/users" class="btn btn-primary">Go Back</a>
    <h1>Edit User</h1>
    {!! Form::open(['action' => ['UsersController@update', $user->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}
        </div>
        <div class="form-group">
            {{Form::label('role', 'Role')}}<br>
            {{Form::select('role', ['' => '', 'writer' => 'Writer', 'editor' => 'Editor', 'publisher' => 'Publisher', 'admin' => 'Admin', 'user' => 'User'], $user->getRoleNames(), ['class' => 'form-control'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
        <a href="/users" class="btn btn-info">Cancel</a>
    {!! Form::close() !!}
    @role('admin')
        {!!Form::open(['action' => ['UsersController@passreset', $user->id], 'method' => 'POST', 'class' => 'pt-3'])!!}
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Reset Password', ['class' => 'btn btn-secondary'])}}
        {!!Form::close()!!}
        {!!Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'POST', 'class' => 'pt-3'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
    @endrole
@endsection
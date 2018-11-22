@extends('layouts.app')

@section('content')
    <h1>Edit User</h1>
    {!! Form::open(['action' => ['UsersController@update', $user->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Name')}}
            {{Form::text('title', $user->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('title', 'Email')}}
            {{Form::text('title', $user->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}
        </div>
        <div class="form-group">
            {{Form::label('title', 'Type')}}
            {{Form::text('title', $user->role, ['class' => 'form-control', 'placeholder' => 'Type'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
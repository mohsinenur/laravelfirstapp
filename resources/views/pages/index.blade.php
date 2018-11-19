@extends('layouts.app')
@section('content')
    <div class="jumbotron text-center">
        <h1>{{ $title }}</h1>
        <p>This is my first laravel app. Where you can create account and login to your account. Also crete post.</p>
        @guest
            <p><a href="/login" class="btn btn-primary btn-lg" role="button">Login</a> <a href="/register" class="btn btn-success btn-lg" role="button">Register</a></p>
        @else
            <p>Thank you.</p>
        @endguest
    </div>
@endsection


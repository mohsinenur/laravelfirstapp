@extends('layouts.app')
@section('content')
    <div class="jumbotron text-center">
        <h1>{{ $title }}</h1>
        <h3>By using this website you can register your account, login, creat, update, delete post.</h3>
        @guest
            <p><a href="/login" class="btn btn-primary btn-lg" role="button">Login</a> <a href="/register" class="btn btn-success btn-lg" role="button">Register</a></p>
        @else
            <p>Thank you.</p>
        @endguest
    </div>
@endsection


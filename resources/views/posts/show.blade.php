@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-primary btn-sm">Go Back</a>
    <p></p>
    <div class="card">
        <div class="card-body">
                <h1>{{$post->title}}</h1>
                <div>
                    {!!$post->body!!}
                </div>
                <hr>
                <small>Written on {{$post->created_at}} by {{$post->user['name']}}</small>
                <hr>
                <a href="/posts/{{$post->id}}/edit" class="btn btn-sm btn-success">Edit Post</a>
                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}
                {!!Form::close()!!}
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/posts/create" class="btn btn-primary">Create Post</a>
                </div>
                @if (count($posts) > 0)
                    <table class="table table-striped">
                        <h2 class="p-3">Your blog post</h2>
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>
                                        <a href="/posts/{{$post->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                        @endforeach
                    </table>
                    @else
                    <p class="p-3">You have no post.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

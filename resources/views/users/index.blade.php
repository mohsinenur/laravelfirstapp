@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Dashboard</div>
                @if (count($users) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$role}}</td>
                                    <td>
                                        @role('admin')
                                            <a href="/users/{{$user->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                                        @endrole
                                    </td>
                                    <td>
                                        @role('admin')
                                            {!!Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}
                                            {!!Form::close()!!}
                                        @endrole
                                    </td>
                                </tr>
                        @endforeach
                    </table>
                    @if (count($users) > 0)
                        <div class="p-3">
                            {{$users->links()}}
                        </div>
                    @endif
                    @else
                        <p class="p-3">No users found.</p>
                        @if (count($users) > 0)
                            {{$users->links()}}
                        @endif
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Users</div>
                {{-- @if (count($users) > 0) --}}
                    <h2 class="p-3">Users List</h2>
                    <div class="p-3">
                        <table class="table table-striped border" id="myTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th></th>
                                </tr>
                            </thead>
                            {{-- @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{preg_replace("/[^a-zA-Z0-9]+/", "", $user->getRoleNames())}}</td>
                                        
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
                            @endforeach --}}
                        </table>
                    </div>
                    {{-- @if (count($users) > 0)
                        <div class="p-3">
                            {{$users->links()}}
                        </div>
                    @endif
                    @else
                        <p class="p-3">No user found.</p>
                        @if (count($users) > 0)
                            {{$users->links()}}
                        @endif
                @endif --}}
            </div>
        </div>
    </div>
</div>
@endsection

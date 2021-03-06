@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('USER DATA') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <a href="/register" class="btn btn-primary">Add Data</a> 
                    <br><br>

                    <table class="table table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $s)
                            <tr>
                                <td>{{ $s->username }}</td>
                                <td>{{ $s->name }}</td>
                                <td>{{ $s->email }}</td>
                                <td>{{ $u->role }}</td>
                                <td>
                                    <form action="/user/{{$s->id}}" method="post">
                                        <a href="/user/{{$s->id}}/edit" class="btn btn-warning">Edit</a>
                                        <a href="/user/{{$s->id}}/" class="btn btn-warning">View</a>

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                        
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="/user">Halaman Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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

                    <form action="/user/{{$user->id}}" method="post">
                        {{csrf_field()}}
                        @method('PUT')
                        <input type="hidden" name="id" value="{{$user->id}}"></br>
                        <div class="form-group">
                            <label for="username">username : {{$user->username}}</label></br>
                        </div>
                        <div class="form-group">
                            <label for="name">Name : {{$user->name}}</label></br>
                        </div>
                        <div class="form-group">
                            <label for="class">Email : {{$user->email}}</label></br>
                        </div>
                        <div class="form-group">
                            <label for="password">Password : {{$user->password}}</label></br>
                        </div>
                    </form>
                    <a href="/user">Halaman Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
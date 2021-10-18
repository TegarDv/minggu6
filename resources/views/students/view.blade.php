@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('STUDENT DATA') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="/students/{{$student->id}}" method="post">
                        {{csrf_field()}}
                        @method('PUT')
                        <input type="hidden" name="id" value="{{$student->id}}"></br>
                        <div class="form-group">
                            <label for="nim">NIM : {{$student->nim}}</label></br>
                        </div>
                        <div class="form-group">
                            <label for="name">Name : {{$student->name}}</label></br>
                        </div>
                        <div class="form-group">
                            <label for="class">Class : {{$student->class}}</label></br>
                        </div>
                        <div class="form-group">
                            <label for="department">Department : {{$student->department}}</label></br>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number : {{$student->phone_number}}</label></br>
                        </div>
                    </form>
                    <a href="/students">Halaman Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
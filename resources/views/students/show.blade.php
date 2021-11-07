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

                    <img width="70px" src="{{asset('storage/'.$student->photo)}}"><br><br>
                    Name         : {{$student->name}} <br>
                    Class        : {{$student->kelas->class_name}} <br>
                    Department   : {{$student->department}} <br>
                    Phone Number : {{$student->phone_number}} <br>
                    Create at    : {{ $student->created_at }} <br>
                    Update at    : {{ $student->updated_at }} <br><br>
                    <a href="/students">Halaman Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
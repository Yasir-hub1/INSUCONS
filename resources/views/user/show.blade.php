@extends('adminlte::page')

@section('content_header')
    <a class="btn btn-primary btn-sm float-right" href="{{route('users.index')}}">Back</a>
    <h1>USUARIO:  {{$user->email}}</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <strong>NOMBRE:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <strong>CI:</strong>
                            {{ $user->ci}}
                        </div>
                        <div class="form-group">
                            <strong>TELEFONO:</strong>
                            {{ $user->telefono }}
                        </div>
                        {{-- <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

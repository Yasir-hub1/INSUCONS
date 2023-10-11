@extends('adminlte::page')

@section('content_header')
    <a class="btn btn-primary btn-sm float-right" href="{{route('roles.index')}}">Back</a>
    <h1>Editar Rol</h1>
@endsection

@section('content')
    <br>
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">

                    <div class="card-body">
                        {!! Form::model($role, ['route' => ['roles.update', $role], 'method' => 'put']) !!}
                            @include('role.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

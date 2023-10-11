@extends('adminlte::page')

@section('content_header')
    <a class="btn btn-primary btn-sm float-right" href="{{ route('clientes.index') }}"> Back</a>

    <h1>CLIENTE:    {{ $cliente->nombre }}</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <strong>Dni:</strong>
                            {{ $cliente->dni }}
                        </div>
                        {{-- <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $cliente->nombre }}
                        </div> --}}
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $cliente->telefono }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

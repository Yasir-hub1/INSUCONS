@extends('adminlte::page')

@section('content_header')
    <a class="btn btn-primary btn-sm float-right" href="{{ route('empleados.index') }}"> Back</a>
    <h1>EMPLEADO:    {{ $empleado->nombre }}</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Dni:</strong>
                            {{ $empleado->dni }}
                        </div>
                        {{-- <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $empleado->nombre }}
                        </div> --}}
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $empleado->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $empleado->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Cargo:</strong>
                            {{ $empleado->cargo }}
                        </div>
                        <div class="form-group">
                            <strong>Salario:</strong>
                            {{ $empleado->salario }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('adminlte::page')

@section('content_header')
    <a href="{{ route('metodos.index') }}" class="btn btn-success btn-sm float-right">Back</a>
    <h1> Metodo de Pago</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $metodo->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

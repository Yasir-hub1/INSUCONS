@extends('adminlte::page')

@section('content_header')
    <a class="btn btn-primary btn-sm float-right"href="{{ route('presupuestos.index') }}">Back</a>
    <h1> {{ $presupuesto->descripcion }}</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Usuario:</strong>
                            {{ $presupuesto->usuario }}
                        </div>
                        <div class="form-group">
                            <strong>Cliente:</strong>
                            {{ $presupuesto->cliente }}
                        </div>
                        <div class="form-group">
                            <strong>Servicio:</strong>
                            @foreach ($presupuesto->servicios as $item)
                                {{ $item->nombre }}<br>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $presupuesto->total }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

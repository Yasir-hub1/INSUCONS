@extends('adminlte::page')

@section('content_header')
    <a href="{{ route('materiales.index') }}" class="btn btn-primary btn-sm float-right">Back</a>
    <h1>Material</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $materiale->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $materiale->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Costo:</strong>
                            {{ $materiale->costo }}
                        </div>
                        <div class="form-group">
                            <strong>Stock:</strong>
                            {{ $materiale->stock }}
                        </div>
                        <div class="form-group">
                            <strong>Medida Id:</strong>
                            {{ $materiale->medida_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

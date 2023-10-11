@extends('adminlte::page')

@section('content_header')
    <a class="btn btn-primary btn-sm float-right" href="{{route('servicios.index')}}">Back</a>
     <h1>Servicio:   {{ $servicio->nombre}}</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">

                        {{-- <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $servicio->nombre }}
                        </div> --}}
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $servicio->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Costo:</strong>
                            {{ $servicio->costo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

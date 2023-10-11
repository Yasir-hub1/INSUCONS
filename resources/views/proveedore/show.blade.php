@extends('adminlte::page')

@section('content_header')
    <a class="btn btn-primary btn-sm float-right"href="{{ route('proveedores.index') }}">Back</a>
    <h1> {{ $proveedore->empresa }}</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nit:</strong>
                            {{ $proveedore->nit }}
                        </div>
                       {{--  <div class="form-group">
                            <strong>Empresa:</strong>
                            {{ $proveedore->empresa }}
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

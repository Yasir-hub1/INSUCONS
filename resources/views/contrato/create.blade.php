@extends('adminlte::page')

@section('content_header')
    <a href="{{ route('contratos.index') }}" class="btn btn-primary btn-sm float-right">Back </a>
    <h1>Crear Nuevo Contrato</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">

                    <div class="card-body">
                        <form method="POST" action="{{ route('contratos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('contrato.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

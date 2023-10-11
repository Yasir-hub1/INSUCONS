@extends('adminlte::page')

@section('content_header')
    <a href="{{ route('metodos.index') }}" class="btn btn-success btn-sm float-right">Back</a>
    <h1>Crear Nuevo Metodo de Pago</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">

                    <div class="card-body">
                        <form method="POST" action="{{ route('metodos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('metodo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

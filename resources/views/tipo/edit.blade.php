@extends('adminlte::page')


@section('content_header')
    <a class="btn btn-primary btn-sm float-right" href="{{ route('tipos.index') }}"> Back</a>
    <h1> Editar Tipo de Nota</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">

                    <div class="card-body">
                        <form method="POST" action="{{ route('tipos.update', $tipo->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tipo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

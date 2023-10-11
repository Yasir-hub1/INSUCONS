@extends('adminlte::page')

@section('content_header')
    <a class="btn btn-primary btn-sm float-right" href="{{route('notas.index')}}">Back</a>
    <h1>Crear Nota</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Nota</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('notas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('nota.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

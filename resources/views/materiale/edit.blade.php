@extends('adminlte::page')

@section('content_header')
    <a href="{{ route('materiales.index') }}" class="btn btn-primary btn-sm float-right">Back</a>
    <h1>Editar Material</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">

                    <div class="card-body">
                        <form method="POST" action="{{ route('materiales.update', $materiale->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('materiale.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

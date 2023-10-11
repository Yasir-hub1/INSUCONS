@extends('adminlte::page')


@section('content_header')
<a class="btn btn-primary btn-sm float-right"href="{{route('roles.index')}}">Back</a>
    <h1>Crear nuevo rol</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">

                    <div class="card-body">
                        <form method="POST" action="{{ route('roles.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('role.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>@stop

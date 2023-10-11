@extends('adminlte::page')

@section('content_header')
    <a href="{{ route('informes.create') }}" class="btn btn-success btn-sm float-right">Nuevo</a>
    <h1>Lista de Informes</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="informes" class="table table-striped dt-responsive nowrap">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Titulo</th>
                                        <th>Proyecto</th>
                                        <th>Descripcion</th>
                                        <th>Fecha</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($informes as $informe)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $informe->titulo }}</td>
                                            @foreach ($proyectos as $proyecto)
                                                @if ($informe->proyecto_id == $proyecto->id)
                                                    <td>{{ $proyecto->nombre }}
                                                @endif
                                            @endforeach
                                            {{-- <td>{{ $informe->proyecto->nombre }}</td> --}}
                                            <td>{{ $informe->descripcion }}</td>
                                            <td>{{ $informe->fecha }}</td>

                                            <td>
                                                <form action="{{ route('informes.destroy', $informe->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-dark "
                                                        href="{{ route('informes.show', $informe->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-warning"
                                                        href="{{ route('informes.edit', $informe->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $informes->links() !!}
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap5.min.css">
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap5.min.js"></script>
    <script>
        $('#informes').DataTable({
            responsive: true,
            autoWidth: false
        });
    </script>
@endsection

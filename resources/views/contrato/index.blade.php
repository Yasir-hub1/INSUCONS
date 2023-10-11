@extends('adminlte::page')

@section('content_header')
    <a href="{{ route('contratos.create') }}" class="btn btn-success btn-sm float-right">Nuevo Contrato </a>
    <h1>Lista de Contratos</h1>
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
                            <table id="contratos" class="table table-striped dt-responsive nowrap">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Empleado</th>
                                        <th>Cliente</th>
                                        <th>Proyecto</th>
                                        <th>Presupuesto</th>
                                        <th>Factura</th>
                                        <th>Descripcion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contratos as $contrato)
                                        <tr>
                                            <td>{{ $contrato->id }}</td>

                                            <td>{{ $contrato->usuario }}</td>
                                            @foreach ($usuarios as $usuario )
                                                @if ($usuario->id==$contrato->user_id)
                                                <td>{{ $usuario->name }}</td>
                                                @endif
                                            @endforeach
                                           {{--  <td>{{ $contrato->cliente->nombre }}</td> --}}
                                           @foreach ($proyectos as $proyecto )
                                                @if ($contrato->proyecto_id==$proyecto->id)
                                                <td>{{ $proyecto->nombre }}</td>
                                                @endif
                                            @endforeach
                                           {{--  <td>{{ $contrato->proyecto->nombre }}</td> --}}
                                            <td>{{ $contrato->presupuesto->descripcion }}</td>
                                            <td>{{ $contrato->factura->nit }}</td>
                                            <td>{{ $contrato->descripcion }}</td>

                                            <td>
                                                <form action="{{ route('contratos.destroy', $contrato->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-dark "
                                                        href="{{ route('contratos.show', $contrato->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-warning"
                                                        href="{{ route('contratos.edit', $contrato->id) }}"><i
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
        $('#contratos').DataTable({
            responsive: true,
            autoWidth: false
        });
    </script>
@endsection

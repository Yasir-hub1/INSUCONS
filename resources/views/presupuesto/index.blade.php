@extends('adminlte::page')

@section('content_header')
    <a class="btn btn-success btn-sm float-right" href="{{ route('presupuestos.create') }}">Nuevo Presupuesto </a>
    <h1>Lista de presupuestos</h1>
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
                            <table id="presupuestos" class="table table-striped dt-responsive nowrap">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Usuario</th>
                                        <th>cliente</th>
                                        <th>Descripcion</th>
                                        <th>Servicios</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($presupuestos as $presupuesto)
                                        <tr>
                                            <td>{{ $presupuesto->id }}</td>
                                            <td>{{ $presupuesto->usuario }}</td>
                                            <td>{{ $presupuesto->cliente }}</td>
                                            <td>{{ $presupuesto->descripcion }}</td>
                                            <td>
                                                @foreach ($presupuesto->servicios as $item)
                                                    {{ $item->nombre }}<br>
                                                @endforeach
                                            </td>
                                            <td>{{ $presupuesto->total }}</td>
                                            <td>
                                                <form action="{{ route('presupuestos.destroy', $presupuesto->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-dark "
                                                        href="{{ route('presupuestos.show', $presupuesto->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-warning"
                                                        href="{{ route('presupuestos.edit', $presupuesto->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Edit</a>
                                                    <a class="btn btn-sm btn-primary"
                                                        href="{{ route('facturas.create') }}"><i
                                                            class="fa fa-fw fa-edit"></i> Crear Factura</a>
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
        $('#presupuestos').DataTable({
            responsive: true,
            autoWidth: false
        });
    </script>
@endsection

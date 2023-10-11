@extends('adminlte::page')

@section('content_header')
    <a class="btn btn-success btn-sm float-right"href="{{ route('notas.create') }}">Nueva Nota</a>
    <h1> Lista de Notas</h1>
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
                            <table id="notas" class="table table-striped dt-responsive nowrap">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Tipo</th>
                                        <th>Empleado</th>
                                        <th>Proveedor</th>
                                        <th>Materiales</th>
                                        <th>Descripcion</th>
                                        <th>Fecha</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notas as $nota)
                                        <tr>
                                            <td>{{ $nota->id }}</td>
                                            <td>{{ $nota->tipo->nombre }}</td>
                                            <td>{{ $nota->usuario }}</td>
                                            <td>{{ $nota->proveedore->empresa }}</td>
                                            <td>
                                                @foreach ($nota->materiales as $item)
                                                    {{ $item->nombre }}<br>
                                                @endforeach
                                            </td>

                                            <td>{{ $nota->descripcion }}</td>
                                            <td>{{ $nota->fecha }}</td>

                                            <td>
                                                <form action="{{ route('notas.destroy', $nota->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-dark "
                                                        href="{{ route('notas.show', $nota->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-warning"
                                                        href="{{ route('notas.edit', $nota->id) }}"><i
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
        $('#notas').DataTable({
            responsive: true,
            autoWidth: false
        });
    </script>
@endsection

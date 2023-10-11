@extends('adminlte::page')

@section('content_header')
    <a href="{{ route('empleados.create') }}" class="btn btn-success btn-sm float-right" data-placement="left">
        {{ __('Create New') }}
    </a>
    <a href="{{ route('empleados.export') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
        <i class="fa fa-fw fa-file-export"></i> {{ __('Exportar') }}
    </a>

    <h1>Lista de empleados</h1>
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
                            <table id="empleados" class="table table-striped dt-responsive nowrap">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Dni</th>
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Direccion</th>
                                        <th>cargo</th>
                                        <th>Salario</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empleados as $empleado)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $empleado->dni }}</td>
                                            <td>{{ $empleado->nombre }}</td>
                                            <td>{{ $empleado->telefono }}</td>
                                            <td>{{ $empleado->direccion }}</td>
                                            <td>{{ $empleado->cargo }}</td>
                                            <td>{{ $empleado->salario }}</td>

                                            <td>
                                                <form action="{{ route('empleados.destroy', $empleado->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-dark "
                                                        href="{{ route('empleados.show', $empleado->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-warning"
                                                        href="{{ route('empleados.edit', $empleado->id) }}"><i
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
                {!! $empleados->links() !!}
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
        $('#empleados').DataTable({
            responsive: true,
            autoWidth: false
        });
    </script>
@endsection

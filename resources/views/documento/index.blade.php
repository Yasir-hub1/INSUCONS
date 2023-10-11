@extends('adminlte::page')

@section('content_header')
    <a href="{{ route('archivos.create') }}" class="btn btn-success btn-sm float-right">Nuevo</a>
    <h1>Lista de Documentos</h1>
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
                            <table id="documentos" class="table table-striped dt-responsive nowrap">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Nombre</th>
                                        <th>Url</th>
                                        <th>Nro Contrato</th>
                                        <th>Contrato</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documentos as $documento)
                                        <tr>
                                            <td>{{ $documento->id }}</td>

                                            <td>{{ $documento->nombre }}</td>
                                            <td>
                                                {{-- <iframe src="{{ asset('storage') . '/' . $documento->url }}" frameborder="0"
                                                    width="200" height="200"></iframe> --}}
                                                <a href="{{ asset('storage') . '/' . $documento->url }}"
                                                    target="_blank">{{ $documento->nombre }}</a>
                                            </td>
                                            <td>{{ $documento->contrato->id }}</td>
                                            <td>{{ $documento->contrato->descripcion }}</td>

                                            <td>
                                                <form action="{{ route('archivos.destroy', $documento->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-dark "
                                                        href="{{ route('archivos.show', $documento->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-warning"
                                                        href="{{ route('archivos.edit', $documento->id) }}"><i
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
        $('#documentos').DataTable({
            responsive: true,
            autoWidth: false
        });
    </script>
@endsection

@extends('adminlte::page')

@section('content_header')
    @can('users.create')
        <a class="btn btn-success btn-sm float-right" href="{{ route('roles.create') }}">Nuevo rol</a>
    @endcan
    <h1>Lista de roles</h1>
@endsection

@section('content')
    <br>
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
                            <table id="roles" class="table table-striped dt-responsive nowrap">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
                                        <th>Role</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('roles.destroy')
                                                        <button type="submit" class="btn btn-danger btn-sm float-right"><i
                                                                class="fa fa-fw fa-trash"></i> Delete</button>
                                                    @endcan

                                                    @can('roles.edit')
                                                        <a class="btn btn-sm btn-warning float-right"
                                                            href="{{ route('roles.edit', $role->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @endcan
                                                    {{-- @can('roles.show')
                                                 <a class="btn btn-sm btn-dark float-right"
                                                     href="{{ route('roles.show', $role->id) }}"><i
                                                         class="fa fa-fw fa-eye"></i> Show</a>
                                             @endcan --}}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- {!! $users->links() !!} --}}
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
        $('#roles').DataTable({
            responsive: true,
            autoWidth: false
        });
    </script>
@endsection

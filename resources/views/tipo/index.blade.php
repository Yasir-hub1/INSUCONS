@extends('adminlte::page')

@section('content_header')
<a href="{{ route('tipos.create') }}" class="btn btn-success btn-sm float-right" >Nuevo</a>
    <h1>Tipos de Notas</h1>
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Nombre</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tipos as $tipo)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $tipo->nombre }}</td>

                                            <td>
                                                <form action="{{ route('tipos.destroy',$tipo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-dark " href="{{ route('tipos.show',$tipo->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-warning" href="{{ route('tipos.edit',$tipo->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $tipos->links() !!}
            </div>
        </div>
    </div>
@endsection

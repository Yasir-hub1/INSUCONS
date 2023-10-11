@extends('adminlte::page')

@section('template_title')
    Nota
@endsection

@section('content')
    <div class="container px-4 py-5" id="icon-grid">
        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24"
            style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
            <path
                d="M22 7.999a1 1 0 0 0-.516-.874l-9.022-5a1.003 1.003 0 0 0-.968 0l-8.978 4.96a1 1 0 0 0-.003 1.748l9.022 5.04a.995.995 0 0 0 .973.001l8.978-5A1 1 0 0 0 22 7.999zm-9.977 3.855L5.06 7.965l6.917-3.822 6.964 3.859-6.918 3.852z">
            </path>
            <path d="M20.515 11.126 12 15.856l-8.515-4.73-.971 1.748 9 5a1 1 0 0 0 .971 0l9-5-.97-1.748z"></path>
            <path d="M20.515 15.126 12 19.856l-8.515-4.73-.971 1.748 9 5a1 1 0 0 0 .971 0l9-5-.97-1.748z"></path>
        </svg>
        <h2 class="pb-2 border-bottom">INSUCONS <span class="text-muted">REPORTES</span></h2>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
            <div class="col d-flex align-items-start">
                <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <div>
                    <h3 class="fw-bold mb-0 fs-4"><a href="{{ route('empleados.export') }}" class="text-reset">Empleados</a>
                    </h3>
                    <p>Crear un reporte cuantitativo sobre todos los empleados de la empresa.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                    <use xlink:href="#cpu-fill"></use>
                </svg>
                <div>
                    <h3 class="fw-bold mb-0 fs-4"><a class="text-reset" href="{{ route('clientes.export') }}">Clientes</a>
                    </h3>
                    <p>Crear un reporte cuantitativo sobre todos los clientes de la empresa.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                    <use xlink:href="#calendar3"></use>
                </svg>
                <div>
                    <h3 class="fw-bold mb-0 fs-4"><a href="{{ route('proveedores.export') }}" class="text-reset">Proveedores</a></h3>
                    <p>Crear un reporte cuantitativo sobre todos los proveedores de la empresa.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                    <use xlink:href="#home"></use>
                </svg>
                <div>
                    <h3 class="fw-bold mb-0 fs-4"><a href="{{ route('servicios.export') }}" class="text-reset">Servicios</a></h3>
                    <p>Crear un reporte cuantitativo sobre todos los servicios de la empresa.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                    <use xlink:href="#speedometer2"></use>
                </svg>
                <div>
                    <h3 class="fw-bold mb-0 fs-4"><a href="{{ route('servicios.export') }}" class="text-reset">Materiales</a></h3>
                    <p>Crear un reporte cuantitativo sobre todos los Materiales de la empresa.</p>
                </div>
            </div>
            {{-- <div class="col d-flex align-items-start">
                <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                    <use xlink:href="#toggles2"></use>
                </svg>
                <div>
                    <h3 class="fw-bold mb-0 fs-4">Notas de entradas</h3>
                    <p>Paragraph of text beneath the heading to explain the heading.</p>
                </div>
            </div> --}}
            <div class="col d-flex align-items-start">
                <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                    <use xlink:href="#geo-fill"></use>
                </svg>
                <div>
                    <h3 class="fw-bold mb-0 fs-4">Notas</h3>
                    <p>Crear un reporte cuantitativo sobre todas las Notas de la empresa.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                    <use xlink:href="#tools"></use>
                </svg>
                <div>
                    <h3 class="fw-bold mb-0 fs-4"><a href="{{ route('registros.export') }}" class="text-reset">Registro de Actividades</a></h3>
                    <p>Crear un reporte  sobre todos los movimientos de los Usuarios en el Sistema</p>
                </div>
            </div>
        </div>
    </div>
@endsection

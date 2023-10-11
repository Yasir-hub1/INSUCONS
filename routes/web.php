<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\MaterialeController;
use App\Http\Controllers\MetodoController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\PresupuestoController;
use App\Http\Controllers\ProveedoreController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users', UserController::class);
Route::get('log', [ActivityLogController::class, 'index'])->name('activitylog');
Route::resource('clientes', ClienteController::class);
Route::resource('empleados', EmpleadoController::class);
Route::resource('presupuestos', PresupuestoController::class);
Route::resource('servicios', ServicioController::class);
Route::resource('informes', InformeController::class);
Route::resource('proyectos', ProyectoController::class);
Route::resource('facturas', FacturaController::class);
Route::resource('contratos', ContratoController::class);
Route::resource('archivos', DocumentoController::class);
Route::resource('proveedores', ProveedoreController::class);
Route::resource('materiales', MaterialeController::class);
Route::resource('entradas', EntradaController::class);
Route::resource('salidas', SalidaController::class);
Route::resource('roles', RoleController::class);
Route::resource('notas', NotaController::class);
Route::resource('metodos', MetodoController::class);
Route::resource('tipos', TipoController::class);

//Exportacion de archivos
Route::get('export', [ReporteController::class, 'index'])->name('reportes.index');
Route::get('export/registros', [ActivityLogController::class, 'export'])->name('registros.export');
Route::get('export/empleados', [EmpleadoController::class, 'export'])->name('empleados.export');
Route::get('export/clientes', [ClienteController::class, 'export'])->name('clientes.export');
Route::get('export/proveedores', [ProveedoreController::class, 'export'])->name('proveedores.export');
Route::get('export/materiales', [MaterialeController::class, 'export'])->name('materiales.export');
Route::get('export/servicios', [ServicioController::class, 'export'])->name('servicios.export');

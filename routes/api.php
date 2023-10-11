<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClienteController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Rutas de autentificación
// Route::post('register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post("/signup",[AuthController::class,"signup"]);

Route::post("/documentos",[ClienteController::class,"postDocumento"]);


//TODO: RUTAS PROTEGIDAS POR SANCTUM
Route::group(['middleware'=>'auth:sanctum'],function () {
    Route::post("/logout",[AuthController::class,"logout"]);
    Route::get("/contracto",[ClienteController::class,"getContratos"]);
    Route::get("/documento",[ClienteController::class,"getDocumento"]);
    Route::post("/ObtenerProyecto",[ClienteController::class,"ObtenerProyecto"]);
    Route::post("/ObtenerInforme",[ClienteController::class,"ObtenerInforme"]);
    Route::post("/ObtenerPresupuesto",[ClienteController::class,"ObtenerPresupuesto"]);
    Route::post("/ObtenerServicio",[ClienteController::class,"ObtenerServicio"]);

    Route::get("/CountContrato",[ClienteController::class,"CountContrato"]);
    Route::get("/CountDocumentos",[ClienteController::class,"CountDocumentos"]);
     Route::get("/CountInformes",[ClienteController::class,"CountInformes"]);

     Route::post("/SumCostoTotalServicios",[ClienteController::class,"SumCostoTotalServicios"]);

});




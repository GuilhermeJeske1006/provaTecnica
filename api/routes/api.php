<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PedidoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function () {

    // Usuarios
    Route::get('/usuarios', [UsuarioController::class, 'index']);


    // produtos
     Route::get('/produtos', [ProdutoController::class, 'index']);
     Route::post('/pedido', [PedidoController::class, 'store']);

});
Route::get('/usuarios', [UsuarioController::class, 'index']);

Route::post('/usuario', [UsuarioController::class, 'store']);
Route::post('/login', [UsuarioController::class, 'Login']);

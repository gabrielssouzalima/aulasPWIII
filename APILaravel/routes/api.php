<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\ClientesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
// Rotas para visualizar registros
Route::get('/clientes', [ClientesController::class, 'index']);         // lista todas as clientes
Route::get('/clientes/{id}', [ClientesController::class, 'show']);     // mostra roupa por ID

// Rota para inserir registros
Route::post('/clientes', [ClientesController::class, 'store']);        // cria nova roupa

// Rota para alterar registros
Route::put('/clientes/{id}', [ClientesController::class, 'update']);   // atualiza roupa existente

// Rota para excluir registros
Route::delete('/clientes/{id}', [ClientesController::class, 'destroy']); // exclui roupa por ID


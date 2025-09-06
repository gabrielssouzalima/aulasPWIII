<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoupasController;

Route::get('/', function () {
    return response()->json(['Sucesso' => true]);
});

// Rotas para visualizar registros
Route::get('/roupas', [RoupasController::class, 'index']);         // lista todas as roupas
Route::get('/roupas/{id}', [RoupasController::class, 'show']);     // mostra roupa por ID

// Rota para inserir registros
Route::post('/roupas', [RoupasController::class, 'store']);        // cria nova roupa

// Rota para alterar registros
Route::put('/roupas/{id}', [RoupasController::class, 'update']);   // atualiza roupa existente

// Rota para excluir registros
Route::delete('/roupas/{id}', [RoupasController::class, 'destroy']); // exclui roupa por ID
?>

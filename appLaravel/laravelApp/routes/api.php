<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiEstoqueController;

Route::get('/', function () {
    return response()->json(['Sucesso' => true]);
});


Route::get('/estoque', [ApiEstoqueController::class, 'index']);         
Route::get('/estoque/{id}', [ApiEstoqueController::class, 'show']);    


Route::post('/estoque', [ApiEstoqueController::class, 'store']);       

Route::put('/estoque/{id}', [ApiEstoqueController::class, 'update']);   

Route::delete('/estoque/{id}', [ApiEstoqueController::class, 'destroy']);
?>
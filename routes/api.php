<?php

use App\Http\Controllers\TarefaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Translation\Catalogue\TargetOperation;

Route::post('tarefa', [TarefaController::class, 'cadastrar']);
Route::get('tarefa/find/id', [TarefaController::class, 'findByIdRequest']); 
Route::get('tarefa/{id}', [TarefaController::class, 'findById']); /*Criei uma rota do tipo get - buscar dados, 
escolhi um nome para ser colocado na URL, depois chamei em classe TarefaController, a função findById. 
*/
Route::get('tarefa', [TarefaController::class, 'index']);
Route::delete('tarefa/deletar',[TarefaController::class, 'delete']);
Route::put('tarefa/update', [TarefaController::class, 'update']);
Route::get('tarefa/find/day/month', [TarefaController::class, 'findByDayMonth']);

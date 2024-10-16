<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function cadastrar(Request $request)
    {
        $tarefa = Tarefa::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Cadastrado',
            'data' => $tarefa
        ]);
    }

    public function findById($id)
    {
        $tarefa = Tarefa::find($id);

        return response()->json([
            'status' => true,
            'data' => $tarefa
        ]);
    }

    public function findByIdRequest(Request $request)
    {
        $tarefa = Tarefa::find($request->id);

        return response()->json([
            'status' => true,
            'data' => $tarefa
        ]);
    }

    public function index()
    {
        $tarefas = Tarefa::all();

        if ($tarefas->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Tarefas não encontradas'
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Tarefas econtradas',
            'data' => $tarefas
        ]);
    }



    public function delete(Request $request)
    {
        $tarefa = Tarefa::find($request->id);

        $tarefa->delete();

        if ($tarefa == null) {
            return response()->json([
                'status' => false,
                'message' => 'Tarefa não pode ser excluida'
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Tarefa excluida'
        ]);
    }

    public function update(Request $request)
    {
        $tarefa = Tarefa::find($request->id);

        if ($tarefa == null) {
            return response()->json([
                'status' => false,
                'message' => "Tarefa não encontrada"
            ]);
        }

        if (isset($request->titulo)) {
            $tarefa->titulo = $request->titulo;
        }

        if (isset($request->descricao)) {
            $tarefa->descricao = $request->descricao;
        }

        if (isset($request->status)) {
            $tarefa->status = $request->status;
        }

        $tarefa->save();

        return response()->json([
            'status' => true,
            'message' => 'Atualizado'
        ]);
    }

    public function findByDayMonth(Request $request)
    {
        $tarefas = Tarefa::whereDay('created_at', $request->day)->WhereMonth('created_at', '=', $request->Month)->get();

        if ($tarefas->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Não há tarefas criadas neste dia'
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $tarefas
        ]);
    }

   
}

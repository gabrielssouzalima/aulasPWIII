<?php

namespace App\Http\Controllers;

use App\Models\Roupas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoupasController extends Controller
{
    public function index()
    {
        $roupas = Roupas::all();
        $total = $roupas->count();

        if ($total > 0) {
            return response()->json([
                'success' => true,
                'message' => 'Roupas encontradas com sucesso!',
                'data' => $roupas,
                'total' => $total
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Nenhuma roupa encontrada.',
        ], 404);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'tipo' => 'required',
            'preco' => 'required',
            'quantidade' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Registros inválidos',
                'errors' => $validator->errors()
            ], 400);
        }

        $roupa = Roupas::create($request->all());

        if ($roupa) {
            return response()->json([
                'success' => true,
                'message' => 'Roupa cadastrada com sucesso!',
                'data' => $roupa
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao cadastrar a roupa'
            ], 500);
        }
    }

    public function show($id)
    {
        $roupa = Roupas::find($id);

        if ($roupa) {
            return response()->json([
                'success' => true,
                'message' => 'Roupa localizada com sucesso!',
                'data' => $roupa
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Roupa não localizada.',
            ], 404);
        }
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'tipo' => 'required',
            'preco' => 'required',
            'quantidade' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Registros inválidos',
                'errors' => $validator->errors()
            ], 400);
        }

        $roupaExistente = Roupas::find($id);

        if (!$roupaExistente) {
            return response()->json([
                'success' => false,
                'message' => 'Roupa não encontrada'
            ], 404);
        }

        $roupaExistente->nome = $request->nome;
        $roupaExistente->tipo = $request->tipo;
        $roupaExistente->preco = $request->preco;
        $roupaExistente->quantidade = $request->quantidade;

        if ($roupaExistente->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Roupa atualizada com sucesso!',
                'data' => $roupaExistente
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao atualizar a roupa'
            ], 500);
        }
    }

    public function destroy($id)
    {
        $roupa = Roupas::find($id);

        if (!$roupa) {
            return response()->json([
                'success' => false,
                'message' => 'Roupa não encontrada'
            ], 404);
        }

        if ($roupa->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Roupa deletada com sucesso'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Erro ao deletar a roupa'
        ], 500);
    }
}

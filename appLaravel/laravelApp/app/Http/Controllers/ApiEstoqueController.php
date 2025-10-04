<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiEstoqueController extends Controller
{
    public function index()
    {
        $estoque = Estoque::all();
        $total = $estoque->count();

        if ($total > 0) {
            return response()->json([
                'success' => true,
                'message' => 'Eletrodomesticos encontrados!',
                'data' => $estoque,
                'total' => $total
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Nenhum eletrodomestico encontrado.',
        ], 404);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomeProd' => 'required',
            'marcaProd' => 'required',
            'descProd' => 'required',
            'qtdProd' => 'required',
            'dtEntradaProd' => 'required',
            'dtSaidaProd' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Registros invalidos',
                'errors' => $validator->errors()
            ], 400);
        }

        $estoque = Estoque::create($request->all());

        if ($estoque) {
            return response()->json([
                'success' => true,
                'message' => 'Eletrodomestico cadastrado com sucesso!',
                'data' => $estoque
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao cadastrar eletrodomestico'
            ], 500);
        }
    }

    public function show($id)
    {
        $estoque = Estoque::find($id);

        if ($estoque) {
            return response()->json([
                'success' => true,
                'message' => 'Eletrodomestico encontrado com sucesso.',
                'data' => $estoque
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Eletrodomestico nao localizado.',
            ], 404);
        }
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nomeProd' => 'required',
            'marcaProd' => 'required',
            'descProd' => 'required',
            'qtdProd' => 'required',
            'dtEntradaProd' => 'required',
            'dtSaidaProd' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Registros invalidos',
                'errors' => $validator->errors()
            ], 400);
        }

        $estoqueAtual = Estoque::find($id);

        if (!$estoqueAtual) {
            return response()->json([
                'success' => false,
                'message' => 'Eletrodomestico nao encontrado'
            ], 404);
        }

        $estoqueAtual->nomeProd = $request->nomeProd;
        $estoqueAtual->marcaProd = $request->marcaProd;
        $estoqueAtual->descProd = $request->descProd;
        $estoqueAtual->qtdProd = $request->qtdProd;
        $estoqueAtual->dtEntradaProd = $request->dtEntradaProd;
        $estoqueAtual->dtSaidaProd = $request->dtSaidaProd;

        if ($estoqueAtual->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Eletrodomestico atualizado com sucesso!',
                'data' => $estoqueAtual
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao atualizar eletrodomestico'
            ], 500);
        }
    }

    public function destroy($id)
    {
        $estoque = Estoque::find($id);

        if (!$estoque) {
            return response()->json([
                'success' => false,
                'message' => 'Eletrodomestico nao encontrado'
            ], 404);
        }

        if ($estoque->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Eletrodomestico deletado com sucesso'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Erro ao deletar eletrodomestico'
        ], 500);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ClienteHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = ClienteHotel::all();
        $contador = $clientes->count();

        if ($contador > 0) {
            return response()->json([
                'status' => true,
                'data' => $clientes,
                'message' => 'Clientes encontrados com sucesso'
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Nenhum cliente encontrado'
        ], 404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:250',
            'endereco' => 'required|string|max:250',
            'telefone' => 'required|string|size:9',
            'CPF' => 'required|string|size:11',
            'numero_quarto' => 'required|integer|between:1,500'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Erro de validação',
                'errors' => $validator->errors()
            ], 422);
        }

        $cliente = ClienteHotel::create($request->all());

        if ($cliente) {
            return response()->json([
                'status' => true,
                'message' => 'Cliente cadastrado com sucesso',
                'data' => $cliente
            ], 201);
        }

        return response()->json([
            'status' => false,
            'message' => 'Não foi possível cadastrar o cliente.'
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cliente = ClienteHotel::find($id);

        if ($cliente) {
            return response()->json([
                'status' => true,
                'message' => 'Cliente encontrado com sucesso',
                'data' => $cliente
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Cliente não encontrado'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:250',
            'endereco' => 'required|string|max:250',
            'telefone' => 'required|string|size:9',
            'CPF' => 'required|string|size:11',
            'numero_quarto' => 'required|integer|between:1,500'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Erro de validação',
                'errors' => $validator->errors()
            ], 422);
        }

        $cliente = ClienteHotel::find($id);

        if (!$cliente) {
            return response()->json([
                'status' => false,
                'message' => 'Registro não localizado'
            ], 404);
        }

        $cliente->nome = $request->nome;
        $cliente->endereco = $request->endereco;
        $cliente->telefone = $request->telefone;
        $cliente->CPF = $request->CPF;
        $cliente->numero_quarto = $request->numero_quarto;

        if ($cliente->save()) {
            return response()->json([
                'status' => true,
                'message' => 'Informações do cliente atualizadas com sucesso!',
                'data' => $cliente
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Erro ao atualizar o cliente'
        ], 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = ClienteHotel::find($id);

        if (!$cliente) {
            return response()->json([
                'status' => false,
                'message' => 'Cliente não localizado'
            ], 404);
        }

        if ($cliente->delete()) {
            return response()->json([
                'status' => true,
                'message' => 'Informações do cliente deletadas com sucesso'
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Erro ao deletar informações do cliente'
        ], 500);
    }
}

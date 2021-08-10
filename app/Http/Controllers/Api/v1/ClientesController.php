<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateClientesRequest;
use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ClientesController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        try {
            $clientes = Clientes::get();

            return response()->json($clientes, 200);

        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $cliente = Clientes::where('id', $id)
                ->get();

            return response()->json($cliente);

        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            Clientes::create([
                'nome' => $request->nome,
                'cpf' => $request->cpf,
                'endereco' => $request->endereco,
            ]);

            return response()->json(['code' => 200, 'message' => 'Cliente inserido com sucesso', 'data' => 'sucess'], 200);

        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }


    public function update(Request $request, $id)
    {
        try {

            Clientes::where('id', $id)->update(['nome' => $request->nome,
                'cpf' => $request->cpf,
                'endereco' => $request->endereco
            ]);

            return response()->json(['code' => 200, 'message' => 'Cliente Atualizado com sucesso', 'data' => 'sucess'], 200);

        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {

            $cliente = Clientes::find($id);

            $cliente->delete();

            return response()->json([
                'message' => 'Deletado com sucesso!'
            ]);

        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }
}

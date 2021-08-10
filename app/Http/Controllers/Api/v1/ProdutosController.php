<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        try {
            $clientes = Produtos::get();

            return response()->json($clientes, 200);

        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $produtos = Produtos::where('id', $id)
                ->get();

            return response()->json($produtos);

        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {

        try {
            Produtos::create([
                'nome_produto' => $request->nome_produto,
                'preco' => $request->preco,
            ]);

            return response()->json(['code' => 200, 'message' => 'Produto inserido com sucesso', 'data' => 'sucess'], 200);

        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }


    public function update(Request $request, $id)
    {
        try {

            Produtos::where('id', $id)->update(['nome_produto' => $request->nome_produto,
                'preco' => $request->preco
            ]);

            return response()->json(['code' => 200, 'message' => 'Produto Atualizado com sucesso', 'data' => 'sucess'], 200);

        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {

            $produto = Produtos::find($id);

            $produto->delete();

            return response()->json([
                'message' => 'Deletado com sucesso!'
            ]);

        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }
}

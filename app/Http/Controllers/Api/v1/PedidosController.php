<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateClientesRequest;
use App\Models\PedidosCompras;
use Illuminate\Http\Request;


class PedidosController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        try {
            $pedidos = PedidosCompras::with('produtos', 'clientes')->get();

            return response()->json($pedidos, 200);

        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $pedidos = PedidosCompras::with('produtos', 'clientes')
                ->where('id', $id)->get();

            return response()->json($pedidos, 200);

        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {

        try {
            PedidosCompras::create([
                'clientes_id' => $request->clientes_id,
                'produtos_id' => $request->produtos_id
            ]);

            return response()->json(['code' => 200, 'message' => 'Produto inserido com sucesso', 'data' => 'sucess'], 200);

        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {

            PedidosCompras::where('id', $id)->update(['clientes_id' => $request->clientes_id,
                'produtos_id' => $request->produtos_id
            ]);

            return response()->json(['code' => 200, 'message' => 'Produto Atualizado com sucesso', 'data' => 'sucess'], 200);

        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }

    public function destroy($idCliente)
    {
        try {

            $pedido = PedidosCompras::where('clientes_id', $idCliente);

            if ($pedido->delete()) {
                return response()->json([
                    'message' => 'Deletado com sucesso!'
                ]);
            }

        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }

}

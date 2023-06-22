<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItemPedido;
use App\Models\Pedido;
use Illuminate\Support\Facades\DB;


class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $pedido = new Pedido();
            $pedido->dataPedido = new \DateTime();
            $pedido->save();

            foreach ($request->input('itens') as $item) {
                $itens = new ItemPedido();
                $itens->quantidade = $item['quantidade'];
                $itens->produto_id = $item['id'];
                $itens->pedido_id = $pedido->id;
                $itens->save();
            }

            DB::commit();
            return response()->json(["message" => "Pedido Criado com sucesso"], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["message" => $e], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

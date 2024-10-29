<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Models\Produto;

class PedidoController extends Controller
{
    // Exibir lista de pedidos
    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedidos.index', compact('pedidos'));
    }

    // Exibir formulário de criação de pedido
    public function create()
    {
        // Busca todos os produtos
        $produtos = Produto::all();

        // Retorna a view com a lista de produtos
        return view('pedidos.create', compact('produtos'));
    }

    // Método para armazenar o pedido
   // No seu controlador de Pedidos
public function store(Request $request)
{
    // Validação dos dados do pedido
    $validatedData = $request->validate([
        'cliente' => 'required|string|max:255',
        'produto' => 'required|exists:produtos,nome', // Verifica se o produto existe
        'quantidade' => 'required|integer|min:1',
        'preco' => 'required|numeric|min:0',
    ]);

    // Criação do pedido
    $pedido = new Pedido();
    $pedido->cliente = $validatedData['cliente'];
    $pedido->produto = $validatedData['produto'];
    $pedido->quantidade = $validatedData['quantidade'];
    $pedido->preco = $validatedData['preco'];
    $pedido->save();

   // Redireciona para a lista de pedidos com uma mensagem de sucesso
return redirect()->route('pedidos.index')->with('success', 'Pedido criado com sucesso!');

}


    // Exibir um pedido específico
    public function show(Pedido $pedido)
    {
        return view('pedidos.show', compact('pedido'));
    }

    // Exibir formulário de edição
    public function edit(Pedido $pedido)
    {
        return view('pedidos.edit', compact('pedido'));
    }

    // Atualizar pedido
    public function update(Request $request, Pedido $pedido)
    {
        $request->validate([
            'cliente' => 'required',
            'produto' => 'required',
            'quantidade' => 'required|integer',
            'preco' => 'required|numeric',
        ]);

        $pedido->update($request->all());
        return redirect()->route('pedidos.index')->with('success', 'Pedido atualizado com sucesso.');
    }

    // Excluir pedido
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedidos.index')->with('success', 'Pedido excluído com sucesso.');
    }



}


<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    public function index()
    {
        $produtos = Produto::all(); // ou use a lógica para paginar ou filtrar os produtos
        return view('produtos.index', compact('produtos'));
    }
    

    public function create(){
        return view('produtos.create');
    }

    public function show($id){
        $produto = Produto::findOrFail($id);
        return view('produtos.show', compact('produto'));
    }

    public function edit($id){
        $produto = Produto::findOrFail($id);
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255',
            'custo' => 'required|numeric',
            'preco' => 'required|numeric',
            'quantidade' => 'required|integer',
        ]);

        $produto->update($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }


    public function delete($id){
        $produto = Produto::findOrFail($id);
        return view('produtos.delete', compact('produto'));
    }
     

    public function destroy($id){
        $produto = Produto::findOrFail($id);
        $produto->delete();
    
        // Redirecionar após a exclusão com uma mensagem de sucesso
        return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso!');
    }
    
    public function store(Request $request)
{
    // Validação dos dados do produto
    $request->validate([
        'nome' => 'required|string|max:255',
        'custo' => 'required|numeric',
        'preco' => 'required|numeric',
        'quantidade' => 'required|integer',
    ]);

    // Criação do novo produto
    $produto = Produto::create([
        'nome' => $request->nome,
        'custo' => $request->custo,
        'preco' => $request->preco,
        'quantidade' => $request->quantidade,
    ]);

    // Redirecionar para a página do produto recém-criado, com uma mensagem de sucesso
    return redirect()->route('produtos.show', $produto->id)->with('success', 'Produto cadastrado com sucesso!');
}

    

}
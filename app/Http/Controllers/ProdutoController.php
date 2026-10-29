<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
   
    public function dashboard()
    {
        $totalProdutos = Produto::count();
        $estoqueBaixo = Produto::whereColumn('quantidade_estoque', '<=', 'estoque_minimo')->count();
        
        return view('livewire.produto-index', compact('totalProdutos', 'estoqueBaixo'));
    }


    public function index()
    {
        $produtos = Produto::all();
        return view('livewire.produto-index', compact('produtos'));
    }

    // Mostrar formulário de cadastro
    public function create()
    {
        return view('livewire.produto-create');
    }

    // Salvar novo produto no banco de dados
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'preco_custo' => 'required|numeric',
            'preco_venda' => 'required|numeric',
            'quantidade_estoque' => 'required|integer',
            'estoque_minimo' => 'required|integer',
        ]);

        Produto::create($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso!');
    }

    // Alerta de Estoque Mínimo
    public function estoqueMinimo()
    {
        // Produtos cuja quantidade em estoque é menor ou igual ao estoque mínimo
        $produtos = Produto::whereColumn('quantidade_estoque', '<=', 'estoque_minimo')->get();
        return view('livewire.produto-index', compact('produtos'));
    }
}
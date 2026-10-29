<?php

namespace App\Livewire;

use App\Models\Produto;
use Livewire\Component;

class ProdutoIndex extends Component
{
    public function render()
    {
        $produtos = Produto::all();
        return view('livewire.produto-index', compact('produtos')
        );



    }

    public function salvar(){

    Produto::create([
'nome'=> $this ->nome, 
'marca'=> $this -> marca,
'descricao'=> $this -> descricao,
'preco_custo'=> $this -> preco_custo,
'preco_venda'=> $this -> preco_venda,
'quantidade'=> $this -> quantidade,
'uso'=> $this -> uso,

    ]);
    
    }
    
}

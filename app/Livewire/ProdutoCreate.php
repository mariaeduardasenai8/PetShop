<?php

namespace App\Livewire;

use Livewire\Component;

class ProdutoCreate extends Component

{

public $nome;
public $marca;
public $cadastro;
public $descricao;
public $preco_custo;
public $preco_venda;
public $quantidade;
public $uso;



    public function render()
    {
        
        return view('livewire.produto-create');
    }
}

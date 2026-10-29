<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'marca',
        'categoria',
        'preco_custo',
        'preco_venda',
        'quantidade_estoque',
        'estoque_minimo',
        'data_validade'
    ];
}
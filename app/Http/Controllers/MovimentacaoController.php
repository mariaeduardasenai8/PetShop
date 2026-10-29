<?php

namespace App\Http\Controllers;

use App\Models\MovimentacaoEstoque;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovimentacaoController extends Controller
{
    // Listar o histórico de movimentações
    public function index()
    {
        $movimentacoes = MovimentacaoEstoque::with(['produto', 'funcionario'])->latest()->get();
        $produtos = Produto::all();
        return view('livewire.estoque-index', compact('movimentacoes', 'produtos'));
    }

    // Registar uma entrada ou saída de estoque
    public function store(Request $request)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'tipo_operacao' => 'required|in:ENTRADA,SAIDA',
            'quantidade' => 'required|integer|min:1',
            'observacao' => 'nullable|string|max:255',
        ]);

        $produto = Produto::findOrFail($request->produto_id);

        // Validação da regra: Impedir estoque negativo em caso de SAÍDA
        if ($request->tipo_operacao === 'SAIDA') {
            if ($produto->quantidade_estoque < $request->quantidade) {
                return back()->withErrors(['quantidade' => 'Operação negada! A quantidade em estoque não pode ficar negativa. Stock atual: ' . $produto->quantidade_estoque]);
            }
            $produto->quantidade_estoque -= $request->quantidade;
        } else {
            // Se for ENTRADA
            $produto->quantidade_estoque += $request->quantidade;
        }

        $produto->save();

        // Registar a movimentação
        MovimentacaoEstoque::create([
            'produto_id' => $produto->id,
            'funcionario_id' => 1, // Temporário ou Auth::id() se houver login ativo
            'tipo_operacao' => $request->tipo_operacao,
            'quantidade' => $request->quantidade,
            'observacao' => $request->observacao,
        ]);

        return redirect()->route('estoque.index')->with('success', 'Movimentação de estoque registada com sucesso!');
    }
}
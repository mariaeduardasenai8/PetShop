<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\LoginIndex;
use App\Livewire\LoginCreate;
use App\Livewire\ProdutoIndex;
use App\Livewire\ProdutoCreate;
use App\Livewire\ProdutoEdit;
use App\Http\Controllers\ProdutoController;

// Página principal abre a tela de Login
Route::get('/', LoginIndex::class)->name('login');

// Rotas de Login / Usuários
Route::get('/login', LoginIndex::class);
Route::get('/login/criar', LoginCreate::class)->name('login.create');

// Rotas de Produtos
Route::get('/produtos', ProdutoIndex::class)->name('produtos.index');
Route::get('/produtos/criar', ProdutoCreate::class)->name('produtos.create');
Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store'); // <-- Adiciona esta linha
Route::get('/produtos/{id}/editar', ProdutoEdit::class)->name('produtos.edit');
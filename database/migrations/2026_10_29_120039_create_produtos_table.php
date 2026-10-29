<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
  

    Schema::create('produtos', function (Blueprint $table) {
        $table->id();
        $table->string('nome');
        $table->text('descricao')->nullable();
        $table->string('marca');
        $table->string('categoria'); // Ex: Rações, Medicamentos, etc.
        $table->decimal('preco_custo', 10, 2);
        $table->decimal('preco_venda', 10, 2);
        $table->integer('quantidade_estoque')->default(0);
        $table->integer('estoque_minimo')->default(5);
        $table->date('data_validade')->nullable(); // Opcional para produtos sem validade
        $table->timestamps();
    });
}
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};

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
    Schema::create('movimentacao_estoques', function (Blueprint $table) {
        $table->id();
      
        $table->foreignId('produto_id')->constrained('produtos')->onDelete('cascade');
        $table->foreignId('funcionario_id')->constrained('funcionarios');
        $table->enum('tipo_operacao', ['ENTRADA', 'SAIDA']);
        $table->integer('quantidade');
        $table->string('observacao')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimentacao_estoques');
    }
};

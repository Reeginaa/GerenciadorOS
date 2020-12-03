<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnexoOrcamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anexo_orcamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 250)->nullable(false);
            $table->string('nome_arquivo')->nullable(false);
            $table->string('nome_arquivo_salvo')->nullable(false);
            $table->unsignedBigInteger('ordemServico_id')->nullable(false);
            $table->timestamps();

            $table->foreign('ordemServico_id')->references('id')->on('ordem_servicos')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anexo_orcamentos');
    }
}

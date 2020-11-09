<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdemServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordem_servicos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('dataInicio')->nullable(false);
            $table->dateTime('dataTermino');
            $table->string('defeito', 200)->nullable(false);
            $table->string('observacoesOS', 350);
            $table->decimal('valorTotal', 8, 2);
            $table->boolean('termos')->nullable(false);
            $table->string('nome_arquivo', 40);
            $table->string('url_arquivo', 80);
            $table->unsignedBigInteger('statusServico_id')->nullable(false);
            $table->unsignedBigInteger('pessoa_id')->nullable(false);
            $table->unsignedBigInteger('equipamento_id')->nullable(false);
            $table->timestamps();

            $table->foreign('statusServico_id')->references('id')->on('status_servicos')->onDelete('restrict');
            $table->foreign('pessoa_id')->references('id')->on('pessoas')->onDelete('restrict');
            $table->foreign('equipamento_id')->references('id')->on('equipamentos')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordem_servicos');
    }
}

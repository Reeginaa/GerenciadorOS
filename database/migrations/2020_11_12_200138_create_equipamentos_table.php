<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nomeEquipamento', 45)->nullable(false);
            $table->string('modelo', 50);
            $table->string('numeroSerie', 50)->unique();
            $table->string('observacoesEquipamento', 350);
            $table->unsignedBigInteger('marca_id')->nullable(false);
            $table->timestamps();

            $table->foreign('marca_id')->references('id')->on('marcas')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipamentos');
    }
}

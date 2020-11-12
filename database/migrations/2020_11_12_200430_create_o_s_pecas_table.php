<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOSPecasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('o_s_pecas', function (Blueprint $table) {
            $table->id();
            $table->decimal('valorPeca', 8, 2)->nullable(false);
            $table->integer('quantidade');
            $table->unsignedBigInteger('ordemServico_id')->nullable(false);
            $table->unsignedBigInteger('peca_id')->nullable(false);
            $table->timestamps();

            $table->foreign('ordemServico_id')->references('id')->on('ordem_servicos')->onDelete('cascade');
            $table->foreign('peca_id')->references('id')->on('pecas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('o_s_pecas');
    }
}

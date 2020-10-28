<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOSServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('o_s_servicos', function (Blueprint $table) {
            $table->id();
            $table->decimal('valorServico', 8, 2)->nullable(false);
            $table->unsignedBigInteger('ordemServico_id')->nullable(false);
            $table->unsignedBigInteger('servico_id')->nullable(false);
            $table->timestamps();

            $table->foreign('ordemServico_id')->references('id')->on('ordem_servicos')->onDelete('restrict');
            $table->foreign('servico_id')->references('id')->on('servicos')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('o_s_servicos');
    }
}

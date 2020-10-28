<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePecasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pecas', function (Blueprint $table) {
            $table->id();
            $table->string('item', 100)->nullable(false);
            $table->integer('quantidade')->nullable(false);
            $table->decimal('valorCompra', 8, 2)->nullable(false);
            $table->decimal('valorVenda', 8 ,2)->nullable(false);
            $table->decimal('desconto', 4, 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pecas');
    }
}

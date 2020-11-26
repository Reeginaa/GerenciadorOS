<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 250)->nullable(false);
            $table->string('cpf', 14)->nullable(false)->unique();
            $table->string('rg', 10)->nullable(false)->unique();
            $table->dateTime('dataNascimento');
            $table->string('sexo', 20)->nullable(false);
            $table->string('logradouro', 300)->nullable(false);
            $table->integer('numero')->nullable(false);
            $table->string('complemento', 350);
            $table->string('bairro', 100)->nullable(false);
            $table->string('cidade', 50)->nullable(false);
            $table->string('email', 400);
            $table->string('senha', 20)->nullable(false);
            $table->string('telefone', 25);
            $table->unsignedBigInteger('tipoPessoa_id')->nullable(false);
            $table->timestamps();

            $table->foreign('tipoPessoa_id')->references('id')->on('tipo_pessoas')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
}

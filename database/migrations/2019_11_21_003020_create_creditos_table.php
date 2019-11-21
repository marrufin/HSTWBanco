<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->boolean('tipo')->default(1)->nullable(false);
            $table->string('codigo')->nullable(false);
            $table->string('descripcion')->nullable();
            $table->boolean('activo')->default(1)->nullable(false);
            $table->string('institucion')->nullable(false);
            $table->integer('comportamiento')->nullable(false);/**1- Verde - 2-Amarillo 3-Rojo */
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
        Schema::dropIfExists('creditos');
    }
}

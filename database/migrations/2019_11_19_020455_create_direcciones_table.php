<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("cliente_id");
            $table->foreign("cliente_id")->references("id")->on('clientes');
            $table->string('calle', 50)->nullable(false);
            $table->integer('num_int')->nullable();
            $table->integer('num_ext')->nullable();
            $table->string('entre_calles', 100)->nullable();
            $table->integer('codigo_postal')->nullable();
            $table->string('colonia', 100)->nullable(false);
            $table->string('ciudad', 100)->nullable(false);
            $table->string('estado', 100)->nullable(false);
            $table->string('pais', 100)->nullable(false);
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
        Schema::dropIfExists('direcciones');
    }
}

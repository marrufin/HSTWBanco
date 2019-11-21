<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 100)->nullable(false);
            $table->string('ap_paterno', 100)->nullable(false);
            $table->string('ap_materno', 100)->nullable();
            $table->date('fecha_nac')->nullable();
            $table->string('curp', 50)->nullable(false);
            $table->string('rfc', 50)->nullable(false);
            $table->boolean("activo")->default(1)->nullable();
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
        Schema::dropIfExists('clientes');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aportes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_concepto');
            $table->foreign('id_concepto')->references('id')->on('concepto_aportes');
            $table->date('fecha');
            $table->integer('valor');
            $table->unsignedInteger('id_miembro');
            $table->foreign('id_miembro')->references('id')->on('miembros');
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
        Schema::dropIfExists('aportes');
    }
}

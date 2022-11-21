<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->integer('idEstado');
            $table->integer('idUsuarioSistema');
            $table->timestamp('fechaEntrega');
            $table->timestamp('fechaSalida');
            $table->double('total');
            $table->integer('idCliente');
            $table->string('apunte');
            $table->integer('lugarEntrega');
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
            $table->double('restante');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
};

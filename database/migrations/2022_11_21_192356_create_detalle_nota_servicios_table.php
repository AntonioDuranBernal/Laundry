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
    Schema::create('detalle_nota_servicios', function (Blueprint $table) {
            $table->id();
            $table->integer('idNota');
            $table->integer('idArticulo');
            $table->integer('idServicio');
            $table->string('descripcion')->nullable();
            $table->double('subtotal');
            $table->integer('estado');
            $table->integer('cantidad');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_nota_servicios');
    }
};

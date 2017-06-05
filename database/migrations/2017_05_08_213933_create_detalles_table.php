<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('detalles', function (Blueprint $table) {

            $table->integer('id_envio')->unsigned();
            $table->integer('id_detalle')->unsigned();
            $table->char('cod_marca')->unsigned();
            $table->char('cod_modelo')->unsigned();
            $table->char('cod_master')->unsigned();
            $table->char('anio')->unsigned();
            $table->char('col_ext')->unsigned();
            $table->char('col_int')->unsigned();
            $table->integer('cantidad')->nullable();
            $table->integer('cantidad_aprobada')->nullable();
            $table->integer('cantidad_enviada')->nullable();
            $table->integer('cantidad_entregada')->nullable();
            $table->date('fecha_envio')->nullable();
            $table->date('fecha_estimada_arribo')->nullable();
            $table->date('fecha_arribo')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('estado')->nullable();
            $table->timestamps();

            $table->primary(['id_envio', 'id_detalle']);

            $table->foreign('id_envio')->references('id_envio')->on('envios')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles');
    }
}

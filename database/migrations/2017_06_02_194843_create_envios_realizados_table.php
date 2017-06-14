<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnviosRealizadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envios_realizados', function (Blueprint $table) {
            
            $table->increments('id_envio')->unsigned();

            $table->integer('id_solicitud')->unsigned();
            $table->integer('id_detalle')->unsigned();   
            $table->date('fecha_envio')->nullable();
            $table->date('fecha_estimada_arribo')->nullable();
            $table->date('fecha_arribo')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('origen')->nullable();
            $table->string('destino')->nullable();
            $table->string('estado')->nullable();
            $table->string('responsable')->nullable();
            $table->string('transportadora')->nullable();
            $table->string('placa')->nullable();
            $table->string('conductor')->nullable();
            $table->integer('cantidad_enviada')->nullable();
            $table->string('creado_por')->nullable();
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
        Schema::dropIfExists('envio_realizado');
    }
}

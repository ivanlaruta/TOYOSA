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
            
            $table->integer('id_solicitud')->unsigned();
            $table->integer('id_detalle')->unsigned();
            $table->integer('id_envio')->unsigned();
            $table->date('fecha_envio')->nullable();
            $table->date('fecha_estimada_arribo')->nullable();
            $table->date('fecha_arribo')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('estado')->nullable();
            $table->string('responsable')->nullable();
            $table->string('transportadora')->nullable();
            $table->integer('cantidad_aprobada')->nullable();
            $table->integer('cantidad_enviada')->nullable();
            $table->integer('cantidad_entregada')->nullable();
            $table->timestamps();

            $table->primary(['id_solicitud', 'id_detalle','id_envio']);

            $table->foreign(['id_solicitud', 'id_detalle'])->references(['id_solicitud', 'id_detalle'])->on('detalle_solicitudes')->onDelete('cascade');
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

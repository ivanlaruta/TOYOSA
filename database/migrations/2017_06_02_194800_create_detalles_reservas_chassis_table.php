<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallesReservasChassisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas_chassis', function (Blueprint $table) {

            $table->integer('id_solicitud')->unsigned();
            $table->integer('id_detalle')->unsigned();
            $table->char('chassis',40)->unsigned();
            $table->date('fecha_envio')->nullable();
            $table->date('fecha_estimada_arribo')->nullable();
            $table->date('fecha_arribo')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('estado')->nullable();
            $table->string('validado')->nullable();
            $table->integer('id_envio')->nullable()->default(0);

            $table->timestamps();

            $table->primary(['id_solicitud', 'id_detalle','chassis']);

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
        Schema::dropIfExists('reservas_chassis');
    }
}

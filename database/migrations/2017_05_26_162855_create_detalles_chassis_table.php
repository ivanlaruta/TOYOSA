<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallesChassisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_chassis', function (Blueprint $table) {

            $table->integer('id_envio')->unsigned();
            $table->integer('id_detalle')->unsigned();
            $table->char('chassis',40)->unsigned();
            $table->date('fecha_envio')->nullable();
            $table->date('fecha_estimada_arribo')->nullable();
            $table->date('fecha_arribo')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('estado')->nullable();
            $table->string('validado')->nullable();

            $table->timestamps();

            $table->primary(['id_envio', 'id_detalle','chassis']);

            $table->foreign(['id_envio', 'id_detalle'])->references(['id_envio', 'id_detalle'])->on('detalles')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('detalles_chassis');
    }
}

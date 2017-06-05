<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {

            $table->increments('id_solicitud')->unsigned();

            $table->date('fecha_creacion')->nullable();
            $table->date('fecha_modificacion')->nullable();
            $table->date('fecha_espera')->nullable();
            $table->date('fecha_aprobado')->nullable();
            $table->date('fecha_envio')->nullable();
            $table->date('fecha_entrega_estimada')->nullable();
            $table->date('fecha_entrega')->nullable();

            $table->enum('estado',['1','2','3','4','5','6'])->default('1');
            $table->enum('tipo',['0','1'])->default('1');

            $table->string('origen')->nullable()->unsigned();
            $table->string('destino')->nullable()->unsigned();

            $table->string('observaciones')->nullable();
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
        Schema::dropIfExists('solicitudes');
    }
}

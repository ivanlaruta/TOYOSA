<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = "solicitudes";

	protected $primaryKey ='id_solicitud';

    protected $fillable =['id_solicitud','fecha_creacion','fecha_modificacion','fecha_enviado','fecha_aprobado','fecha_envio','fecha_entrega_estimada','fecha_entrega','estado','tipo','observaciones','origen','destino'];

    protected $dates =['fecha_creacion','fecha_modificacion','fecha_enviado','fecha_aprovado','fecha_envio','fecha_entrega_estimada','fecha_entrega'];
    protected $dateFormat = 'Y-m-d';
    public $timestamps = true;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservas_chassis extends Model
{
    protected $table = "reservas_chassis";
    protected $primaryKey =['id_solicitud', 'id_detalle','chassis'];
    public $incrementing=false;
    
    protected $dates =['fecha_envio','fecha_estimada_arribo','fecha_arribo'];
    protected $dateFormat = 'Y-m-d H:i:s';
    public $timestamps = true;

    public function vehiculo()
    {
    	return $this->belongsTo('App\V_stock_gtauto','chassis');
    }
}

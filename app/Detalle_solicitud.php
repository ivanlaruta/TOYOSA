<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_solicitud extends Model
{
    protected $table = "detalle_solicitudes";
    protected $primaryKey =['id_solicitud', 'id_detalle'];
    public $incrementing=false;
    
    protected $dateFormat = 'Y-m-d H:i:s';
    public $timestamps = true;

    public function master()
    {
        return $this->belongsTo('App\Master','cod_master');
    }

    public function modelo()
    {
        return $this->belongsTo('App\Modelo','cod_modelo');
    }
   
    public function marca()
    {
        return $this->belongsTo('App\Marca','cod_marca');
    }
}

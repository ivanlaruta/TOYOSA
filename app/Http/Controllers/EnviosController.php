<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\V_ubicacion;
use App\Solicitud;
use App\Marca;
use App\Modelo;
use App\Master;
use App\Detalle;
use App\Detalle_Chassis;
use App\V_stock_gtauto;
use App\Detalle_solicitud;
use App\Reservas_chassis;
use DB;
class EnviosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
       
        $env_aprob =Solicitud::where('estado', '>=', '3')->get();

       return view('distribuidor.envios.aprobados')
           
            ->with('env_aprob',$env_aprob)
        ;
    }
       
          
    public function enviar(Request $request,$id)
    {
        date_default_timezone_set('America/La_Paz');
        $time = time();
        $now =date("Y-m-d", $time);

        DB::update("update reservas_chassis set estado = '3' , fecha_envio = '".$now."' ,fecha_estimada_arribo ='".$request->f_env."' where id_solicitud = '".$id."'");
           
       $cant_env = DB::select( DB::raw("select id_solicitud,id_detalle, COUNT (chassis) as cantidad_enviada from reservas_chassis where estado = '3' and id_solicitud = '".$id."' GROUP BY id_solicitud,id_detalle ORDER BY id_detalle ASC"));

       foreach ($cant_env as $cant) { 

            DB::update("update detalle_solicitudes set cantidad_enviada = ".$cant->cantidad_enviada."  where id_detalle = '".$cant->id_detalle."' and id_solicitud = '".$id."'");
        }

           $env =Solicitud::find($id);
           $env->estado = '5';
           $env -> fecha_envio = $now;
           $env -> fecha_entrega_estimada = $request->f_env;
           $env->save();

        return redirect()->route('envios.index');
    }

    public function envio_parcial(Request $request,$id)
    {
        $env =Solicitud::find($id);

        $det = Detalle_solicitud::select(DB::raw("*,cantidad_aprobada - cantidad_enviada as sin_env"))
        ->where('id_solicitud','=',$id)
        ->get();
        return view('distribuidor.envios.hoja_envio_parcial')
         ->with('det',$det)
         ->with('id',$id)
         ->with('env',$env)
         ;
    }

    public function enviar_parcial(Request $request)
    {
        
        date_default_timezone_set('America/La_Paz');
        $time = time();
        $now =date("Y-m-d", $time);

        $env =Solicitud::find($request->id);
        
        $det =$request->id_detalle;
        $unidades = Reservas_chassis::
                      where('id_solicitud','=',$request->id)
                    ->where('id_detalle','=',$request->id_detalle)
                    ->where('estado','<','3')
                    ->paginate($request->cant);
        
        foreach($unidades as $add)
        {
            DB::update("update reservas_chassis set estado = '3' , fecha_envio = '".$now."' ,fecha_estimada_arribo ='".$request->f_env."' where id_detalle = '".$request->id_detalle."' and id_solicitud = '".$request->id."' and chassis = '".$add->chassis."'");
        }

        $enviados = Reservas_chassis::
            where('id_solicitud','=',$request->id)
            ->where('id_detalle','=',$request->id_detalle)
            ->where('estado','=','3')
            ->count();

        DB::update("update detalle_solicitudes set fecha_envio = '".$now."' ,cantidad_enviada ='".$enviados."' where id_detalle = '".$request->id_detalle."' and id_solicitud = '".$request->id."'");

        $aprr = Detalle_solicitud::
            where('id_solicitud','=',$request->id)
            ->sum('cantidad_aprobada');

        $envv = Detalle_solicitud::
            where('id_solicitud','=',$request->id)
            ->sum('cantidad_enviada');
        

        $env =Solicitud::find($request->id);

        if ($aprr == $envv)
        {
            $env->estado = '5';
        }
        else
        {
            $env->estado = '4';
        }
        
        $env -> fecha_envio = $now;
        $env->save();

        
        if ($aprr == $envv)
        {
            return redirect()->route('envios.index', ['id' =>$request->id]);
        }
        else
        {
            return redirect()->route('envios.envio_parcial', ['id' =>$request->id]);
        }

    }

    public function modal_parcial(Request $request)
    {
        $env =Solicitud::find($request->id);
        $id = $request->id;
        $det = Detalle_solicitud::where('id_solicitud','=',$request->id)
        ->where('id_detalle','=',$request->id_detalle)
        ->first();
        return view('distribuidor.envios.modal_parcial')
         ->with('det',$det)
         ->with('id',$id)
         ->with('env',$env);
    }

    public function detalle_all(Request $request,$id,$id2)
    {   
        $env =Solicitud::find($id);

        if($id2  <> '0')
        {
            $det_all = Reservas_chassis::select(DB::raw('ROW_NUMBER() OVER(ORDER BY id_detalle DESC) AS ITEM'),'*')
             ->where('id_solicitud','=',$id)
             ->where('id_detalle','=',$id2)
             ->get();

        }
        else
        {
             $det_all = Reservas_chassis::select(DB::raw('ROW_NUMBER() OVER(ORDER BY id_detalle DESC) AS ITEM'),'*')
             ->where('id_solicitud','=',$id)
             
             ->get();
        }
        
        return view('distribuidor.envios.detalle_all')
            ->with('det_all',$det_all)
            ->with('id',$id)
            ->with('env',$env)
            ;
    }

    public function detalle(Request $request,$id)
    {
        $env =Solicitud::find($id);

        $det_all = Detalle_solicitud::where('id_solicitud','=',$id)->get();

        $det = Detalle_solicitud::where('id_solicitud','=',$id)->get();
        
            return view('distribuidor.envios.detalle')
            ->with('env',$env)
            ->with('request',$request)
            ->with('det',$det)
            ->with('det_all',$det_all)
            ;
    }
}

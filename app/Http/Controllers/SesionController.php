<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class SesionController extends Controller
{
    public function index(Request $request)
    {   
        
        if (Auth::user()->rol == '1')
        {
            return redirect()->route('principal.index');
        }
         if (Auth::user()->rol == '2')
        {
            return redirect()->route('solicitudes.index');
        }
         if (Auth::user()->rol == '3')
        {
            return redirect()->route('principal.index');
        }
         if (Auth::user()->rol == '4')
        {
            return redirect()->route('envios.index');
        }
         if (Auth::user()->rol == '5')
        {
            return redirect()->route('envios.index');
        }

    }
}

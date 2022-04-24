<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Invitado;
use App\Models\Respuesta;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function listaInvitados()
    {
        $respuesta = new Respuesta;
        $invitado = new Invitado;
        try{
            $lista = $invitado->obtenerLista();
            $respuesta->data = $lista;
        }catch(Exception $e)
        {
            $respuesta->error = false;
            $respuesta->mensaje = $e->getMessage();
        }
        
        return response()->json($respuesta->obtenerRespuesta());
    }
}

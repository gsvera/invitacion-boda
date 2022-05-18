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
            $lista = $invitado->validarCodigo(request('codigo'));
            $respuesta->setRespuesta($lista);
        }catch(Exception $e)
        {
            $respuesta->error = false;
            $respuesta->mensaje = $e->getMessage();
        }
        
        return response()->json($respuesta->obtenerRespuesta());
    }
    public function invitacion()
    {
        $invitado = new Invitado;
        try{
            $validar = $invitado->validarCodigo(request('codigo'));
            if($validar["error"] == true)
            {
                return view('index');
            }
        }
        catch(Exception $e)
        {
            return "Exception: ".$e->getMessage();
        }
        return view('home', ['codigo' => request('codigo')]);
    }
}

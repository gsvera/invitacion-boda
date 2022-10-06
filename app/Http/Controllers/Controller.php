<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Invitado;
use App\Models\Respuesta;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function prueba()
    {
        $invitado = new Invitado;
        $invitado->clienteById(1);
exit($invitado);
        return $invitado;
    }

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
    public function enviarEmail()
    {
        $invitado = new Invitado;
        $lista = $invitado->obtenerInvatidos(request('codigo'));
        $respuesta = request('respuesta');
        $subject = "Invitación ".$respuesta." codigo: ".request('codigo');
        $emailInvitado = request('email');
        $datosMensaje = [
            "CodigoInvitado" => request('codigo'),
            
            "respuesta" => $respuesta
        ];

        if($emailInvitado != null && $emailInvitado != "")
        {
            Mail::send('viewMail.confirmacionEmail', ['item'=>$datosMensaje, "ListaInvitados" => $lista], function($mensaje) use ($emailInvitado){
                $mensaje->to($emailInvitado)->subject("Correo de confirmacion de nuestra boda Guillermo & Ana");
            });    
        }
        
        Mail::send('viewMail.sendMail', ['item'=>$datosMensaje, "ListaInvitados" => $lista], function($mensaje) use ($subject){
            $mensaje->to(["gs.vera92@gmail.com", "jrezz_ana@hotmail.com"])->subject($subject);
        });

        return response()->json(["respuesta" => $respuesta]);
    }
}

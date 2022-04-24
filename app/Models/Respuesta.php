<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    public $error = false;
    public $mensaje = "";
    public $data = [];

    public function obtenerRespuesta()
    {
        $respuesta = ["error" => $this->error, "mensaje" => $this->mensaje, "data" => $this->data];
        return $respuesta;
    }

}

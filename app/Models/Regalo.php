<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regalo extends Model
{
    use HasFactory;
    protected $table = "regalo";
    public $timestamps = false;

    public function ConsultarSiEligio($codigoInvitado)
    {
        $validarExistencia = 0;
        try{
            $exist = $this->where('codigoinvitado', $codigoInvitado)->get();

            $validarExistencia = $exist->count();
        }
        catch(Exception $e)
        {

        }
        return $validarExistencia;        
    }
    public function ListaRegalos()
    {
        $lista;
        try{
            $lista = $this->get();
        }
        catch(Exception $e)
        {

        }
        return $lista;
    }
}

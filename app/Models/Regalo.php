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
    public function elegirArticulo($nombreregalo, $codigoInvitado)
    {
        $elegido = false;
        try{
            $articulo = $this->where('nombreregalo', $nombreregalo)->first();
            $articulo->codigoinvitado = $codigoInvitado;
            $articulo->save();
            $elegido = true;
        }
        catch(Exception $e)
        {
            $elegido = false;
        }
        return $elegido;
    }
    public function obtenerPorCodigo($codigo)
    {
        $registro = new Regalo;
        try{
            $registro = $this->where('codigoinvitado', $codigo)->first();
        }
        catch(Exception $e)
        {

        }
        return $registro;
    }
}

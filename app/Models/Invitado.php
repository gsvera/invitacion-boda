<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitado extends Model
{
    use HasFactory;

    private $listaInvitados = [
        [
            "codigo" => "CDG-1",
            "nombres" => ["Guillermo", "Ana"]
        ],
        [
            "codigo" => "CDG-2",
            "nombres" => ["Diana", "Novio"]
        ]
    ];

    public function obtenerLista()
    {
        return $this->listaInvitados;
    }
}
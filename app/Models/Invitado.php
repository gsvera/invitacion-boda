<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Invitado extends Model
{
    use HasFactory;
    protected $table = "users";
    // protected $primaryKey = 'id_invitado';
    public $timestamps = false;

    private $listaInvitados = [
        [
            "codigo" => "BDA-INV-111",
            "respuesta" => 0,
            "nombres" => ["Emma Martinez Barrios"]
        ],
        [
            "codigo" => "BDA-INV-030",
            "respuesta" => 0,
            "nombres" => ["Brenda Janeth Zavala"]
        ],
        [
            "codigo" => "BDA-INV-0441",
            "respuesta" => 0,
            "nombres" => ["Maribel Calderon Vargas", "Jose Luis Joaquin López"]
        ],
        [
            "codigo" => "BDA-INV-055",
            "respuesta" => 0,
            "nombres" => ["Fatima Arizbeth Fuentes"]
        ],
        [
            "codigo" => "BDA-INV-671",
            "respuesta" => 0,
            "nombres" => ["Zayri Lorena Salas Uc", "Juan Carlos Olan Ramos"]
        ],
        [
            //  PENDIENTE
            "codigo" => "BDA-INV-07",
            "respuesta" => 0,
            "nombres" => ["Diana Adalid Cabrera Tadeo", "1 Acompañante"]
        ],
        [
            "codigo" => "BDA-INV-889",
            "respuesta" => 0,
            "nombres" => ["Andrea Daviza Nuñez Mancera", "Roberto Pablo Cordero Garcia"]
        ],
        [
            "codigo" => "BDA-INV-900",
            "respuesta" => 0,
            "nombres" => ["Brenda Lizette Sulub Peraza"]
        ],
        // [
        //     "codigo" => "BDA-INV-09",
        //     "respuesta" => 0,
        //     "nombres" => ["Enedina Berenice Ramirez Perea", "Antonio Jesus Ceme Duarte"]
        // ],
        // [
        //     "codigo" => "BDA-INV-10",
        //     "respuesta" => 0,
        //     "nombres" => ["Francelly Villegas Tec", "Marcos Joel Hernandez Santiago"]
        // ],
        [
            "codigo" => "BDA-INV-M-111",
            "respuesta" => 0,
            "nombres" => ["Carlos Vera Morales", "Vanessa Tun Sanchez", "Alondra Vera Tun", "Freyra Vera Tun", "Valentin Vera Tun"]
        ],
        [
            "codigo" => "BDA-INV-M-122",
            "respuesta" => 0,
            "nombres" => ["Cristobal Leonel Vera Morales", "Carolina Yahira Loeza Salazar", "Lizandro Vera Tun", "Jazmin Ver Tun"]
        ],
        [
            "codigo" => "BDA-INV-M-133",
            "respuesta" => 0,
            "nombres" => ["Estefany Vera Morales", "Andres Peraza Cituk"]
        ],
        [
            "codigo" => "BDA-INV-M-144",
            "respuesta" => 0,
            "nombres" => ["Gabriel Vera", "Benita Diaz"]
        ],
        [
            "codigo" => "BDA-INV-M-155",
            "respuesta" => 0,
            "nombres" => ["Antonio Vera Lopez", "Pastora Ek Colli"]
        ],
        [
            "codigo" => "BDA-INV-M-166",
            "respuesta" => 0,
            "nombres" => ["Carolina Vera", "Javier de la Rosa"]
        ],
        [
            "codigo" => "BDA-INV-M-177",
            "respuesta" => 0,
            "nombres" => ["Karent Revuelta Pacheco"]
        ],
        [
            "codigo" => "BDA-INV-M-188",
            "respuesta" => 0,
            "nombres" => ["Paola Pacheco", "Valentina Pacheco"]
        ],
        [
            "codigo" => "BDA-INV-M-199",
            "respuesta" => 0,
            "nombres" => ["Aaron Najera Ortiz", "Jazmin Alejandra Pinto Loria"]
        ],
        [
            "codigo" => "BDA-INV-M-200",
            "respuesta" => 0,
            "nombres" => ["Luis Mass Pinzon", "Elenita Uitz Coello"]
        ],
        [
            "codigo" => "BDA-INV-M-211",
            "respuesta" => 0,
            "nombres" => ["Alexander Pool Gonzalez"]
        ],
        [
            "codigo" => "BDA-INV-M-222",
            "respuesta" => 0,
            "nombres" => ["Robin Canche Dzul"]
        ],
        [
            "codigo" => "BDA-INV-M-233",
            "respuesta" => 0,
            "nombres" => ["Elias Chi Matuz"]
        ],
        [
            "codigo" => "BDA-INV-M-244",
            "respuesta" => 0,
            "nombres" => ["Antonio Cordova Jimenez", "Karina Kumul Pool ", "Fernando Cordova Jimenez"]
        ],
        [
            "codigo" => "BDA-INV-M-255",
            "respuesta" => 0,
            "nombres" => ["Felipe Vera Lopez", "Maria del Rosario"]
        ],
        [
            "codigo" => "BDA-INV-M-266",
            "respuesta" => 0,
            "nombres" => ["Rosa Sanchez", "Jorge Hernandez", "Dalia Tun"]
        ],
        [
            "codigo" => "BDA-INV-M-277",
            "respuesta" => 0,
            "nombres" => ["Ena Tun Sanchez", "Alex Mendoza", "Hiroshi Mendoza", "Ian Mendoza"]
        ],
        [
            "codigo" => "BDA-INV-M-288",
            "respuesta" => 0,
            "nombres" => ["Ofelia Morales", "David"]
        ],
        [
            "codigo" => "BDA-INV-M-2923",
            "respuesta" => 0,
            "nombres" => ["Juan Carlos Torres Valenzo"]
        ]
    ];

    public function obtenerLista()
    {
        return $this->listaInvitados;
    }
    public function validarCodigo($codigo)
    {
        $res = [];
        foreach($this->listaInvitados as $clave => $valor)
        {
            if($valor['codigo'] == $codigo)
            {
                $res["error"] = false;
                $res["data"] = $valor;
                $res["mensaje"] = "";
                break;
            }
            else
            {
                $res["error"] = true;
                $res["data"] = [];
                $res["mensaje"] = "Codigo de invitado invalido";
            }
        }

        return $res;
    }
    public function obtenerInvatidos($codigo)
    {
        $res = [];
        foreach($this->listaInvitados as $clave => $valor)
        {
            if($valor['codigo'] == $codigo)
            {
                $res = $valor['nombres'];
                break;
            }
            else
            {
                $res = [];
            }
        }

        return $res;
    }
    public function consultarRespuesta($codigo)
    {
        $respuesta = 0;
        foreach($this->listaInvitados as $clave => $valor)
        {
            if($valor['codigo'] == $codigo)
            {
                $respuesta = $valor['respuesta'];
            }
        }
        return $respuesta;
    }

    public function clienteById()
    {
        $client = DB::table('users')->get();

        return $client;
    }
}

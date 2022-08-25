<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitado extends Model
{
    use HasFactory;

    private $listaInvitados = [
        [
            "codigo" => "BDA-INV-1",
            "respuesta" => 0,
            "nombres" => ["Guillermo Vera", "Ana Juarez"]
        ],
        // [
        //     "codigo" => "BDA-INV-2",
        //     "respuesta" => 0,
        //     "nombres" => ["Diana", "Novio"]
        // ],
        [
            "codigo" => "BDA-INV-03",
            "respuesta" => 0,
            "nombres" => ["Brenda Janeth Zavala"]
        ],
        [
            "codigo" => "BDA-INV-04",
            "respuesta" => 0,
            "nombres" => ["Maribel Calderon Vargas", "Jose Luis Joaquin López"]
        ],
        [
            "codigo" => "BDA-INV-05",
            "respuesta" => 0,
            "nombres" => ["Fatima Arizbeth Fuentes"]
        ],
        [
            "codigo" => "BDA-INV-06",
            "respuesta" => 0,
            "nombres" => ["Zayri Lorena Salas Uc", "Juan Carlos Olan Ramos"]
        ],
        [
            "codigo" => "BDA-INV-07",
            "respuesta" => 0,
            "nombres" => ["Diana Adalid Cabrera Tadeo", "1 Acompañante"]
        ],
        [
            "codigo" => "BDA-INV-08",
            "respuesta" => 0,
            "nombres" => ["Andrea Daviza Nuñez Mancera", "Roberto Pablo Cordero Garcia"]
        ],
        [
            "codigo" => "BDA-INV-09",
            "respuesta" => 0,
            "nombres" => ["Enedina Berenice Ramirez Perea", "Antonio Jesus Ceme Duarte"]
        ],
        [
            "codigo" => "BDA-INV-10",
            "respuesta" => 0,
            "nombres" => ["Francelly Villegas Tec", "Marcos Joel Hernandez Santiago"]
        ]
        ,
        [
            "codigo" => "BDA-INV-11",
            "respuesta" => 0,
            "nombres" => ["Carlos Vera Morales", "Vanessa Tun Sanchez", "Alondra Vera Tun", "Freyra Vera Tun", "Valentin Vera Tun"]
        ],
        [
            "codigo" => "BDA-INV-12",
            "respuesta" => 0,
            "nombres" => ["Cristobal Leonel Vera Morales", "Carolina", "Lizandro Vera Tun", "Jazmin Ver Tun"]
        ],
        [
            "codigo" => "BDA-INV-13",
            "respuesta" => 0,
            "nombres" => ["Estefany Vera Morales", "Andres Peraza Cituk"]
        ],
        [
            "codigo" => "BDA-INV-14",
            "respuesta" => 0,
            "nombres" => ["Gabriel Vera", "Benita Diaz"]
        ],
        [
            "codigo" => "BDA-INV-15",
            "respuesta" => 0,
            "nombres" => ["Antonio Vera", "Pastora", "Sofia Vera"]
        ],
        [
            "codigo" => "BDA-INV-16",
            "respuesta" => 0,
            "nombres" => ["Carolina Vera"]
        ],
        [
            "codigo" => "BDA-INV-17",
            "respuesta" => 0,
            "nombres" => ["Karent Revuelta Pacheco"]
        ],
        [
            "codigo" => "BDA-INV-18",
            "respuesta" => 0,
            "nombres" => ["Paola Pacheco", "Valentina Pacheco"]
        ],
        [
            "codigo" => "BDA-INV-19",
            "respuesta" => 0,
            "nombres" => ["Aaron Najera", "Andrea"]
        ],
        [
            "codigo" => "BDA-INV-20",
            "respuesta" => 0,
            "nombres" => ["Luis Mass Pinzon"]
        ],
        [
            "codigo" => "BDA-INV-21",
            "respuesta" => 0,
            "nombres" => ["Alexander Pool Gonzalez"]
        ],
        [
            "codigo" => "BDA-INV-22",
            "respuesta" => 0,
            "nombres" => ["Robin Canche Dzul"]
        ],
        [
            "codigo" => "BDA-INV-23",
            "respuesta" => 0,
            "nombres" => ["Elias Chi Matuz"]
        ],
        [
            "codigo" => "BDA-INV-24",
            "respuesta" => 0,
            "nombres" => ["Antonio Cordova Jimenez", "Karina Kumul Pool ", "Fernando Cordova Jimenez"]
        ],
        [
            "codigo" => "BDA-INV-25",
            "respuesta" => 0,
            "nombres" => ["Laura Rosales Manrique", "Rey Noe"]
        ],
        [
            "codigo" => "BDA-INV-26",
            "respuesta" => 0,
            "nombres" => ["Rosa Sanchez", "Jorge Hernandez"]
        ],
        [
            "codigo" => "BDA-INV-27",
            "respuesta" => 0,
            "nombres" => ["Ena Tun Sanchez", "Alex Mendoza", "Hiroshi Mendoza", "Ian Mendoza", "Cindy Guillermo"]
        ],
        [
            "codigo" => "BDA-INV-28",
            "respuesta" => 0,
            "nombres" => ["Paloma Salazar", ""]
        ],
        [
            "codigo" => "BDA-INV-29",
            "respuesta" => 0,
            "nombres" => ["Ana Morales","Liliana Vera", "Nivardo", "Esposo de lili"]
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
}

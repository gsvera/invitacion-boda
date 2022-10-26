@php

use App\Models\Invitado;
use App\Models\Regalo;

$datosInvitado = new Invitado;
$regalo = new Regalo;

@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="https://use.fontawesome.com/97a88bff0a.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/alerts.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
        window.CSRF_TOKEN = '{{ csrf_token() }}';
    </script>

    <title>Mesa de Regalos</title>
</head>
<body>
    <div class="fondo-novios">
    </div>
    <div class="titulo-novios">
        <h1 class="size-max">GUILLERMO & ANA</h1>
        <h4 class="size-med">18 NOVIEMBRE 2022</h4>
    </div>
    <div class="titulo-historia">
        <div class="mx-auto"><h2 class="t-nanum m-0" id="nosotros">MESA DE REGALOS</h2></div>
    </div>
    <div class="justify-content-center d-flex">
        <div class="text-historia">
            <p>
                Bienvenido a la seccion de mesa de regalos para nuestra boda, la finalidad de esta actividad es poder ayudar a nuestros invitados 
                en este evento tan especial (los cuales gusten darnos un obsequio). 
            </p>
            <p>
                Nuestra intencion es poder darles una idea de que poder obsequiar.
            </p>
            <p>
                Nosotros hicimos un recorrido en la tienda Walmart del centro ubicado en la direccion Av. Coba Mz. 2 LT.2
                (no tiene que ser exactamente en la tienda que indicamos)
            </p>
            <div class="text-center my-3">
                <a href="https://goo.gl/maps/xrGVpMiM8ipQj8NT7" class="link-mapa" target="_blank"> 
                    <img class="icono-ubicacion" src="/img/ubicacion.png" alt="Pastel de boda">
                    Ver en mapa
                </a>
            </div>
            <p>
                E indentificamos algunas cosas que nos podrian ser de ayuda ahora que iniciamos esta nueva etapa de nuestras vidas.
            </p>
            <p>
                A continuacion te indicamos el proceso a seguir:
            </p>
            <ul style="list-style:none;">
                <li>1.- Elige el articulo que desees obsequiar.</li>
                <li>2.- Da click en el boton de "Elegir".</li>
                <li>3.- Confirma el articulo. (Esto nos ayudara a indicar que el articulo ya fue seleccionado para su compra, no te preocupes todo es secreto 
                y nadie sabra que elegiste)</li>
                <li>4.- Asiste a la tienda Walmart mas cercana de preferencia a la que indicamos en la parte de arriba ó en donde puedas encontrar el articulo.</li>
                <li>5.- Compra el articulo.</li>
            </ul>
            <p>
                Si tienes dudas sobre el proceso puedes escribirnos o llamarnos, con gusto te ayudaremos.
            </p>
        </div>
    </div>

    </div>
    @if($regalo->ConsultarSiEligio($codigo) > 0)
    <div>
        @php
            $articulo = $regalo->obtenerPorCodigo($codigo);
        @endphp
        <h3 class="text-center font-bold mt-3">Usted ya ha elegito un articulo</h3>
        <div class="row justify-content-center" style="margin-left: 0; margin-right:0;">
            <div class="col-md-3 mx-2 mt-3 mb-4">
                <div class="card pt-3" style="width: 18rem;">
                    <div class="justify-content-center d-flex">
                        <div class="img-regalo" style='background-image:url("/img/regalos/{{$articulo->nombreregalo}}")' data-img="/img/regalos/{{$articulo->nombreregalo}}" data-nombre="{{$articulo->nombreregalo}}"></div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between my-3">
                            <div class="font-bold">Precio estimado</div>
                            <div class="font-bold">{{$articulo->precio}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        @php
            $listRegalos = $regalo->listaRegalos();
        @endphp
        <div class="row justify-content-center" style="margin-left: 0; margin-right:0;">
            @foreach($listRegalos as $item)
            <div class="col-md-3 mx-2 my-4 justify-content-center d-flex">
                <div class="card pt-3" style="width: 18rem;">
                    <div class="justify-content-center d-flex">
                        @if($item->codigoinvitado != "")
                            <div class="img-regalo-elegido" style='background-image:url("/img/regalos/{{$item->nombreregalo}}")' data-img="/img/regalos/{{$item->nombreregalo}}" data-nombre="{{$item->nombreregalo}}"></div>
                        @else
                            <div class="img-regalo" style='background-image:url("/img/regalos/{{$item->nombreregalo}}")' data-img="/img/regalos/{{$item->nombreregalo}}" data-nombre="{{$item->nombreregalo}}"></div>
                        @endif
                    </div>
                    <div class="card-body">
                    @if($item->codigoinvitado != "")
                    <h3 class="text-center text-dorado">Este articulo ya fue elegido</h3>
                    @else
                        <div class="d-flex justify-content-between my-3">
                            <div class="font-bold">Precio estimado</div>
                            <div class="font-bold">{{$item->precio}}</div>
                        </div>
                        <button type="button" class="btn btn-aceptar text-center btn-regalo">Elegir</button>
                    @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif


    <div class="back-gracias">
        <div class="mx-auto">
            <h2 class="t-nanum m-0">¡GRACIAS POR ASISTIR!</h2>
            <svg class="corazon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 448l-30.164-27.211C118.718 322.442 48 258.61 48 179.095 48 114.221 97.918 64 162.4 64c36.399 0 70.717 16.742 93.6 43.947C278.882 80.742 313.199 64 349.6 64 414.082 64 464 114.221 464 179.095c0 79.516-70.719 143.348-177.836 241.694L256 448z"></path></svg>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="imgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-body">
            <div class="imgmodalback" id="imgmodalback"></div>
        </div>
        <div class="modal-footer">
        @if($regalo->ConsultarSiEligio($codigo) == 0)
            <input type="hidden" id="articulo" />
            <input type="hidden" id="codigo" value="{{$codigo}}" />
            <button type="button" class="btn btn-aceptar" id="confirmArticulo">Aceptar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeModal">Cancelar</button>
        @else
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeModal">Cerrar</button>
        @endif
        </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    
</body>
</html>
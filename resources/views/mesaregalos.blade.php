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
        <h2 class="size-max mb-3">Mesa de regalos</h2>
        <h1 class="size-max">GUILLERMO & ANA</h1>
        <h4 class="size-med">18 NOVIEMBRE 2022</h4>
    </div>
    @if($regalo->ConsultarSiEligio($codigo) > 0)
        <h1>Ya eligio</h1>
    @else
        @php
            $listRegalos = $regalo->listaRegalos();
        @endphp
        <div class="row justify-content-center" style="margin-left: 0; margin-right:0;">
            @foreach($listRegalos as $item)
            <div class="col-md-3 mx-2 my-4">
                <div class="card pt-3" style="width: 18rem;">
                    <div class="justify-content-center d-flex">
                        <div class="img-regalo" style='background-image:url("/img/regalos/{{$item->nombreregalo}}")' data-img="/img/regalos/{{$item->nombreregalo}}"></div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between my-3">
                            <div class="font-bold">Precio estimado</div>
                            <div class="font-bold">{{$item->precio}}</div>
                        </div>
                        <a href="#" class="btn btn-aceptar text-center">Elegir</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif

<!-- Modal -->
<div class="modal fade" id="imgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="imgmodalback" id="imgmodalback"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeModal">Close</button>
      </div>
    </div>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script type="text/javascript">
        let imgs = document.getElementsByClassName('img-regalo')

        for(let i = 0; i < imgs.length; i++)
        {
            imgs[i].addEventListener('click', function(e)
            {
                $('#imgModal').modal('show')
                document.getElementById('imgmodalback').style.backgroundImage = 'url("'+imgs[i].dataset.img+'")'
            })
        }

        $("#closeModal").click(function(){
            $('#imgModal').modal('hide')
        })
    </script>
</body>
</html>
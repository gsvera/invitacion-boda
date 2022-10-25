@php

use App\Models\Invitado;

$datosInvitado = new Invitado;

$invitados = $datosInvitado->obtenerInvatidos($codigo);
$respuesta = $datosInvitado->consultarRespuesta($codigo);

@endphp


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta property="og:url" content="https://fierce-river-72268.herokuapp.com/" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Boda G & A" />
    <meta property="og:description" content="Nuestra boda G & A" />   
    <meta property="og:image" content="" />
   
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:site" content=""/>
    <meta name="twitter:creator" content=""/>
    <meta name="twitter:title" content="Nuestra boda de Guillermo & Ana"/>
    <meta name="twitter:description" content="Nuestra boda de Guillermo & Ana"/>
    <meta name="twitter:image" content="https://fierce-river-72268.herokuapp.com/img/novios.jpg"/>
    <meta name="twitter:domain" content="https://fierce-river-72268.herokuapp.com/"/>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="https://use.fontawesome.com/97a88bff0a.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/alerts.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
        window.CSRF_TOKEN = '{{ csrf_token() }}';
    </script>
    <title>Boda G & A</title>
</head>
<body>
    <div class="menu-boda d-none">
        <ul class="nav-boda justify-content-center">
            <li class="nav-item nav-item-boda">
                <a class="nav-link-boda text-menu t-sen" href="#nosotros">NOSOTROS</a>
            </li>
            <li class="nav-item nav-item-boda">
                <a class="nav-link-boda text-menu t-sen" href="#ubicacion">CUANDO Y DONDE</a>
            </li>
            <li class="nav-item nav-item-boda">
                <a class="nav-link-boda text-menu t-sen" href="#agradecimiento">AGRADECIMIENTO</a>
            </li>
            <li class="nav-item nav-item-boda">
                <a class="nav-link-boda text-menu t-sen" href="#confirmacion">CONFIRMACIÓN</a>
            </li>
        </ul>
    </div>
    <div class="fondo-novios">
    </div>
    <div class="titulo-novios">
        <h1 class="size-max">GUILLERMO & ANA</h1>
        <h4 class="size-med">18 NOVIEMBRE 2022</h4>
    </div>
    <div class="titulo-historia">
        <div class="mx-auto"><h2 class="t-nanum m-0" id="nosotros">NUESTRA HISTORA</h2></div>
    </div>
    <div class="d-flex-boda">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 minh-400">
            <div class="foto-novios1"></div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="text-historia">
                <h2 class="iniciales">G & A</h2>
                <p class="t-indie-flower fs-1-1">
                    Una propuesta, un Sí y una decisión que tomamos juntos. Nuestro amor ha crecido en nosotros, 
                    ha madurado y florecido, a veces sencillo, otras caótico pero siempre maravilloso. Así comienza 
                    una nueva etapa en nuestras vidas.
                </p>
                <p class="t-indie-flower fs-1-1">
                    Desde el día que nos conocimos había algo que ya nos conectaba, nuestra relación se fue formando 
                    con el paso del tiempo, cada día más fuerte y lleno de amor, algo que hemos trabajado juntos.
                </p>
                <p class="t-indie-flower fs-1-1">
                    Somos aventureros, dedicados, fuertes de carácter. Los desafíos que hemos enfrentado nos han ayudado 
                    a crecer y madurar. Debemos agradecer a esos retos porque con ellos nos hemos dado cuenta que juntos 
                    podemos lograr lo que nos proponemos.
                </p>
                <p class="t-indie-flower fs-1-1">
                    Tan sólo podemos decir que nuestra vida en estos momentos se encuentra completa y estamos listos para 
                    compartir el resto de nuestros días juntos.
                </p>
            </div>
        </div>
    </div>
    <div class="my-5 mx-auto col-sm-12 col-md-7 col-lg-7 col-12">
        <h2 id="ubicacion" class="text-center t-caveat t-color-cafe">UBICACIÓN</h2>
        <h4 class="text-center t-sen text-secondary">Donde y cuando te esperaremos</h4>
        <div class="casa-ambrosia mx-auto mt-5"></div>
        <div class="mx-auto d-flex">
            <div class="caja-gris col-6">
                <h3 class="t-sen text-white">Casa Ambrosía Cancún</h3>
                <p class="t-sen hora">5:30 pm</p>
                <a href="https://www.google.com/maps/place/Casa+Ambros%C3%ADa+Cancun/@21.1265797,-86.8564603,15z/data=!4m5!3m4!1s0x0:0x533b850c1fec0d08!8m2!3d21.1265644!4d-86.8564606" class="link-mapa" target="_blank"> 
                    <img class="icono-ubicacion" src="/img/ubicacion.png" alt="Pastel de boda">
                    Ver en mapa
                </a>
                
            </div>
            <div class="caja-blanca col-6">
                <h3 class="t-sen">Recepción</h3>
                <p class="t-sen">18 Nov 2022</p>
                <p class="t-sen">C. Encino Supermanzana 310 Manzana 80 Lote 8, 77560 Cancún, Q.R.</p>
            </div>
        </div>
    </div>
    <div class="mgy-100">
        <h2 class="text-center t-caveat t-color-cafe">ITINERARIO</h2>
        <h4 class="text-center t-sen text-secondary">¡Acompañanos en nuestra celebración!</h4>
        <div class="justify-content-center">
            <div class="d-flex-itinerario col-sm-5">
                <div class="col-md-5 caja-icono">
                    <img src="/img/recepcion.png" alt="Recepcion" class="icon-recepcion mx-auto">
                </div>
                <div class="divisor-cafe col-1 col-sm-12"></div>
                <div class="col-md-6 pt-3 t-sm-center">
                    <h4>RECEPCIÓN</h4>
                    <p class="font-weight-bold">5:30 pm</p>
                    <p>Tu puntualidad es importante para nosotros</p>
                </div>
            </div>
            <div class="d-flex-itinerario col-sm-5">
                <div class="col-md-5 caja-icono">
                    <img src="/img/icono-boda.png" alt="Ceremonia" class="icon-recepcion mx-auto">
                </div>
                <div class="divisor-cafe col-1 col-sm-12"></div>
                <div class="col-md-6 pt-3 t-sm-center">
                    <h4>BODA CIVIL</h4>
                    <p class="font-weight-bold">6:00 pm - 6:30 pm</p>
                    <p>Tu compañía en nuestra ceremonia es importante</p>
                </div>
            </div>
            <div class="d-flex-itinerario col-sm-5">
                <div class="col-md-5 caja-icono">
                    <img src="/img/cena-romantica.png" alt="Recepcion" class="icon-recepcion mx-auto">
                </div>
                <div class="divisor-cafe col-1 col-sm-12"></div>
                <div class="col-md-6 pt-3 t-sm-center">
                    <h4>CENA</h4>
                    <p class="font-weight-bold">7:30 - 8:30 pm</p>
                    <p>Cenar juntos hace esta noche especial</p>
                </div>
            </div>
            <div class="d-flex-itinerario col-sm-5 mbs-50">
                <div class="col-md-5 caja-icono">
                    <img src="/img/baile.png" alt="Recepcion" class="icon-recepcion mx-auto">
                </div>
                <div class="divisor-cafe col-1 col-sm-12"></div>
                <div class="col-md-6 pt-3 t-sm-center">
                    <h4>FIESTA</h4>
                    <p class="font-weight-bold">8:30 - 11:30 pm</p>
                    <p>Comienza la diversión</p>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="titulo-historia">
            <div id="agradecimiento" class="mx-auto"><h2 class="t-nanum m-0">AGRADECIMIENTO ESPECIAL</h2></div>
        </div>
        
        <div class="agradecimiento">
        <div class="text-center">
            <p slass="t-justify">Movidos por el amor que nos profesaron y con la alegria y la bendición de nuestros padres:</p>
            <div class="row justify-content-center my-5">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <h4 class="color-dorado t-bold">Padres del Novio</h4>
                    <ul class="lista-invitados t-handle mb-0">
                        <li class="t-bold">Felipe de Jesus Vera López</li>
                        <li class="t-bold">Ofelia Morales Iste</li>
                    </ul>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mgtop50">
                    <h4 class="color-dorado t-bold">Padres de la Novia</h4>
                    <ul class="lista-invitados t-handle mb-0">
                        <li class="t-bold">Azariel Juárez Guzmán</li>
                        <li class="t-bold">Maria Aribe López Jiménez</li>
                    </ul>
                </div>
            </div>
        </div>
            Tambien queremos agradecer a nuestras familias y padrinos que nos apoyaron a que este sueño se haga realidad,
            que a lo largo de nuestra vida siempre han estado presente para apoyarnos cuando lo necesitamos, por eso le queremos decir 
            de todo corazón ¡¡¡Muchas Gracias!!!
        </div>
    </div>
    <div class="d-flex-boda">
        <div class="col-md-6 col-sm-12 nos-vemos">
            <div class="col-12"><h3 id="confirmacion">NOS VEMOS PRONTO</h3></div>
            <div class="col-12">
            <P class="fs-1-1 t-sen t-justify">Si hay algo que queremos en nuestra boda, es compartir con nuestros amigos y familiares un evento tan especial para nosotros como lo es la unión de nuestro amor. Nos hace inmensamente felices que puedas acompañarnos, así que más que cualquier cosa estamos agradecidos por tu presencia.</P>
            </div>
            <div class="col-12">
            <p class="fs-1-1 t-sen t-justify">Debajo encontrarás los botones de confirmación con tu lista de invitados, ya que es muy importante para nosotros.</p>
            </div>
            <div class="col-12">
                <p class="label-boda m-0">¡GRACIAS!</p>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-12 nosotros-foto"></div>
    </div>
    <div class="back-gris">
        <div class="mx-auto">
            <h2 class="t-nanum m-0">CONFIRMACIÓN</h2>
        </div>
    </div>
    <div>
        <div class="fondo-footer">
        </div>
        <div class="caja-confirmacion">
            <h3>Invitamos a:</h3>
            <ul class="lista-invitados">
                @foreach($invitados as $item)
                    @foreach($item as $inv)
                        <li class="t-sen"><i class="fa fa-user" aria-hidden="true"></i> {{$inv->nombre}}</li> 
                    @endforeach
                @endforeach
            </ul>
            @switch(true)
                @case($respuesta == 0)
                <p class="t-sen t-justify">
                    Para nosotros es muy importante que nos confirmes tu asistencia, por eso te pedimos nos indiques 
                    dando click en alguno de los siguientes botones, de igual forma si lo deseas puedes agregar tu correo electrónico
                    para hacerte llegar la confirmación.
                </p>
                <input type="email" class="form-control mb-3 mx-auto input-size" id="email-invitado">
                <button type="button" class="btn btn-aceptar m-1" id="aceptar" data-codigo="{{$codigo}}">Aceptar invitación</button>            
                <button type="button" class="btn btn-denegar m-1" id="denegar" data-codigo="{{$codigo}}">Denegar invitación</button>
                @break
                @case($respuesta == 1)
                <p class="t-sen text-center">
                    Ya has aceptado la invitación previamente
                </p>
                @break
                @case($respuesta == -1)
                <p class="t-sen text-center">
                    Haz rechazado la invitación previamente
                </p>
                @break
            @endswitch
        </div>
    </div>
    <div class="back-gracias">
        <div class="mx-auto">
            <h2 class="t-nanum m-0">¡GRACIAS POR ASISTIR!</h2>
            <svg class="corazon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 448l-30.164-27.211C118.718 322.442 48 258.61 48 179.095 48 114.221 97.918 64 162.4 64c36.399 0 70.717 16.742 93.6 43.947C278.882 80.742 313.199 64 349.6 64 414.082 64 464 114.221 464 179.095c0 79.516-70.719 143.348-177.836 241.694L256 448z"></path></svg>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
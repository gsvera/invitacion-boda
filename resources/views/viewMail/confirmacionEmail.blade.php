<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            margin: 25px;
        }
        .card{
            border:solid 1px rgb(0, 0, 0 );
            box-shadow: 1px 0 3px 2px rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            padding: 25px;
        }
        .title-msg{
            font-size: 1.2em;
            color: white;
            font-family: Helvetica, Arial, sans-serif;
            text-align: center;
        }
        .list-group-item{
            list-style: none;
            margin: 10px 0 10px 35px;
            font-family: Helvetica, Arial, sans-serif;
        }
        .list-group-flush{
            border-top: 1px solid gray;
            border-bottom: 1px solid gray;
            padding: 15px 0 15px 5px;
        }
        .text-secondary{
            color: #3e2c00;
            font-size:1.3em;
            font-family: Helvetica, Arial, sans-serif;
        }
        .card-body{
            margin:25px;
        }
        .card-head{
            background-color: #D4AF37;
            width:100%;
            height: 100px;
            border-radius:10px;
        }
        .text-center{
            text-align:center;
        }
        .img-back{
            background-image: url(https://fierce-river-72268.herokuapp.com/img/casa-ambrosia.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            min-width: 50%;
            min-height: 350px;
        }
        .contenido-invitacion{
            width: 50%;
            margin:10px auto;
            justify-content: center;
            text-align: center;
        }
        .columna{
            width: 50%;
        }
        .font-texto{
            font-family: Helvetica, Arial, sans-serif;
        }
        .corazon{
            margin-top: 10px;
            position:relative;
            width: 30px;
            height: 30px;
            margin: 10px 0;
            filter:invert(100%) opacity(0.8);
            /* animation: hit .5s infinite alternate; */
        }
        /* @keyframes hit
        {
            from { width: 30px; height: 30px; }
            to { width:50px; height: 50px; }
        } */
        .icono-ubicacion {
            width: 50px;
            margin-left: -30px;
            filter: invert(100);
        }
        .caja-gris{
            background-color: #505050;
            height: 250px;
            padding: 55px 0 0;
            text-align: center;
        }
        .d-flex{
            display: flex;
        }
        .texto-bold{
            font-weight: bold;
        }
        .back-gracias {
            background-color: #D4AF37;
            color: white;
            margin: 7px 0;
            /* height: 250px; */
            text-align: center;
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="contenido-invitacion">
        <div class="img-back">
        </div>
        <div class="d-flex">
            <div class="columna caja-gris">
                <h3 class="title-msg">Casa Ambrosía Cancún</h3>
                <p class="title-msg">5:00 pm</p>
                <a href="https://www.google.com/maps/place/Casa+Ambros%C3%ADa+Cancun/@21.1265797,-86.8564603,15z/data=!4m5!3m4!1s0x0:0x533b850c1fec0d08!8m2!3d21.1265644!4d-86.8564606" class="title-msg" target="_blank"> 
                    <img class="icono-ubicacion" src="https://fierce-river-72268.herokuapp.com/img/ubicacion.png" alt="Ubicación Evento">
                    Ver en mapa
                </a>
            </div>
            <div class="columna" style="padding: 55px 0 0;">
                <h3 class="font-texto">Recepción</h3>
                <p class="font-texto">18 Nov 2022</p>
                <p class="font-texto">C. Encino Supermanzana 310 Manzana 80 Lote 8, 77560 Cancún, Q.R.</p>
            </div>
        </div>
        <h4 class="text-center font-texto" style="margin-top: 50px;">Lista de invitados</h4>
        <ul class="list-group list-group-flush">
            @foreach($ListaInvitados as $invitados)
            <li class="list-group-item font-texto"><strong class="text-secondary"></strong><b>{{"$invitados"}}</b></li>
            @endforeach
        </ul>
        <div class="back-gracias">
            <div style="margin:0 auto">
                <p class="font-texto texto-bold" style="font-size:1.3em;">¡Gracias por asistir!</p>
                <svg class="corazon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 448l-30.164-27.211C118.718 322.442 48 258.61 48 179.095 48 114.221 97.918 64 162.4 64c36.399 0 70.717 16.742 93.6 43.947C278.882 80.742 313.199 64 349.6 64 414.082 64 464 114.221 464 179.095c0 79.516-70.719 143.348-177.836 241.694L256 448z"></path></svg>
            </div>
        </div>
    </div>
</body>
</html>
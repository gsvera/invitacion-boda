<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/alerts.js') }}"></script>
    <title>Boda G&A</title>
</head>
<body>
    <div class="fondo-novios">
        </div>
    <form class="formulario" id="formulario">
        <div class="form-group justify-content-center text-center">
            <label class="label-boda" for="codigo">Por favor ingresa tu codigo de invitado</label>
            <input onkeyup="mayusculas()" class="form-control my-3 text-center" type="text" name="codigo" id="codigo">
            <button onclick="validar()" class="btn btn-primary" type="button">Validar</button>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">

        let codigo = document.getElementById('codigo'),
        formulario = document.getElementById('formulario'),
        lista = []

        formulario.addEventListener('submit', function(e){
            e.preventDefault()

            validar()
        })


        function validar()
        {
            if(codigo.value == "")
            {
                warningAlert("Invalido", "Debe agregar el codigo de invitación")
                return false
            }
            mayusculas()

            fetch('/invitados')
            .then(res => res.json())
            .then(result => {
                lista = result.data

                lista.filter(item => item.codigo == codigo.value)

                if(lista[0].codigo == codigo.value)
                {
                    console.log("si")
                }
                else
                {
                    warningAlert("Código invalido", "Ingrese un codigo correcto")
                    lista = []

                    // CAMBIAR EL METODO A POST Y QUE LA LOGICA ESTE EN EL BACK
                }
            })
        }

        function mayusculas(){
            codigo.value = codigo.value.toUpperCase()
        }

    </script>
</body>
</html>
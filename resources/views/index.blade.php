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
    <script type="text/javascript">
        window.CSRF_TOKEN = '{{ csrf_token() }}';
    </script>
    <title>Boda G&A</title>
</head>
<body>
    <div class="fondo-novios">
        </div>
    <form class="formulario" id="formulario">
        <div class="form-group justify-content-center text-center">
            <label class="label-boda" for="codigo">Por favor ingresa tu codigo de invitado</label>
            <input onkeyup="mayusculas(this)" class="form-control my-3 text-center" type="text" name="codigo" id="codigo">
            <button onclick="validar()" class="btn btndorado" type="button">Validar</button>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/mainBoda.js') }}"></script>
</body>
</html>
let codigo = document.getElementById('codigo'),
formulario = document.getElementById('formulario'),
lista = []

const headConexion = {
    'Accept': 'application/json',
    'Content-Type': 'application/json',
    'X-CSRF-TOKEN': window.CSRF_TOKEN //the token is create in head html
}

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
    let codigoMayus = codigo.value

    activeLoader("Cargando...", "Validando su invitación")
    fetch('/invitados',{
        method: "POST",
        body: JSON.stringify({codigo:codigoMayus}),
        headers:headConexion
    })
    .then(res => res.json())
    .then(result => {
        if(result.error == false)
        {
            setTimeout(function(){
                closeAlert()
                window.location= "/invitacion?codigo="+ codigoMayus
            },2000)
        }
        else
        {
            errorAlert("Error", result.mensaje)
        }
    })
}

function mayusculas(elemento){
    elemento.value = elemento.value.toUpperCase()
}
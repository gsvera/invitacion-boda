const headConexion = {
    'Accept': 'application/json',
    'Content-Type': 'application/json',
    'X-CSRF-TOKEN': window.CSRF_TOKEN //the token is create in head html
}
const regexEmail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i

$(document).ready(function() {
    $('a[href^="#"]').click(function() {
        var destino = $(this.hash);
        if (destino.length == 0) {
        destino = $('a[name="' + this.hash.substr(1) + '"]');
        }
        if (destino.length == 0) {
        destino = $('html');
        }
        $('html, body').animate({ scrollTop: destino.offset().top -150 }, 200);
        return false;
    });


    $("#aceptar").click(function(){
        EnviarCorreo($(this).attr("data-codigo"), "aceptada")  
    })

    $("#denegar").click(function(){
        EnviarCorreo($(this).attr("data-codigo"), "denegado")  
    })
});

function EnviarCorreo(codigo, respuesta)
{
    let email = $("#email-invitado").val()
    if(email != null && email != "")
    {
        if(!regexEmail.test(email))
        {
            warningAlert("Advertencia", "El correo electronico no tiene el formato adecuado")
            return false
        }
    }
    let datos = {
        codigo: codigo,
        respuesta: respuesta,
        email: email
    }
    if(respuesta == 'aceptada')
        activeLoader("Aceptando...")       
    else
        activeLoader("Denegando...")         

    fetch('/enviar-respuesta',{
        method:'post',
        body: JSON.stringify(datos),
        headers:headConexion
    })
    .then(res => res.json())
    .then(resp => {
        console.log(resp)
        closeAlert()
        if(resp.respuesta == "aceptada")
        {
            successAlert("Hecho", "¡¡Se envio su confirmación exitosamente!!")
        }
        else
        {
            successAlert("Hecho", "Entendemos tu razón por la cual no puedes asistir, y te agradecemos por hacernos saberlo.")
        }
    })
}

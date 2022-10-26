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
        closeAlert()
        if(resp.respuesta == "aceptada")
        {
            successAlert("Hecho", "¡¡Se envio su confirmación exitosamente!!")
        }
        else
        {
            successAlert("Hecho", "Entendemos tu razón por la cual no puedes asistir, y te agradecemos por hacernos saberlo.")
        }
        setTimeout(function()
        {
            window.location.reload()
        }, 2000)
    })
}


//                  MESA DE REGALOS SCRIPTS


let imgs = document.getElementsByClassName('img-regalo'),
btns = document.getElementsByClassName('btn-regalo')

for(let i = 0; i < imgs.length; i++)
{
    imgs[i].addEventListener('click', function(e)
    {
        seleccionarArticulo(i)
    })
}

for(let i = 0; i < btns.length; i++)
{
    btns[i].addEventListener('click', function(e)
    {
        seleccionarArticulo(i)
    })
}

function seleccionarArticulo(id)
{
    $('#imgModal').modal('show')
        document.getElementById('imgmodalback').style.backgroundImage = 'url("'+imgs[id].dataset.img+'")'
        document.getElementById('articulo').value = imgs[id].dataset.nombre
}

$('#confirmArticulo').click(function(){

    let register = {}
    register.codigoInvitado = $('#codigo').val()
    register.nombreArticulo = $('#articulo').val()

    activeLoader("Aceptando...")       

    fetch('/confirmar-articulo',{
        method:'post',
        body: JSON.stringify(register),
        headers:headConexion
    })
    .then(res => res.json())
    .then(resp => {
        closeAlert()
        console.log(resp)
        if(resp.error == false)
        {
            successAlert("Hecho", "¡¡Se confirmo tu elección exitosamente!!")
        }
        else
        {
            errorAlert("Error", "Algo ocurrio intentelo mas tarde")
        }
        setTimeout(function()
        {
            window.location.reload()
        }, 2000)
    })
})

$("#closeModal").click(function(){
    $('#imgModal').modal('hide')
})
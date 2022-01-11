window.onload = init;


function init()
{
    const scroller = document.getElementsByClassName("smoothscroll")[0];
    var url = window.location.href.split("/").reverse();
    
    classTitleActive();
    if (document.body.contains(scroller))
    {
        scroller.addEventListener("click", bajaAlPulsar, false);
    }
    else
    {
        console.warn("No encontrada la clase");
    }
    
    if (url[0] === "contacto")
    {
//        console.log("yeeees");
        var enviar = document.getElementById("enviar");
        enviar.addEventListener("click", compruebaCampos, false);
    }
    else
    {
        console.log("No estoy en 'contacto'");
    }
    
    if (url[0] === "reservas" || url[0] === "reservas#cancelarLaReserva" || url[0] === "reservas#reservas")
    {
        console.log("Estoy en reservas");
        $("#enviaReserva").on("click", validaReserva);
        $("#limpiarForm").on("click", limpiaCampos);
        $("#enviarCancelacion").on("click", validaCancelacion);
    }
    else
    {
        console.log("No estoy en reservas");
    }
}

function classTitleActive()
{
    var directorio = window.location.href;
    var title = document.getElementsByTagName("title")[0];
    
    $(".nav-item").removeClass("active");
//    console.log(directorio.split("/").reverse()[0].search("blog"));
    switch (directorio.split("/").reverse()[0]) 
    {
        case "":
            document.getElementsByClassName("nav-item")[0].classList.add("active");
            break;
        case "nosotros":
            document.getElementsByClassName("nav-item")[1].classList.add("active");
            title.innerHTML = "Nosotros";
            break;
        case "itinerario":
            document.getElementsByClassName("nav-item")[2].classList.add("active");
            title.innerHTML = "Itinerario";
            break;
        case "blog":
            document.getElementsByClassName("nav-item")[3].classList.add("active");
            title.innerHTML = "Blog";
            break;
        case "reservas":
            document.getElementsByClassName("nav-item")[4].classList.add("active");
            title.innerHTML = "Reservas";
            break;
        case "contacto":
            document.getElementsByClassName("nav-item")[5].classList.add("active");
            title.innerHTML = "Contacto";
            break;
        default:
//            console.warn("Algo no ha ido bien en el menú (ver function classTitleActive)");
            document.getElementsByClassName("nav-item")[0].classList.add("active");
            title.innerHTML = "Free Tour Santander";
            if (directorio.split("/").reverse()[0].search("blog") === 0)
            {
                $(".nav-item").removeClass("active");
                document.getElementsByClassName("nav-item")[3].classList.add("active");
                title.innerHTML = "Blog";
            }

            break;
    }
}

function bajaAlPulsar(e) 
{
    e.preventDefault();

    var target = this.hash,
    $target = $(target);

    $('html, body').stop().animate(
    {
        'scrollTop': $target.offset().top
    }, 800, 'swing', function () 
        {
            window.location.hash = target;
        });
}

function validaEmail(mail) 
{
    var patron = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (patron.test(mail))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function validaNombre(nombre)
{
    if (nombre.length < 3)
    {
        return false;
    }
    else
    {
        return true;
    }
}

function validaMensaje(mensaje)
{
    if (mensaje.length < 20)
    {
        return false;
    }
    else
    {
        return true;
    }
}

function compruebaCampos()
{
    var nombre = document.forms[0].nombre;
    var email = document.forms[0].correo;
    var mensaje = document.forms[0].mensaje;
//    debugger;
    if (validaNombre(nombre.value) && validaEmail(email.value) && validaMensaje(mensaje.value))
    {
//        console.log("Salgo con: "+ nombre.value +" "+email.value+" "+mensaje.value);
        grabaContacto(nombre.value, email.value, mensaje.value);
    }
    else
    {
//        alert("Revisa los campos introducidos. El contenido del mensaje debe tener 20 campos mínimo.");
        var modal = '<div class="errorModal modal fade bd-example-modal-lg show" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: block; padding-right: 16px;">';
        modal += '<div class="modal-dialog modal-lg">';
        modal += '<div class="modal-content">';
        modal += '<div class="modal-header badge-danger">';
        modal += '<h4 class="modal-title" id="myLargeModalLabel">Error</h4>';
//        modal += '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
//        modal += '<span aria-hidden="true">×</span>';
//        modal += '</button>';
        modal += '</div>';
        modal += '<div class="modal-body">Comprueba que los campos están debidamente introducidos</div>';                                     
        modal += '</div>';
        modal += '</div>';
        modal += '</div>';
        
        $("#modalError").append(modal);

        $(".errorModal").fadeOut(5000);
    }
}

function grabaContacto(nombre, email, mensaje)
{
    var fecha = new Date();
    var asunto = document.forms[0].asunto;
    var mes = 0;
    var dia = 0;
    var idContacto = null;
    console.log(fecha.getMonth()+1);
    
    parseInt(fecha.getMonth()+1) < 10 ? mes = "0"+parseInt(fecha.getMonth()+1) : mes = parseInt(fecha.getMonth()+1);
    parseInt(fecha.getDate()) < 10 ? dia = "0"+fecha.getDate() : dia = fecha.getDate();
    
    var fechaHoy = fecha.getFullYear()+"-"+mes+"-"+dia;
    
    console.log(fechaHoy);
    
    var miXHR = new XMLHttpRequest();
    miXHR.onreadystatechange = funcionEstado;
    miXHR.open("POST", "http://127.0.0.1/FreeTourSantander/public/server/inserta.php");
    miXHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var parametros = "idContacto="+idContacto+"&nombre="+nombre+"&asunto="+asunto.value+"&correo="+email+"&mensaje='"+mensaje+"'&fecha="+fechaHoy;
    miXHR.send(parametros);
}

function funcionEstado()
{
    if (this.readyState === 4 && this.status === 200)
    {
        console.log("Datos guardados en la base de datos");
        var modal = '<div class="elModal modal fade bd-example-modal-lg show" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: block; padding-right: 16px;">';
        modal += '<div class="modal-dialog modal-lg">';
        modal += '<div class="modal-content">';
        modal += '<div class="modal-header badge-success">';
        modal += '<h4 class="modal-title" id="myLargeModalLabel">Envío correcto</h4>';
//        modal += '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
//        modal += '<span aria-hidden="true">×</span>';
//        modal += '</button>';
        modal += '</div>';
        modal += '<div class="modal-body">El mensaje ha sido enviado con éxito. Pronto recibirá respuesta por parte de nuestro equipo.</div>';                                     
        modal += '</div>';
        modal += '</div>';
        modal += '</div>';
        
        $("#modalOk").append(modal);

        $(".elModal").fadeOut(5000);
        
        limpiaCampos();
        
    }
}

function limpiaCampos()
{
    var url = window.location.href.split("/").reverse();
    
    if (url[0] === "contacto")
    {
        document.forms[0].nombre.value = "";
        document.forms[0].correo.value = "";
        document.forms[0].asunto.value = "";
        document.forms[0].mensaje.value = "";
    }
    else if (url[0] === "reservas" || url[0] === "reservas#cancelarLaReserva" || url[0] === "reservas#reservas")
    {
        $("#nombre").val("");
        $("#apellidos").val("");
        $("#dia").val("");
        $("#telefono").val("");
        $("#asistentes").val("Selecciona");
        $("#email").val("");
    }

}

//FUNCIONES DE LA SECCIÓN DE RESERVAS

function validaApellidoReserva(apellido)
{
    var patron = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g;
    if (patron.test(apellido))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function validaNombreReserva(nombre)
{
    var patron = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g;
    if (patron.test(nombre))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function validaFecha(fecha)
{
    var datePatron = new Date();
    fecha = new Date(fecha.split("-")[0], parseInt(fecha.split("-")[1]-1), fecha.split("-")[2]);
    
    if (fecha.getTime() > datePatron.getTime() && fecha.getDay()===6)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function validaTelefono(numero)
{
    var patron = /^[0-9]{9}$/;
    
    if (patron.test(numero))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function validaAsistentes(numero)
{
    var patron = /^[1-9]{1}$/;
    
    if (patron.test(numero) || parseInt(numero) === 10)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function validaReserva()
{
    var nombre = document.forms[0].nombre;
    var apellidos = document.forms[0].apellidos;
    var dia = document.forms[0].dia;
    var telefono = document.forms[0].telefono;
    var asistentes = document.forms[0].asistentes;
    var email = document.forms[0].email;
    
//    console.log(nombre.value + " " + apellidos.value + " " + dia.value + " " + telefono.value + " " + asistentes.value + " " + email.value);

    var objElementos = {
        "nombre" : validaNombreReserva(nombre.value),
        "apellidos" : validaApellidoReserva(apellidos.value),
        "dia" : validaFecha(dia.value),
        "telefono" : validaTelefono(telefono.value),
        "asistentes" : validaAsistentes(asistentes.value),
        "email" : validaEmail(email.value)
                       };
                       
    if (!validaNombreReserva(nombre.value) || !validaApellidoReserva(apellidos.value) || !validaFecha(dia.value) || !validaTelefono(telefono.value) || !validaAsistentes(asistentes.value) || !validaEmail(email.value))
    {
        for (const propiedad in objElementos) 
        {
//            console.log(`${property}: ${objElementos[property]}`);
            if (`${objElementos[propiedad]}` === "false")
            {
                $("#"+`${propiedad}`).css("border", "2px solid red");
            }
            else
            {
                $("#"+`${propiedad}`).css("border", "");
            }
        }
        
        var modal = '<div class="errorModal modal fade bd-example-modal-lg show" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: block; padding-right: 16px;">';
        modal += '<div class="modal-dialog modal-lg">';
        modal += '<div class="modal-content">';
        modal += '<div class="modal-header badge-danger">';
        modal += '<h4 class="modal-title" id="myLargeModalLabel">Error</h4>';
        modal += '</div>';
        modal += '<div class="modal-body">Comprueba que los campos sobresaltados están correctamente introducidos</div>';                                     
        modal += '</div>';
        modal += '</div>';
        modal += '</div>';
        
        $("#reservaError").append(modal);

        $(".errorModal").fadeOut(5000);
    }
    else
    {
        grabaReserva(nombre.value, apellidos.value, dia.value, telefono.value, asistentes.value, email.value);
    }

}

function grabaReserva(nombre, apellidos, dia, telefono, asistentes, email)
{
    var miXHR = new XMLHttpRequest();
    miXHR.onreadystatechange = funcionReserva;
    miXHR.open("POST", "http://127.0.0.1/FreeTourSantander/public/server/reserva.php");
    miXHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//    console.log("nombre="+nombre+"&apellidos="+apellidos+"&personas="+asistentes+"&fecha="+dia+"&telefono='"+telefono+"'&email="+email);
    var parametros = "nombre="+nombre+"&apellidos="+apellidos+"&personas="+asistentes+"&fecha="+dia+"&telefono='"+telefono+"'&email="+email;
    miXHR.send(parametros);
}

function funcionReserva()
{
    if (this.readyState === 4 && this.status === 200)
    {
        anadeConfirmacion(this.responseText);
    }
}

function anadeConfirmacion(responseText)
{
    var objResponse = JSON.parse(responseText);
    
    if (objResponse["Consulta"] === true)
    {
        var modal = '<div class="elModalOk modal fade bd-example-modal-lg show" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: block; padding-right: 16px;">';
        modal += '<div class="modal-dialog modal-lg">';
        modal += '<div class="modal-content">';
        modal += '<div class="modal-header badge-success">';
        modal += '<h4 class="modal-title" id="myLargeModalLabel">Reserva realizada con éxito</h4>';
        modal += '</div>';
        modal += '<div class="modal-body">Tu reserva se ha realizado con éxito. Hemos enviado un correo a tu cuenta para indicar los detalles de la reserva</div>';                                     
        modal += '</div>';
        modal += '</div>';
        modal += '</div>';
        
        $("#reservaOk").append(modal);

        $(".elModalOk").fadeOut(5000);
        limpiaCampos();
    }
    else
    {
        var modal = '<div class="errorModal modal fade bd-example-modal-lg show" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: block; padding-right: 16px;">';
        modal += '<div class="modal-dialog modal-lg">';
        modal += '<div class="modal-content">';
        modal += '<div class="modal-header badge-danger">';
        modal += '<h4 class="modal-title" id="myLargeModalLabel">Error interno</h4>';
        modal += '</div>';
        modal += '<div class="modal-body">Se ha producido un error interno, por favor, inténtelo de nuevo más tarde.</div>';                                     
        modal += '</div>';
        modal += '</div>';
        modal += '</div>';
        
        $("#reservaError").append(modal);

        $(".errorModal").fadeOut(5000);
    }
}

function validaIdentificador(id)
{
    var patron = /^[0-9]{14}[A-Za-z]{2}[0-9]{1,2}$/;
    
    if (patron.test(id))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function validaCancelacion()
{
    var correo = document.forms[1].correo;
    var identificador = document.forms[1].identificador;
    var objElementos = {
        "correo" : validaEmail(correo.value),
        "identificador" : validaIdentificador(identificador.value)
                       };
                       
    if (!validaEmail(correo.value) || !validaIdentificador(identificador.value))
    {
        for (const propiedad in objElementos) 
        {
//            console.log(`${property}: ${objElementos[property]}`);
            if (`${objElementos[propiedad]}` === "false")
            {
                $("#"+`${propiedad}`).css("border", "2px solid red");
            }
            else
            {
                $("#"+`${propiedad}`).css("border", "");
            }
        }
        
        var modal = '<div class="modalCancelacion modal fade bd-example-modal-lg show" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: block; padding-right: 16px;">';
        modal += '<div class="modal-dialog modal-lg">';
        modal += '<div class="modal-content">';
        modal += '<div class="modal-header badge-danger">';
        modal += '<h4 class="modal-title" id="myLargeModalLabel">Error</h4>';
        modal += '</div>';
        modal += '<div class="modal-body">Comprueba que los campos sobresaltados están correctamente introducidos</div>';                                     
        modal += '</div>';
        modal += '</div>';
        modal += '</div>';
        
        $("#cancelError").append(modal);

        $(".modalCancelacion").fadeOut(5000);
    }
    else
    {
        ajaxCancela(correo.value, identificador.value);
    }
}

function ajaxCancela(correo,identificador)
{
    var miXHR = new XMLHttpRequest();
    miXHR.onreadystatechange = cambioEstadoEliminar;
    miXHR.open("POST", "http://127.0.0.1/FreeTourSantander/public/server/cancelaReserva.php");
    miXHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//    console.log("direccion="+correo+"&identificador="+identificador);
    var parametros = "direccion="+correo+"&identificador="+identificador;
    miXHR.send(parametros);
}

function cambioEstadoEliminar()
{
    if (this.readyState === 4 && this.status === 200)
    {
        eliminaReserva(this.responseText);
    }
}

function eliminaReserva(responseText)
{
    var objResponse = JSON.parse(responseText);

    if (objResponse["Borrado"] === true)
    {
        var modal = '<div class="cancelaOk modal fade bd-example-modal-lg show" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: block; padding-right: 16px;">';
        modal += '<div class="modal-dialog modal-lg">';
        modal += '<div class="modal-content">';
        modal += '<div class="modal-header badge-success">';
        modal += '<h4 class="modal-title" id="myLargeModalLabel">Cancelación exitosa</h4>';
        modal += '</div>';
        modal += '<div class="modal-body">Tu reserva se ha cancelado con éxito ¡Gracias por avisarnos!</div>';                                     
        modal += '</div>';
        modal += '</div>';
        modal += '</div>';
        
        $("#cancelOk").append(modal);

        $(".cancelaOk").fadeOut(5000);
        $("#correo").css("border", "");
        $("#identificador").css("border", "");
        limpiaCamposCancelacion();
    }
    else
    {
        var modal = '<div class="modalCancelacionError modal fade bd-example-modal-lg show" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: block; padding-right: 16px;">';
        modal += '<div class="modal-dialog modal-lg">';
        modal += '<div class="modal-content">';
        modal += '<div class="modal-header badge-danger">';
        modal += '<h4 class="modal-title" id="myLargeModalLabel">Error</h4>';
        modal += '</div>';
        modal += '<div class="modal-body">La reserva no ha podido cancelarse. Revise que los campos que ha introducido coinciden con los valores del correo</div>';                                   
        modal += '</div>';
        modal += '</div>';
        modal += '</div>';
        
        $("#cancelError").append(modal);

        $(".modalCancelacionError").fadeOut(5000);
    }
}

function limpiaCamposCancelacion()
{
    $("#correo").val("");
    $("#identificador").val("");
}

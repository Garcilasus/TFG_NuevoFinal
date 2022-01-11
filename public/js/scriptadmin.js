window.onload = init;

function init()
{
    var contrasena = document.getElementById("cambiaContrasena");
    var botonConfirm = document.getElementById("confirm");
    var selectores = document.getElementsByClassName("confirm");
    var dateReservas = document.getElementById("fechuca");
    var ver = document.getElementById("ver");
//    var losGuias = document.getElementById("losGuias");
//    var adjudicar = document.getElementById("adjudicar");
    var verTour = document.getElementById("verTour");
    
    if (document.body.contains(verTour))
    {
//        console.log("lo tenemos");
        verTour.addEventListener("click", verElTour, false);
    }
    
    if (document.body.contains(contrasena))
    {
        contrasena.addEventListener("click", muestraOcultaForm, false);
    }
    
    if (document.body.contains(botonConfirm))
    {
        setInterval(malditosChecked, 1000);
    }
    
//    if (document.body.contains(selectores))
//    {
//        setInterval(malditosChecked, 1);
//    }
    if (selectores.length > 0)
    {
            setInterval(malditosChecked,1);
    }
    
    if (document.body.contains(dateReservas) && document.body.contains(ver))
    {
//        console.log("yepa");
//        setInterval(malditosChecked, 1);
        ver.addEventListener("click", enviaFecha, false);
        
    }
}

function muestraOcultaForm()
{
    var formOculto = document.getElementsByClassName("oculto");
    var btn = document.getElementById("cambiaContrasena");
    var form = document.getElementById("formPassword");
    
    if (formOculto.length > 0)
    {
        form.removeAttribute("class");
        btn.value = "Ocultar formulario";
    }
    else
    {
        form.setAttribute("class", "oculto");
        btn.value = "Cambiar contraseña";
    }
}

function malditosChecked()
{
    
    var cuerpo = document.getElementById("cuerpoModal");
    var cuerpo2 = document.getElementById("cuerpoModal2");
    var checkboxes = document.querySelectorAll('input[type="checkbox"][class="combo"]:checked');
    
//    console.log(checkboxes.length);
//    console.log(document.getElementById("laElecsion"));
    
    if (document.getElementById("laElecsion") === null)
    {
        var parrafo = document.createElement("p");
        parrafo.setAttribute("id", "laElecsion");
        var texto = document.createTextNode("Está a punto de eliminar " +checkboxes.length+ " registros.");
        parrafo.appendChild(texto);
        cuerpo.appendChild(parrafo);
    }
    else
    {
        var parrafo2 = document.createElement("p");
        parrafo2.setAttribute("id", "laElecsion");
        var texto2 = document.createTextNode("Está a punto de eliminar " +checkboxes.length+ " registros.");
        parrafo2.appendChild(texto2);
//        console.log(cuerpo.childNodes[0]);
        cuerpo.replaceChild(parrafo2, cuerpo.childNodes[0]);
    }
    
    if (document.getElementById("laElecsion2") !== null)
    {
        var p2 = document.createElement("p");
        p2.setAttribute("id", "laElecsion2");
        var txt2 = document.createTextNode("Está a punto de agregar " +checkboxes.length+ " registros de reservas al guía:");
        p2.appendChild(txt2);
        cuerpo2.replaceChild(p2, cuerpo2.childNodes[0]);
    }
    
    
    var confirm = document.getElementById("confirm");
    
    
    if (checkboxes.length > 0)
    {
        confirm.removeAttribute("disabled", "");
    }
    else
    {
        confirm.setAttribute("disabled", "");
    }
    
    var confirmClass = document.getElementsByClassName("confirm");
    
    if (confirmClass.length > 0)
    {
        if (checkboxes.length > 0)
        {
            confirmClass[0].removeAttribute("disabled", "");
        }
        else
        {
            confirmClass[0].setAttribute("disabled", "");
            confirmClass[1].setAttribute("disabled", "");
        }
    }
    
}

function enviaFecha()
{
    var fecha = document.getElementById("fechuca");
    var miXHR = new XMLHttpRequest();
    
    miXHR.onreadystatechange = ajaxResponse;
    miXHR.open("POST", "http://127.0.0.1/FreeTourSantander/public/server/muestraReservas.php");
    miXHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//    console.log("fechuca="+fecha.value);
    var parametros = "fechuca="+fecha.value;
    miXHR.send(parametros);
//    console.log(fecha.value);
    
}

function verElTour()
{
    var guia = document.getElementById("verGuia");
    var fecha = document.getElementById("verFecha");
    
    var miXHR = new XMLHttpRequest();
    
    miXHR.onreadystatechange = ajaxVerTour;
    miXHR.open("POST", "http://127.0.0.1/FreeTourSantander/public/server/verTours.php");
    miXHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var parametros = "fechuca="+fecha.value+"&impartido="+guia.value;
    miXHR.send(parametros);
}

function ajaxResponse()
{
    var tabla = document.getElementById("lasReservas");
    var form = document.getElementById("cuerpoReservas");
    
    if (this.readyState === 4 && this.status === 200)
    {
        if (!document.body.contains(tabla))
        {
            generaTabla(this.responseText);
        }
        else
        {
            form.removeChild(tabla);
            generaTabla(this.responseText);
        }
    }
}

function ajaxVerTour()
{
    var cuerpo = document.getElementById("cuerpoVerReservas");
    var tabla = document.getElementById("tablaTour");
    
    if (this.readyState === 4 && this.status === 200)
    {
        if (!document.body.contains(tabla))
        {
            generaTablaTours(this.responseText);
        }
        else
        {
            cuerpo.removeChild(tabla);
            generaTablaTours(this.responseText);
        }
    }
}

function generaTablaTours(responseText)
{
    var cuerpo = document.getElementById("cuerpoVerReservas");
    var objResponse = JSON.parse(responseText);
//    console.log(objResponse);
    
    var acum = 0;
    
    var tabla = document.createElement("table");
    tabla.setAttribute("class", "table col-md-12 col-12");
    tabla.setAttribute("id", "tablaTour");
    var tHead = document.createElement("thead");
    var filaCab = document.createElement("tr");
    var arrayCabeceras = new Array("Nombre","Apellidos","Personas","Teléfono","Email");
    
    for (let i = 0; i < arrayCabeceras.length; i++) 
    {
        var thCabecera = document.createElement("th");
        var textoCab = document.createTextNode(arrayCabeceras[i]);
        thCabecera.appendChild(textoCab);
        filaCab.appendChild(thCabecera);
    }
//    debugger;
    tHead.appendChild(filaCab);
    tabla.appendChild(tHead);
    
    if (objResponse.length > 0)
    {
    
        var tbody = document.createElement("tbody");
    
        for (var i = 0; i < objResponse.length; i++) 
        {
            var tr = document.createElement("tr");
        
            for (var j = 0; j < objResponse[i].length; j++) 
            {
                var td = document.createElement("td");
                var texto = document.createTextNode(objResponse[i][j]);
            
                td.appendChild(texto);
                tr.appendChild(td);
            
                if (j === 2)
                {
                    acum += parseInt(objResponse[i][j]);
                }
            }
        
            tbody.appendChild(tr);
        }
    
//    console.log(acum);
        var trNew = document.createElement("tr");
        var tdTotal = document.createElement("th");
        tdTotal.setAttribute("colspan", 5);
        var txtTotal = document.createTextNode("Personas totales: "+acum);
    
        tdTotal.appendChild(txtTotal);
        trNew.appendChild(tdTotal);
        tbody.appendChild(trNew);
        
        tabla.appendChild(tbody);
        cuerpo.appendChild(tabla);
        
        document.getElementById("avisar").removeAttribute("disabled","");
        document.getElementById("borrarElTour").removeAttribute("disabled","");
    
    }
    else
    {
        var tBody = document.createElement("tbody");
        var tr = document.createElement("tr");
        var td = document.createElement("td");
        td.setAttribute("colspan", 5);
        var texto = document.createTextNode("No hay ningún registro a mostrar");
        td.appendChild(texto);
        tr.appendChild(td);
        tBody.appendChild(tr);
        tabla.appendChild(tBody);
        cuerpo.appendChild(tabla);
        
        document.getElementById("avisar").setAttribute("disabled","");
        document.getElementById("borrarElTour").setAttribute("disabled","");
    }
    
}

function generaTabla(responseText)
{
    var cuerpoReservas = document.getElementById("cuerpoReservas");
    var objResponse = JSON.parse(responseText);
//    console.log(objResponse); 
    
    
    var tabla = document.createElement("table");
    tabla.setAttribute("class", "table col-md-12 col-12");
    tabla.setAttribute("id", "lasReservas");
//    tabla.setAttribute("style", "overflow-x:auto");
    var tHead = document.createElement("thead");
    var filaCab = document.createElement("tr");
    var arrayCabeceras = new Array("","id","Nombre","Apellidos","Personas","Fecha","Telefono");
    var checkBox = document.createElement("input");
    var elRow = document.getElementById("elRow");
    
    
    for (let i = 0; i < arrayCabeceras.length; i++) 
    {
        if (arrayCabeceras[i] === "")
        {
            var thInput = document.createElement("th");
            
            checkBox.setAttribute("type", "checkbox");
//            checkBox.setAttribute("onclick", "selectAll(this)");
            thInput.appendChild(checkBox);
            filaCab.appendChild(thInput);
        }
        else
        {
            var th = document.createElement("th");
            var texto = document.createTextNode(arrayCabeceras[i]);
            th.appendChild(texto);
            filaCab.appendChild(th);
        }
    }
    
    tHead.appendChild(filaCab);
    
    if (objResponse.length > 0)
    {
    
        var tBody = document.createElement("tbody");
    
        for (var i = 0; i < objResponse.length; i++) 
        {
            var row = document.createElement("tr");
        
        
            for (var j = -1; j < objResponse[i].length; j++) 
            {
            
                if (j < 0)
                {
                    var tdCombo = document.createElement("td");
                    var combo = document.createElement("input");
                    combo.setAttribute("type", "checkbox");
                    combo.setAttribute("class", "combo");
                    combo.setAttribute("name", "borrado[]");
                    combo.setAttribute("value", objResponse[i][0]);
                    tdCombo.appendChild(combo);
                    row.appendChild(tdCombo);
                }
                else
                {
                    if (j !== 4)
                    {
                        var tdValores = document.createElement("td");
                        var textoValores = document.createTextNode(objResponse[i][j]);
                        tdValores.appendChild(textoValores);
                        row.appendChild(tdValores);
                    }
                    else
                    {
                        var tdValores = document.createElement("td");
                        var textoValores = document.createTextNode(objResponse[i][j].split("-").reverse().join("/"));
                        tdValores.appendChild(textoValores);
                        row.appendChild(tdValores);
                    }
                }
            }
        
        tBody.appendChild(row);
        }
    }
    else
    {
        var tBody = document.createElement("tbody");
        var tr = document.createElement("tr");
        var td = document.createElement("td");
        td.setAttribute("colspan", 6);
        var texto = document.createTextNode("No hay ningún registro a mostrar");
        td.appendChild(texto);
        tr.appendChild(td);
        tBody.appendChild(tr);
    }
    
    tabla.appendChild(tHead);
    tabla.appendChild(tBody);
    cuerpoReservas.insertBefore(tabla, elRow);
    
    checkBox.addEventListener("click", selectAll, false);
}

function selectAll()
{
    var checkboxes = document.getElementsByClassName("combo");
    for (var i = 0; i < checkboxes.length; i++)
    checkboxes[i].checked = this.checked;
}
/*
 * $salida  = "<form method='POST'>";
    $salida .= "<table class='table col-md-12 col-12'>";
    $salida .= "<thead>";
    $salida .= "<tr><th><input type='checkbox' onclick='selectAll(this)'></th><th>Id</th><th>Usuario</th><th>Privilegio</th></tr>";
    $salida .= "</thead>";
    $salida .= "<tbody>";
    foreach ($arrayUsuarios as $usuario)
    {
        if ($usuario->getId() == 1)
        {
            $salida .= "<tr><td></td><td>".$usuario->getId()."</td><td>".$usuario->getUsuario()."</td><td>".$usuario->getPrivilegio()."</td></tr>";
        }
        else if ($usuario->getId() > 1)
        {
            if ($_SESSION['superUser'] == 0 && $usuario->getPrivilegio() == "admin")
            {
                $salida .= "<tr><td></td><td>".$usuario->getId()."</td><td>".$usuario->getUsuario()."</td><td>".$usuario->getPrivilegio()."</td></tr>";
            }
            else
            {
                $salida .= "<tr>"
                    . "<td><input type='checkbox' class='combo' name='borrado[]' value='".$usuario->getId()."'></td>"
                    . "<td>".$usuario->getId()."</td>"
                    . "<td>".$usuario->getUsuario()."</td>"
                    . "<td>".$usuario->getPrivilegio()."</td>"
                    . "</tr>";
            }
            
        }
        
    }
    $salida .= "</tbody>";
    $salida .= "</table>";
    $salida .= "<div class='saltito container'><p>-</p></div>";
    $salida .= "<div class='d-flex justify-content-center col-md-3'>";
    $salida .= "<input type='button' id='confirm' class='form-control btn botonDanger' data-toggle='modal' data-target='#modalBorrado' value='Borrar seleccionados'>";
    $salida .= "</div>";
    
               
    $salida .= '<div class="modal fade" id="modalBorrado" tabindex="-1" role="dialog">'
               .'<div class="modal-dialog" role="document">'
               .'<div class="modal-content">'
               .'<div class="modal-header bg-warning">'
               .'<h5 class="modal-title"><i class="icon ion-md-alert"></i>&nbsp¡Aviso!</h5>'
               .'<button type="button" class="close" data-dismiss="modal" aria-label="Close">'
               .'<span aria-hidden="true">×</span>'
               .'</button>'
               .'</div>'
               .'<div class="modal-body" id="cuerpoModal">'
               .'</div>'
               .'<div class="modal-footer">'
               .'<button type="button" class="btn btn-danger" data-dismiss="modal">Descartar</button>'
               .'<input type="submit" value="Confirmar" class="btn btn-success" name="confirmaBorrado">'
               .'</div>'
               .'</div>'
               .'</div>' 
               .'</div>';
    $salida .= "</form>";
    $salida .= '<script>'
            .  'function selectAll(source) {'
            .  'checkboxes = document.getElementsByClassName("combo");'
            .  'for(var i=0, n=checkboxes.length;i<n;i++)'
            .  'checkboxes[i].checked = source.checked;'
            .  '}'
            .  '</script>';
 */




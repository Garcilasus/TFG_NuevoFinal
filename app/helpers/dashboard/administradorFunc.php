<?php

require_once RUTA_APP.'/modelos/Usuarios.php'; 
require_once RUTA_APP.'/librerias/DB.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function generaVistaUser()
{
    if (isset($_GET['user'])):
?>
     <section class="container-fluid">
                    <div class="row fondo">
                        <div class="container">
                            <div class="row">
                                <!--card padre-->
                                <div class="card col-md-12">
                                    <div class="card-header grisito">
                                        <h2 class="card-title centrado encabezado">¡Bienvenido!</h2>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <!--dia de la semana-->
                                            <div class="card col-md-6 col-6 col-sm-12 col-12">
                                                <div class="saltito container">
                                                    <p>-</p>
                                                </div>
                                                <img class="card-img-top offset-3 icons" src="img/user.jpg" alt="Día de la semana">

                                                <div class="card-body">
                                                    <h4 class="card-title centrado encabezado"><?php echo $_SESSION['usuario'] ?></h4>
                                                </div>
                                            </div>
                                            <!--fin dia de la semana-->
                                            <!--hora-->
                                            <div class="card col-md-6 col-6 col-sm-12 col-12">
                                                <div class="saltito container">
                                                    <p>-</p>
                                                </div>

                                                <div class="d-flex justify-content-center">
                                                    <p>Hola <strong><?php echo $_SESSION['usuario'] ?></strong>, bienvenido al panel de configuracion de Free Tour Santander.</p>
                                                </div>
                                                <div class="saltito container">
                                                    <p>-</p>
                                                </div>
                                                <form method="POST">
                                                <div class="d-flex justify-content-center">
                                                    <input type="submit" class="btn btn-outline-dark col-md-7 col-xl-4 col-6 botones" value="Cerrar sesión" name="cerrarSesion">
                                                </div>
                                                </form>
                                                <div class="saltito container">
                                                    <p>-</p>
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <input type="button" class="btn btn-outline-dark col-md-7 col-xl-4 col-6 botones" value="Cambiar contraseña" id="cambiaContrasena">
                                                </div>
                                                <div class="saltito container">
                                                    <p>-</p>
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <form method="POST" action="#" id="formPassword" class="oculto">
                                                        <div class="form-row col-12">
                                                            <div class="col-12">
                                                                <label>Nueva contraseña: <span style="font-weight: bold;">*</span></label>
                                                                <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" required="true">
                                                            </div>
                                                        </div>
                                                        <div class="form-row col-12">
                                                            <div class="col-12">
                                                                <label>Confirma contraseña: <span style="font-weight: bold;">*</span></label>
                                                                <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Repítela" required="true">
                                                            </div>
                                                        </div>
                                                        <div class="saltito container">
                                                            <p>-</p>
                                                        </div>
                                                        <div class="form-row col-12">
                                                            <div class="col-12">
                                                                <input type="submit" class="form-control btn botones" name="cambialo" value="Cambiar">
                                                            </div>
                                                        </div>
                                                        <div class="saltito container">
                                                            <p>-</p>
                                                        </div>
                                                    </form>
                                                    
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!--fin hora-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
      
        </section>
<?php endif;
}

function cambiaParking($nombre, $enlace, $tipo, $idParking)
{
   
    if (DB::actualizaParking($idParking, $nombre, $enlace, $tipo))
    {
        echo "<script>alert('El parking ha sido modificado con éxito');</script>";
        header("Refresh:0; url=dashboard?pag=parkings");
    }
    else
    {
        echo "<script>alert('Ha ocurrido un error desconocido');</script>";
    }
}

function agregaParking($nombre, $enlace, $tipo)
{
    if (DB::insertaParking($nombre, $enlace, $tipo))
    {
        echo "<script>alert('El parking ha sido agregado con éxito');</script>";
        header("Refresh:0; url=dashboard?pag=parkings");
    }
    else
    {
        echo "<script>alert('Ha ocurrido un error desconocido y el contenido no se ha insertado correctamente');</script>";
    }
}

function generaVistaParking()
{
    //si se pulsa el botón COMPLETAR (actualizar parking)
    if (isset($_POST['modificar']))
    {
        if (($_POST['selector'])=="" || $_POST['tipo']=="")
        {
            echo "<script>alert('Debes escoger un parking y/o un tipo de parking');</script>";
        }
        else
        {
            cambiaParking($_POST['nombre'], $_POST['enlace'], $_POST['tipo'], $_POST['selector']);
        }
    }
    
    //si se pulsa el botón INSERTAR (insertar un parking)
    
    if (isset($_POST['anadir']))
    {
        if ($_POST['tipoParking']=="")
        {
            echo "<script>alert('Debes añadir un tipo de parking de pago o gratuito');</script>";
        }
        else
        {
            agregaParking($_POST['nombreParking'], $_POST['enlaceParking'], $_POST['tipoParking']);
        }
    }
    
    //si se pulsa el botón de BORRAR SELECCIONADOS y después CONFIRMAR
    
    if (isset($_POST['confirmaBorrado']))
    {
        borraParking($_POST['borrado']);
    }
    
    ?>
<section class="container-fluid">
                    <div class="row fondo">
                        <div class="container">
                            <div class="row">
                                <!--card padre-->
                                <div class="card col-md-12">
                                    <div class="card-header grisito">
                                        <h2 class="card-title centrado encabezado">GESTIÓN DE PARKINGS</h2>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="card col-12">

                                                <div class="card-body">
                                                    <?php echo generaParkingsConId(); ?>
                                                </div>
                                            </div>
                                            <div class="card col-12 col-sm-12 col-md-12 col-xl-6">
                                                <div class="card-header grisito">
                                                    <h2 class="card-title centrado encabezado">MODIFICAR</h2>
                                                </div>
                                                <div class="saltito container">
                                                    <p>-</p>
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <?php
                                                        generaFormActualizaParkings();
                                                    ?>
                                                </div>
                                                
                                            </div>
                                            <div class="card col-12 col-sm-12 col-md-12 col-xl-6">
                                                <div class="card-header grisito">
                                                    <h2 class="card-title centrado encabezado">NUEVO PARKING</h2>
                                                </div>
                                                <div class="saltito container">
                                                    <p>-</p>
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <?php
                                                        generaFormInsertaParkings();
                                                    ?>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
      
        </section>
<?php
}
//ACTUALIZAR EL PARKING
function generaFormActualizaParkings()
{
    $parkings = DB::obtenerParkings();
    ?>
    <form method="POST" id="formActualizaParkings">
        <div class="form-row col-12">
            <div class="col-12">
                <label>ID y Nombre: <span style="font-weight: bold;">*</span></label>
                <select name="selector" class="form-control" required="true">
                    <option value="">Escoge parking</option>
                    <?php foreach ($parkings as $parking): ?>
                        <option value="<?php echo $parking->getIdParking() ?>"><?php echo $parking->getIdParking()." - ". $parking->getNombre() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-row col-12">
            <div class="col-12">
                <label>Nombre: <span style="font-weight: bold;">*</span></label>
                <input type="text" class="form-control" id="nombreParking" name="nombre" placeholder="Nombre del parking" required="true">
            </div>
        </div>
        <div class="form-row col-12">
            <div class="col-12">
                <label>Enlace: <span style="font-weight: bold;">*</span></label>
                <input type="text" class="form-control" id="enlaceParking" name="enlace" placeholder="Enlace de Google Maps" required="true">
            </div>
        </div>
        <div class="form-row col-12">
            <div class="col-12">
                <label>Tipo de parking: <span style="font-weight: bold;">*</span></label>
                <select name="tipo" class="form-control" required="true">
                    <option value="">Escoge</option>
                    <option value="0">Gratuito</option>
                    <option value="1">De pago</option>
                </select>
            </div>
        </div>
        <div class="saltito container">
            <p>-</p>
        </div>
        <div class="form-row col-12">
            <div class="col-12">
                <input type="submit" class="form-control btn botones" name="modificar" value="Completar">
            </div>
        </div>
        <div class="saltito container">
            <p>-</p>
        </div>
    </form>
    <?php
}

function generaFormInsertaParkings()
{
    ?>
    <form method="POST" id="formInsertaParkings">
        
        <div class="form-row col-12">
            <div class="col-12">
                <label>Nombre del nuevo parking: <span style="font-weight: bold;">*</span></label>
                <input type="text" class="form-control" id="parkingNombre" name="nombreParking" placeholder="Nombre del parking" required="true">
            </div>
        </div>
        <div class="form-row col-12">
            <div class="col-12">
                <label>Enlace: <span style="font-weight: bold;">*</span></label>
                <input type="text" class="form-control" id="parkingEnlace" name="enlaceParking" placeholder="Enlace de Google Maps" required="true">
            </div>
        </div>
        <div class="form-row col-12">
            <div class="col-12">
                <label>Tipo de parking: <span style="font-weight: bold;">*</span></label>
                <select name="tipoParking" class="form-control" required="true">
                    <option value="">Escoge</option>
                    <option value="0">Gratuito</option>
                    <option value="1">De pago</option>
                </select>
            </div>
        </div>
        <div class="saltito container">
            <p>-</p>
        </div>
        <div class="form-row col-12">
            <div class="col-12">
                <input type="submit" class="form-control btn botones" name="anadir" value="Insertar">
            </div>
        </div>
        <div class="saltito container">
            <p>-</p>
        </div>
    </form>
    <?php
}

function generaParkingsConId()
{
    $arrayParkings = DB::obtenerParkings();
    $salida  = "<form method='POST'>";
    $salida .= "<table class='rwd-table col-md-12 col-12'>";
    $salida .= "<thead>";
    $salida .= "<tr><th><input type='checkbox' onclick='selectAll(this)'></th><th>Identificador</th><th>Parking</th><th>Tipo</th><th>Enlace</th></tr>";
    $salida .= "</thead>";
    $salida .= "<tbody>";
    
    if (count($arrayParkings) == 0)
    {
        $salida .= "<tr><td colspan='5'>No hay ningún parking agregado</td>";
    }
    else
    {
        foreach ($arrayParkings as $parking) 
        {
            if ($parking->getTipo() == 0)
            {
                $salida .= "<tr><td><input type='checkbox' class='combo' name='borrado[]' value='".$parking->getIdParking()."'></td>";
                $salida .= "<td>".$parking->getIdParking()."</td>";
                $salida .= "<td>".$parking->getNombre()."</td>";
                $salida .= "<td>Gratuito</td>";
                $salida .= "<td>".$parking->getEnlace()."&nbsp&nbsp(<a href='".$parking->getEnlace()."' target='_blank'>Ir</a>)"
                        . "</td></tr>";
            }
            else
            {
                $salida .= "<tr><td><input type='checkbox' class='combo' name='borrado[]' value='".$parking->getIdParking()."'></td>";
                $salida .= "<td>".$parking->getIdParking()."</td>";
                $salida .= "<td>".$parking->getNombre()."</td>";
                $salida .= "<td>De pago</td>";
                $salida .= "<td>".$parking->getEnlace()."&nbsp&nbsp(<a href='".$parking->getEnlace()."' target='_blank'>Ir</a>)"
                        . "</td></tr>";
            }
        }
    }
    
    
    
    $salida .= "</tbody>";
    $salida .= "</table>";
    $salida .= "<div class='saltito container'><p>-</p></div>";
    $salida .= "<div class='d-flex justify-content-center col-md-3 offset-9'>";
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

    return $salida;
}

function cambiaContrasena($usuario, $contrasena)
{
    if (DB::actualizaContrasena($usuario, $contrasena))
    {
        echo "<script>alert('La contraseña ha sido modificada con éxito');</script>";
        header("Refresh:0; url=gestionar");
        session_destroy();
    }
    else
    {
        echo "<script>alert('Ha ocurrido un error desconocido');</script>";
    }
}

function cambiaContrasenaPorId($usuario, $contrasena)
{
    if (DB::actualizaContrasenaPorId($usuario, $contrasena))
    {
        echo "<script>alert('La contraseña ha sido modificada con éxito');</script>";
        header("Refresh:0; url=dashboard?pag=usuarios");
    }
    else
    {
        echo "<script>alert('Ha ocurrido un error desconocido');</script>";
    }
}

function borraUsuarios($combo)
{
    if (DB::eliminaUsuarios($combo))
    {
        if (count($combo)>1)
        {
            echo "<script>alert('Los usuarios han sido eliminados con éxito');</script>";
            header("Refresh:0; url=dashboard?pag=usuarios");
        }
        else
        {
            echo "<script>alert('El usuario ha sido eliminado con éxito');</script>";
            header("Refresh:0; url=dashboard?pag=usuarios");
        }
    }
    else
    {
        echo "<script>alert('Ha ocurrido un error desconocido y el usuario no se ha borrado correctamente');</script>";
    }
}

function borraParking($combo)
{
//    echo "<script>console.log($combo);</script>";
    if (DB::eliminaParking($combo))
    {
        if (count($combo)>1)
        {
            echo "<script>alert('Los parkings han sido eliminados con éxito');</script>";
            header("Refresh:0; url=dashboard?pag=parkings");
        }
        else
        {
            echo "<script>alert('El parking ha sido eliminado con éxito');</script>";
            header("Refresh:0; url=dashboard?pag=parkings");
        }
    }
    else
    {
        echo "<script>alert('Ha ocurrido un error desconocido y el contenido no se ha borrado correctamente');</script>";
    }
    
}

function cerrarSesion()
{
    header("Refresh:0; url=gestionar");
    session_destroy();
}


/*
 * USUARIOS
 */

function generaVistaUsuarios()
{
    //BORRAR USUARIO
    if (isset($_POST['confirmaBorrado']))
    {
        borraUsuarios($_POST['borrado']);
    }
    
    //ACTUALIZA CONTRASEÑA
    if (isset($_POST['modificar']))
    {
        if ($_POST['selector'] == "")
        {
            $mensaje = "Escoge un usuario para modificar la contraseña";
            
            if ($_POST['contrasena1'] !== $_POST['contrasena2'])
            {
                $mensaje .= " y asegúrate de que ambas contraseñas coinciden.";
                echo "<script>alert($mensaje);</script>";
            }
            echo "<script>alert($mensaje);</script>";
        }
        else if ($_POST['selector']!== "" && $_POST['contrasena1']!==$_POST['contrasena2'])
        {
            echo "<script>alert('Las contraseñas introducidas no coinciden entre sí.');</script>";
        }
        else
        {
            cambiaContrasenaPorId($_POST['selector'], $_POST['contrasena1']);
        }
        
    }
    
    //INSERTA NUEVO USUARIO
    
    if (isset($_POST['anadir']))
    {
        if ($_POST['contrasenaUsuario1'] !== $_POST['contrasenaUsuario2'])
        {
            echo "<script>alert('Las contraseñas introducidas no coinciden entre sí.');</script>";
        }
        else
        {
            agregaElUser($_POST['nombreUsuario'], $_POST['contrasenaUsuario1'], $_POST['tipoUsuario']);
            header("Refresh:0;url=dashboard?pag=usuarios");
        }
    }
    
    
    ?>
<section class="container-fluid">
                    <div class="row fondo">
                        <div class="container">
                            <div class="row">
                                <!--card padre-->
                                <div class="card col-md-12">
                                    <div class="card-header grisito">
                                        <h2 class="card-title centrado encabezado">GESTIÓN DE USUARIOS</h2>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="card col-12">

                                                <div class="card-body">
                                                    <?php echo generaUsersConId(); ?>
                                                </div>
                                            </div>
                                            <div class="card col-12 col-sm-12 col-md-12 col-xl-6">
                                                <div class="card-header grisito">
                                                    <h2 class="card-title centrado encabezado">CAMBIAR CONTRASEÑA</h2>
                                                </div>
                                                <div class="saltito container">
                                                    <p>-</p>
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <?php
                                                        generaFormActualizaContrasena();
                                                    ?>
                                                </div>
                                                
                                            </div>
                                            <div class="card col-12 col-sm-12 col-md-12 col-xl-6">
                                                <div class="card-header grisito">
                                                    <h2 class="card-title centrado encabezado">NUEVO USUARIO</h2>
                                                </div>
                                                <div class="saltito container">
                                                    <p>-</p>
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <?php
                                                        generaFormInsertaUsuario();
                                                    ?>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
      
        </section>
<?php

}

function generaUsersConId()
{
    $arrayUsuarios = DB::obtenUsuarios();
    
    $salida  = "<form method='POST'>";
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
    
    return $salida;
}

function generaFormActualizaContrasena()
{
    $arrayUsuarios = DB::obtenUsuarios();
    ?>
    <form method="POST" id="formActualizaContrasena">
        <div class="form-row col-12">
            <div class="col-12">
                <label>ID y Usuario: <span style="font-weight: bold;">*</span></label>
                <select name="selector" class="form-control" required="true">
                    <option value="">Escoge Usuario</option>
                    <?php foreach ($arrayUsuarios as $usuario): ?>
                    <?php if ($usuario->getId()>1)
                          {
                            if ($usuario->getPrivilegio()=='editor' && $_SESSION['superUser']==0)
                            {
                                echo "<option value='".$usuario->getId()."'>".$usuario->getId()." - ".$usuario->getUsuario()."</option>";
                            }
                            else if ($_SESSION['superUser']==1)
                            {
                                echo "<option value='".$usuario->getId()."'>".$usuario->getId()." - ".$usuario->getUsuario()."</option>";
                            }
                          }
                        ?>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-row col-12">
            <div class="col-12">
                <label>Nueva contraseña: <span style="font-weight: bold;">*</span></label>
                <input type="password" class="form-control" id="contrasena1" name="contrasena1" placeholder="Contraseña" required="true">
            </div>
        </div>
        <div class="form-row col-12">
            <div class="col-12">
                <label>Repítela: <span style="font-weight: bold;">*</span></label>
                <input type="password" class="form-control" id="contrasena2" name="contrasena2" placeholder="Misma contraseña" required="true">
            </div>
        </div>
        <div class="saltito container">
            <p>-</p>
        </div>
        <div class="form-row col-12">
            <div class="col-12">
                <input type="submit" class="form-control btn botones" name="modificar" value="Completar">
            </div>
        </div>
        <div class="saltito container">
            <p>-</p>
        </div>
    </form>
    <?php
}

function generaFormInsertaUsuario()
{
     ?>
    <form method="POST" id="formInsertaUsuario">
        
        <div class="form-row col-12">
            <div class="col-12">
                <label>Nombre del nuevo usuario: <span style="font-weight: bold;">*</span></label>
                <input type="text" class="form-control" id="usuarioNombre" name="nombreUsuario" placeholder="Nombre del usuario" required="true">
            </div>
        </div>
        <div class="form-row col-12">
            <div class="col-12">
                <label>Contraseña: <span style="font-weight: bold;">*</span></label>
                <input type="password" class="form-control" id="contrasenaUsuario1" name="contrasenaUsuario1" placeholder="Contraseña" required="true">
            </div>
        </div>
        <div class="form-row col-12">
            <div class="col-12">
                <label>Confirma contraseña: <span style="font-weight: bold;">*</span></label>
                <input type="password" class="form-control" id="contrasenaUsuario2" name="contrasenaUsuario2" placeholder="Confirmación" required="true">
            </div>
        </div>
        <div class="form-row col-12">
            <div class="col-12">
                <label>Tipo de usuario: <span style="font-weight: bold;">*</span></label>
                <select name="tipoUsuario" class="form-control" required="true">
                    <option value="">Escoge</option>
                    <option value="admin">Admin</option>
                    <option value="editor">Editor</option>
                </select>
            </div>
        </div>
        <div class="saltito container">
            <p>-</p>
        </div>
        <div class="form-row col-12">
            <div class="col-12">
                <input type="submit" class="form-control btn botones" name="anadir" value="Agregar">
            </div>
        </div>
        <div class="saltito container">
            <p>-</p>
        </div>
    </form>
    <?php
}

function agregaElUser($usuario, $contrasena, $privilegio)
{
    if (DB::insertaUsuario($usuario, $contrasena, $privilegio))
    {
        echo "<script>alert('El usuario ha sido agregado con éxito');</script>";
    }
    else
    {
        echo "<script>alert('Un error desconocido ha ocurrido a la hora de crear el usuario');</script>";
    }
}

//FIN FUNCIONES DE USUARIO

/*
 * INICIO DE LAS FUNCIONES DEL APARTADO DE RESERVAS
 */

function generaVistaReservas()
{
    
    //BORRA LA SELECCION DE LA RESERVA
    
    if (isset($_POST['borraSeleccion']))
    {
        if (DB::eliminaReservasSinAsignar($_POST['borrado']))
        {
            echo "<script>alert('Las reservas seleccionadas sin asignar se han borrado correctamente.');</script>";
            header("Refresh:0;url=dashboard?pag=reservas");
        }
        else
        {
            echo "<script>alert('Ha ocurrido un error en la aplicación.');</script>";
            header("Refresh:0;url=dashboard?pag=reservas");
        }
    }
    
    //ASIGNAR RESERVAS A LOS GUÍAS
    
    if (isset($_POST['adjudicalo']))
    {
        if (DB::agregaReservaAlGuia($_POST['borrado'], $_POST['guias'], $_POST['fechuca']))
        {
            echo "<script>alert('La reserva se adjudicó al guía seleccionado correctamente');</script>";
            header("Refresh:0;url=dashboard?pag=reservas");
        }
        else
        {
            echo "<script>alert('Ha ocurrido un error de servidor');</script>";
            header("Refresh:0;url=dashboard?pag=reservas");
        }
    }
    
    //AVISAR AL GUÍA
    
    if (isset($_POST['avisar']))
    {
        $acum = 0;
        $fecha = $_POST['verFecha'];
        $guia = $_POST['verGuia'];
        $objPersona = DB::obtenerPersonaPorId($guia);
        
        foreach ($objPersona as $persona)
        {
            $nombre = $persona->getNombre();
            $email = $persona->getEmail();
        }
        
        $objReservas = DB::obtenerReservasFechaIdGuia($guia, $fecha);
        
        $fechaCastellano = implode("/",array_reverse(explode("-",$fecha)));
        
        require_once 'phpmailer/src/PHPMailer.php';
        require_once 'phpmailer/src/SMTP.php';
        require_once 'phpmailer/src/Exception.php';
        
        $mail = new PHPMailer();
        
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "santanderfreetour@gmail.com";
        $mail->Password = "@Password00";
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";
        
        
        //opciones mail
        
        $mail->isHTML(true);
        $mail->setFrom("santanderfreetour@gmail.com", "Próximo tour: $fechaCastellano");
        $mail->addAddress($email);
        $mail->Subject = ("Detalles del tour $fechaCastellano");
        
        $contenidoMensaje = "<p>Estimado $nombre,</p>"
        . "<p>El próximo tour que impartirás será el $fechaCastellano a las 11:00 AM en la plaza del Ayuntamiento.</p>"
        . "<p>Los detalles del público que se espera son los siguientes:</p>"
        ."<table style='border:1px solid black'>"
        ."<tr><th style='border: 1px solid black'>Nombre</th><th style='border: 1px solid black'>Apellidos</th><th style='border: 1px solid black'>NºPersonas</th><th style='border: 1px solid black'>Teléfono</th><th style='border: 1px solid black'>Email</th></tr>";
        
        foreach ($objReservas as $reserva)
        {
            $acum += $reserva->getPersonas();
            $contenidoMensaje .= "<tr>"
                                    ."<td>".$reserva->getNombre()."</td>"
                                    ."<td>".$reserva->getApellidos()."</td>"
                                    ."<td>".$reserva->getPersonas()."</td>"
                                    ."<td>".$reserva->getTelefono()."</td>"
                                    ."<td>".$reserva->getEmail()."</td>"
                                ."</tr>";
        }
          
        $contenidoMensaje .= "<tr><th colspan=5 style='border: 1px solid black'>Personas totales que se esperan: $acum</th></tr></table>"
                  . "<p>Asegúrate de ser puntual y comprueba que los asistentes han llegado correctamente pero sin esperar a nadie. ¡La puntualidad es cosa seria!</p>"
                  . "<p>¡Buena suerte y buen servicio!</p>";
          
        $mail->Body = $contenidoMensaje;
        
        if ($mail->send())
        {
            echo "<script>alert('Se ha avisado al guía a través de email correctamente');</script>";
            header("Refresh:0;url=dashboard?pag=reservas");
        }
        else
        {
            echo "<script>alert('ERROR: $mail->ErrorInfo, el aviso al guía por correo electrónico fracasó');</script>";
            header("Refresh:0;url=dashboard?pag=reservas");
        }
          
    }
    
    //ELIMINAR EL TOUR ASIGNADO
    
    if (isset($_POST['destroy']))
    {
        $fecha = $_POST['verFecha'];
        $guia = $_POST['verGuia'];
        
        if (DB::eliminaTourAsignadoAlGuia($guia, $fecha))
        {
            $mensaje = "El tour ha sido cancelado con éxito";
            
            $fechaCastellano = implode("/",array_reverse(explode("-",$fecha)));
            
            $objEmpleado = DB::obtenerPersonaPorId($guia);
            
            foreach ($objEmpleado as $laPersona)
            {
                $nombre = $laPersona->getNombre();
                $email = $laPersona->getEmail();
            }
            
            if (!empty($_POST['correoEliminacion']))
            {
            
                require_once 'phpmailer/src/PHPMailer.php';
                require_once 'phpmailer/src/SMTP.php';
                require_once 'phpmailer/src/Exception.php';
        
                $mail = new PHPMailer();
        
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = "santanderfreetour@gmail.com";
                $mail->Password = "@Password00";
                $mail->Port = 465;
                $mail->SMTPSecure = "ssl";
            
            //opciones mail
        
                $mail->isHTML(true);
                $mail->setFrom("santanderfreetour@gmail.com", "Cancelado el tour del $fechaCastellano");
                $mail->addAddress($email);
                $mail->Subject = ("Cancelación del tour $fechaCastellano");
                $contenidoMensaje = "<p>Estimado $nombre,</p>"
                    . "<p>El tour establecido para la fecha $fechaCastellano ha sido cancelado. Es posible que se vuelva a realizar una asignación pronto para este mismo día.</p>"
                    . "<p>Un saludo y que tengas un maravilloso día.</p>";
                    
                $mail->Body = $contenidoMensaje;
            
                if ($mail->send())
                {
                    $mensaje .= " y el guía ha sido avisado a través de email.";
                }
                else
                {
                    $mensaje .= " y el guía NO ha podido ser avisado a través de email. ERROR: $mail->ErrorInfo";
                }
            
            }
            
            echo "<script>alert('".$mensaje."');</script>";
            header("Refresh:0;url=dashboard?pag=reservas");
        }
        else
        {
            echo "<script>alert('Ha ocurrido un error en el servidor y no se han podido modificar los datos ni avisar al guía.');</script>";
            header("Refresh:0;url=dashboard?pag=reservas");
        }
    }
    
    
    
    ?>
<section class="container-fluid">
                    <div class="row fondo">
                        <div class="container">
                            <div class="row">
                                <!--card padre-->
                                <div class="card col-md-12">
                                    <div class="card-header grisito">
                                        <h2 class="card-title centrado encabezado">GESTIÓN DE RESERVAS</h2>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="card col-12">
                                                <div class='saltito container'><p>-</p></div>
                                                <form method="POST" id="formReservas" class="col-12">
                                                <input type="date" id="fechuca" name="fechuca" class="form-control col-10 col-sm-4 offset-sm-4 offset-1 col-xl-2 offset-xl-5" placeholder="seleccione fecha">
                                                <div class='saltito container'><p>-</p></div>
                                                <input type="button" value="Ver" id="ver" class="btn botones form-control col-10 offset-1 col-sm-4 offset-sm-4 col-md-4 offset-md-4 col-xl-2 offset-xl-5">
                                                <div class="card-body" id="cuerpoReservas">
                                                    
                                                        <div class="form-row" id="elRow">
                                                            <div class="col-md-6">
                                                                <label class="offset-xl-3">Asignar al guía:</label>
                                                                <select name="guias" id="losGuias" class="confirm form-control col-sm-12 col-xl-6 offset-xl-3" onchange="funcionText(this);">
                                                                <option value="">Selecciona</option>
                                                                <?php 
                                                                $arrayGuias = obtieneGuias();
                                                            
                                                                foreach ($arrayGuias as $guia)
                                                                {
                                                                    echo "<option value='".$guia->getIdPersona()."'>".$guia->getNombre()."</option>";
                                                                }
                                                                ?>
                                                                </select>
                                                                
                                                                <div class='saltito container'><p>-</p></div>
                                                                <input type="button" disabled id="adjudicar" class="confirm form-control btn botones col-sm-12 col-xl-6 offset-xl-3" data-toggle="modal" data-target="#modalAdjudicar" value="Adjudicar">
                                                                <div class="modal fade" id="modalAdjudicar" tabindex="-1" role="dialog">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header bg-warning">
                                                                                <h5 class="modal-title"><i class="icon ion-md-alert"></i>&nbsp¡Aviso!</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                            </div>
                                                                            <div class="modal-body" id="cuerpoModal2">
                                                                                <p id="laElecsion2"></p>
                                                                                <p id="guiaSelec" style="text-align:center; font-weight:bold;"></p>
                                                                                <p>¿Confirmamos?</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Descartar</button>
                                                                                <input type="submit" value="Confirmar" class="btn btn-success" name="adjudicalo">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <script>
                                                                    function funcionText(sel) 
                                                                    {
                                                                        var opcion = sel.options[sel.selectedIndex].text;
                                                                        var guiaSelec = document.getElementById("guiaSelec");
                                                                        var adjBoton = document.getElementById("adjudicar");
                                                                        
                                                                        if (opcion === "Selecciona")
                                                                        {
                                                                            adjBoton.setAttribute("disabled","");
                                                                        }
                                                                        else
                                                                        {
                                                                            adjBoton.removeAttribute("disabled","");
                                                                            guiaSelec.innerHTML = "-"+opcion.toUpperCase()+"-";
                                                                        }
                                                                        
                                                                    }
                                                                </script>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <?php
                                                                if ($_SESSION['superUser']==1)
                                                                {
                                                                    echo "<div class='saltito container'><p>-</p></div>";
                                                                    echo "<input style='margin-top:27px;' id='confirm' type='button' class='form-control btn botonDanger col-sm-12 col-xl-6 offset-xl-3' data-toggle='modal' data-target='#modalBorrado' value='Borrar selección'>";
                                                                    echo '<div class="modal fade" id="modalBorrado" tabindex="-1" role="dialog">'
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
                                                                        .'<input type="submit" value="Confirmar" class="btn btn-success" name="borraSeleccion">'
                                                                        .'</div>'
                                                                        .'</div>'
                                                                        .'</div>' 
                                                                        .'</div>';
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="card col-12 col-sm-12 col-md-12">
                                                <div class="card-header grisito">
                                                    <h2 class="card-title centrado encabezado">RESERVAS ASIGNADAS</h2>
                                                </div>
                                                <div class="saltito container">
                                                    <p>-</p>
                                                </div>
                                                <div class="col-12">
                                                    <?php
                                                        formReservasAsignadas();
                                                    ?>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
      
        </section>
<?php

}

function formReservasAsignadas()
{
    $arrayUsuarios = DB::obtenUsuarios();
    ?>
    <form method="POST" id="formActualizaContrasena">
        <div class="form-row col-12">
            <div class="col-12">
                <label class="col-xl-6 offset-xl-3">Escoge guía: <span style="font-weight: bold;">*</span></label>
                <select name="verGuia" id="verGuia" class="confirm form-control col-sm-12 col-xl-6 offset-xl-3 col-md-6 offset-md-3">
                        <option value="">Selecciona</option>
                        <?php 
                            $arrayGuias = obtieneGuias();
                                                            
                            foreach ($arrayGuias as $guia)
                            {
                                echo "<option value='".$guia->getIdPersona()."'>".$guia->getNombre()."</option>";
                            }
                        ?>
                </select>
            </div>
        </div>
        <div class="form-row col-12">
            <div class="col-12">
                <label class="col-xl-6 offset-xl-3 col-md-6">Fecha de tour: <span style="font-weight: bold;">*</span></label>
                <input type="date" class="form-control col-xl-6 offset-xl-3 col-md-6 offset-md-3" id="verFecha" name="verFecha" placeholder="Contraseña" required="true">
            </div>
        </div>
        <div class="saltito container">
            <p>-</p>
        </div>
        <div class="form-row col-12">
            <div class="col-12">
                <input type="button" class="form-control btn botones col-xl-4 offset-xl-4 col-md-6 offset-md-3" id="verTour" value="Ver">
            </div>
        </div>
        <div class="saltito container">
            <p>-</p>
        </div>
        <div class="card-body" id="cuerpoVerReservas">
            
        </div>
        <div class="form-row col-12">
                <input type="submit" name="avisar" disabled class="form-control btn botones col-xl-4 offset-xl-4 col-md-6 offset-md-3" id="avisar" value="Avisar guía">
            <div class="saltito container">
            <p>-</p>
            </div>
                 <input type="button" disabled id="borrarElTour" class="form-control btn botonDanger col-xl-4 offset-xl-4 col-md-6 offset-md-3" data-toggle="modal" data-target="#modalConfBorraTour" value="Eliminar tour">
                    <div class="modal fade" id="modalConfBorraTour" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <h5 class="modal-title"><i class="icon ion-md-alert"></i>&nbsp¡Aviso!</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <p>Está a punto de eliminar un tour ya asignado a un guía.</p>
                                    <p>¿Deseas continuar?</p>
                                    <label><input type="checkbox" name="correoEliminacion" value="1">&nbsp;&nbsp;Click aquí para avisar al guía por correo</label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn botones" data-dismiss="modal">Descartar</button>
                                    <input type="submit" value="Eliminar tour" class="btn botonDanger" name="destroy">
                                </div>
                            </div>
                        </div>
                    </div>
                <!--<input type="submit" name="destroy" disabled class="form-control btn botonDanger col-xl-4 offset-xl-4 col-md-6 offset-md-3" id="borrarElTour" value="Eliminar tour">-->
        </div>
    </form>
    <?php
}

function obtieneGuias()
{
    $arrayGuias = DB::obtenerGuias();
    return $arrayGuias;
}

/*
 * FIN DE LAS FUNCIONES DEL APARTADO DE RESERVAS
 */

/*
 * COMIENZO DE LAS FUNCIONES DEL APARTADO DE PERSONAL
 */

function generaVistaPersonal()
{
    //php con funciones
    
    //Borrar usuarios clickados
    
    if (isset($_POST['confirmaBorrado']))
    {
        if (DB::eliminaPersonalPorId($_POST['borrado']))
        {
            echo "<script>alert('Se han borrado los miembros del personal escogidos');</script>";
            header("Refresh:0;url=dashboard?pag=personal");
        }
        else
        {
            echo "<script>alert('Ha ocurrido un error en el servidor');</script>";
            header("Refresh:0;url=dashboard?pag=personal");
        }
    }
    
    //Cambia a alguien del personal a guia o quitalo
    
    if (isset($_POST['modificar']))
    {
        if (!empty($_POST['selector']) && $_POST['guia'] !== "" || $_POST['guia'] == 0)
        {
//            echo "<script>alert('".$_POST['guia']."');</script>";
            if (DB::cambiaGuiaNoGuia($_POST['selector'], $_POST['guia']))
            {
                echo "<script>alert('Se ha actualizado con éxito al personal.');</script>";
                header("Refresh:0;url=dashboard?pag=personal");
            }
            else
            {
                echo "<script>alert('Ha ocurrido un error en el servidor.');</script>";
                header("Refresh:0;url=dashboard?pag=personal");
            }
        }
        else
        {
            echo "<script>alert('Los campos no pueden estar vacíos.');</script>";
            header("Refresh:0;url=dashboard?pag=personal");
        }
    }
    
    //agregar un nuevo miembro
    
    if (isset($_POST['anadir']))
    {
        $nombreFoto = $_FILES['fotoMiembro']['name'];
//        $tipoFoto = $_FILES['fotoMiembro']['type'];
//        $tamanoFoto = $_FILES['fotoMiembro']['size'];
//        $_FILES['fotoMiembro']['tmp_name'] = $_SERVER['DOCUMENT_ROOT']."/FreeTourSantander/public/img/tmp";
//        $carpetaTemporal = $_FILES['fotoMiembro']['tmp_name'];
//        $carpetaDestino = $_SERVER['DOCUMENT_ROOT']."/FreeTourSantander/public/img/tmp')";
        if ($_POST['guiaOno'] !== "" || $_POST['guiaOno'] == 0)
        {
            if (DB::insertaNuevoPersonalConFoto($_POST['nombreMiembro'], $_POST['ocupacion'], $_POST['emailMiembro'], $_POST['guiaOno'], $nombreFoto))
            {
                echo "<script>alert('Se ha insertado al nuevo miembro con éxito.');</script>";
                header("Refresh:0;url=dashboard?pag=personal");
            }
            else
            {
                echo "<script>alert('Ha ocurrido un error en el servidor.');</script>";
                header("Refresh:0;url=dashboard?pag=personal");
            }
        }
        else
        {
            echo "<script>alert('Los campos no pueden estar vacíos.');</script>";
            header("Refresh:0;url=dashboard?pag=personal");
        }
//        echo "<script>console.log('".$nombreFoto."'----'".$tipoFoto."'----'".$tamanoFoto."');</script>";
//        echo "<script>console.log('".$_SERVER['DOCUMENT_ROOT']."/FreeTourSantander/public/img/tmp');</script>";
//        echo "<script>console.log('".$carpetaTemporal."');</script>";
        
            
    }
    
    ?>
<section class="container-fluid">
                    <div class="row fondo">
                        <div class="container">
                            <div class="row">
                                <!--card padre-->
                                <div class="card col-md-12">
                                    <div class="card-header grisito">
                                        <h2 class="card-title centrado encabezado">GESTIÓN DE PERSONAL</h2>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="card col-12">

                                                <div class="card-body">
                                                    <?php echo generaTablaDePersonal(); ?>
                                                </div>
                                            </div>
                                            <div class="card col-12 col-sm-12 col-md-12 col-xl-6">
                                                <div class="card-header grisito">
                                                    <h2 class="card-title centrado encabezado">GUÍAS</h2>
                                                </div>
                                                <div class="saltito container">
                                                    <p>-</p>
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <?php
                                                        generaFormModificaGuia();
                                                    ?>
                                                </div>
                                                
                                            </div>
                                            <div class="card col-12 col-sm-12 col-md-12 col-xl-6">
                                                <div class="card-header grisito">
                                                    <h2 class="card-title centrado encabezado">NUEVO MIEMBRO</h2>
                                                </div>
                                                <div class="saltito container">
                                                    <p>-</p>
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <?php
                                                        generaFormNuevoMiembro();
                                                    ?>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
      
        </section>
<?php

}

function generaTablaDePersonal()
{
    $objPersonal = DB::obtenerPersonal();
    
    $salida  = "<form method='POST'>";
    $salida .= "<table class='table col-md-12 col-12'>";
    $salida .= "<thead>";
    $salida .= "<tr><th><input type='checkbox' onclick='selectAll(this)'></th><th>Nombre y apellido</th><th>Email</th><th>¿Guía?</th></tr>";
    $salida .= "</thead>";
    $salida .= "<tbody>";
    foreach ($objPersonal as $personal)
    {
        $salida .= "<tr>";
        $salida .= "<td><input type='checkbox' name='borrado[]' class='combo' value='".$personal->getIdPersona()."'></td>"
                .  "<td>".$personal->getNombre()."</td>"
                .  "<td>".$personal->getEmail()."</td>";
        if ($personal->getGuia() > 0)
        {
            $salida .= "<td><i style='color:green' class='icon ion-md-checkmark'></i></td>";
        }
        else
        {
            $salida .= "<td><i style='color:red' class='icon ion-md-close'></i></td>";
        }
        $salida .= "</tr>";
        
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
    
    return $salida;
}

function generaFormModificaGuia()
{
    $objPersonal = DB::obtenerPersonal();
    ?>
    <form method="POST" id="formActualizaContrasena">
        <div class="form-row col-12">
            <div class="col-12">
                <p>Modifica a alguien del personal para ser guía o no.</p>
                <label>Miembro: <span style="font-weight: bold;">*</span></label>
                <select name="selector" class="form-control" required="true">
                    <option value="">Escoge persona</option>
                    <?php foreach ($objPersonal as $persona): ?>
                          <option value="<?php echo $persona->getIdPersona() ?>"><?php echo $persona->getNombre() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-row col-12">
            <div class="col-12">
                <label>Modifica a: <span style="font-weight: bold;">*</span></label>
                <select name="guia" required="true" class="form-control">
                    <option value="">Escoge opción</option>
                    <option value="1">Añadir a guía</option>
                    <option value="0">Quitar de guía</option>
                </select>
            </div>
        </div>
        <div class="saltito container">
            <p>-</p>
        </div>
        <div class="form-row col-12">
            <div class="col-12">
                <input type="submit" class="form-control btn botones" name="modificar" value="Completar">
            </div>
        </div>
        <div class="saltito container">
            <p>-</p>
        </div>
    </form>
    <?php
}

function  generaFormNuevoMiembro()
{
    ?>
<form method="POST" id="formInsertaUsuario" enctype="multipart/form-data">
        
        <div class="form-row col-12">
            <div class="col-12">
                <label>Nombre y apellido: <span style="font-weight: bold;">*</span></label>
                <input type="text" class="form-control" id="usuarioNombre" name="nombreMiembro" placeholder="Nombre del miembro" >
            </div>
        </div>
        <div class="form-row col-12">
            <div class="col-12">
                <label>Descripción (ocupación): <span style="font-weight: bold;">*</span></label>
                <input type="text" class="form-control" id="contrasenaUsuario1" name="ocupacion" placeholder="Dedicación/estudios" >
            </div>
        </div>
        <div class="form-row col-12">
            <div class="col-12">
                <label>Email: <span style="font-weight: bold;">*</span></label>
                <input type="email" class="form-control" id="mail" name="emailMiembro" placeholder="Email" >
            </div>
        </div>
        <div class="form-row col-12">
            <div class="col-12">
                <label>¿Nuevo guía?: <span style="font-weight: bold;">*</span></label>
                <select name="guiaOno" class="form-control" >
                    <option value="">Escoge</option>
                    <option value="0">No</option>
                    <option value="1">Sí</option>
                </select>
            </div>
        </div>
        <div class="form-row col-12">
            <div class="col-12">
                <label>Foto: <span style="font-weight: bold;">*</span></label>
                <input type="file" class="form-control" id="foto" name="fotoMiembro" accept="image/x-png,image/gif,image/jpeg">
            </div>
        </div>
        <div class="saltito container">
            <p>-</p>
        </div>
        <div class="form-row col-12">
            <div class="col-12">
                <input type="submit" class="form-control btn botones" name="anadir" value="Agregar">
            </div>
        </div>
        <div class="saltito container">
            <p>-</p>
        </div>
    </form>
    <?php
}



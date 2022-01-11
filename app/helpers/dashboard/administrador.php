<?php 
require_once RUTA_APP . '/helpers/dashboard/administradorFunc.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta http-equiv="X-UA-Compatible" content="id=edge">
        <link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist/css/bootstrap.min.css">
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
        <script src="js/scriptadmin.js"></script>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <title>Admin FTS</title> 
    </head>
    <body id="bodyAdmin">
        
        <?php
        if (isset($_POST['cambialo']))
        {
            if ($_POST['pass'] == $_POST['pass2'])
            {
                cambiaContrasena($_SESSION['usuario'], $_POST['pass']);
            }
            else
            {
                echo "<script>alert('Las contraseñas introducidas no coinciden entre sí');</script>";
            }
        }
        
        if (isset($_POST['cerrarSesion']))
        {
            cerrarSesion();
        }    
            
        ?>
        
        <header>
            <nav class="navbar navbar-expand-md">
                <div class="container">

                    <a class="navbar-brand" href="dashboard?user=<?php echo $_SESSION['usuario'] ?>"><img src="img/logo.png" alt="FREE TOUR SANTANDER" id="logo"></a>

                    <button class="navbar-toggler" id="botonMenu" type="button" data-toggle="collapse" data-target="#miMenu" aria-controls="miMenu" aria-expanded="false">
                        <img src="img/menu.png">
                    </button>
                    <div class="collapse navbar-collapse" id="miMenu">
                        <div class="navbar-nav ml-auto">

                            <figure>
                                <a class="nav-item nav-link enlaces encabezado" href="dashboard?pag=usuarios">Usuarios</a>
                            </figure>
                            <figure>
                                <a class="nav-item nav-link enlaces encabezado" href="dashboard?pag=parkings">Parkings</a>
                            </figure>
                            <figure>
                                <a class="nav-item nav-link enlaces encabezado" href="dashboard?pag=articulos">Artículos</a>
                            </figure>
                            <figure>
                                <a class="nav-item nav-link enlaces encabezado" href="dashboard?pag=reservas">Reservas</a>
                            </figure>
                            <?php if ($_SESSION['superUser'] == 1): ?>
                            <figure>
                                <a class="nav-item nav-link enlaces encabezado" href="dashboard?pag=personal">Personal</a>
                            </figure>
                            <?php endif; ?>
                            <figure>
                                <a class="nav-item nav-link active enlaces encabezado" href="dashboard?user=<?php echo $_SESSION['usuario'] ?>"><i class="icon ion-md-person"></i> <?php echo $_SESSION['usuario'] ?></a>
                            </figure>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <div id="contenedorAdmin">
            <?php
                    generaVistaUser();
                    
                 if (isset($_GET['pag']))
                 {
                     $pagina = $_GET['pag'];
                     
                     switch ($pagina) 
                     {
                         case 'parkings':
                             generaVistaParking();
                             break;
                         case 'usuarios':
                             generaVistaUsuarios();
                             break;
                         case 'reservas':
                             generaVistaReservas();
                             break;
                         case 'personal':
                             $_SESSION['superUser'] == 1 ? generaVistaPersonal() : header("Refresh:0;url=dashboard?user=".$_SESSION['usuario']);
                             break;
                         default:
                             echo 'ERROR 404';
                             break;
                     }
                     
                 }
            ?>
        </div>
<script src="jquery/jQuery-3.4.1.js"></script>
<script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>




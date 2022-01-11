
<!DOCTYPE html>
<?php require_once RUTA_APP.'/helpers/gestionar/gestionarFunc.php'; ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="theme-color" content="#333">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta http-equiv="X-UA-Compatible" content="id=edge">
        <link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <title>Login</title> 
    </head>
    <body>

        <div class="radial-gradient container-fluid">
            <?php
//    $contrasena = "@Admin123";
logueaUser();
?>
            <div class="row">

                <div class="container" style="margin-top: 50px">
                    <div class="row">
                        <div class="container d-flex justify-content-center">

                            <img src="img/logo.png" alt="Logo FTS" class="col-10 col-sm-8 col-md-5 col-xl-4">

                        </div>
                    </div>
                    <div class="row" style="height: 600px;">

                        <div class="col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-12 col-xl-8 offset-xl-2">
                            
                            <div class="form-group col-12" style="margin-top: 100px;">
                                <form method="POST">
                                    
                                    <div class="row">
                                        <div class="container d-flex justify-content-center">
                                            <div class="form-row col-12 col-xl-8 col-md-10">
                                                <label style="color:white">Nombre de usuario:</label>
                                                <input type="text" required="true" class="form-control" name="usuario" id="usuario" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="container d-flex justify-content-center">
                                            <div class="form-row col-12 col-xl-8 col-md-10" style="margin-top: 20px">
                                                <label style="color:white">Contraseña:</label>
                                                <input type="password" required="true" class="form-control" name="contrasena" id="contrasena">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="container saltito">
                                        <p>-</p>
                                    </div>
                                    <div class="container saltito">
                                        <p>-</p>
                                    </div>
                                    <div class="row">
                                        <div class="container d-flex justify-content-center">
                                            <div class="form-row col-7 col-sm-7 col-md-5 col-xl-4">
                                            <input type="submit" class="btn botones form-control" value="Acceder" id="acceder" name="acceder">
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="container saltito">
                                        <p>-</p>
                                    </div>
                                    <div class="row">
                                        <div class="container d-flex justify-content-center">
                                            <div class="form-row">
                                                <a class="paginappal" href="./"><< volver a la página principal</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>

        <script src="jquery/jQuery-3.4.1.js"></script>
        <script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
    </body>
</html>
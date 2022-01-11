<?php

require_once RUTA_APP.'/modelos/Usuarios.php'; 
require_once RUTA_APP.'/librerias/DB.php';

function logueaUser()
{
    if (isset($_POST['acceder']))
    {
        $hash = DB::obtenContrasena($_POST['usuario']);
        //contraseña origen: $2y$11$w/a5BYxt4KJFaLFOfcRDg.uhN9P7tWfgSfWiN7uIQTD6N3H.CO5hm (@Admin123)
        if (empty($hash))
        {
            echo "<script>alert('El usuario o contraseña son incorrectos');</script>";
        }
        else
        {
            if (password_verify($_POST['contrasena'], $hash))
            {
                session_name("login");
                session_start();
                $_SESSION['usuario'] = $_POST['usuario'];
                $_SESSION['rol'] = DB::obtenPrivilegio($_POST['usuario']);
                $_SESSION['superUser'] = DB::obtenSuperUser($_POST['usuario']);
                header("location:dashboard?user=".$_POST['usuario']);
            }
            else
            {
                echo "<script>alert('El usuario o contraseña son incorrectos. Verifica que ha introducido bien los datos');</script>";
            }
        }
    }
}
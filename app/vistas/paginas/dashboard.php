<?php
session_name("login");
session_start();
if (!isset($_SESSION['usuario']) && !isset($_SESSION['rol']))
{
    header("location:gestionar");
}
else
{
    if ($_SESSION['rol'] == 'admin')
    {
        require_once RUTA_APP . '/helpers/dashboard/administrador.php';
        
        //deslogueo por tiempo de inactividad $inactivo en Segundos (10 minutos)
//        $inactive = 600; 
//        if (!isset($_SESSION['timeout']))
//        {
//            $_SESSION['timeout'] = time() + $inactive; 
//        }
//        
//        $session_life = time() - $_SESSION['timeout'];
//
//        if ($session_life > $inactive)
//        {  
//            session_destroy(); 
//            header("location:gestionar");
//        }
//
//        $_SESSION['timeout'] = time();
    }
    else if ($_SESSION['rol'] == 'editor')
    {
        require_once RUTA_APP . '/helpers/dashboard/editor.php';
        
        //deslogueo por tiempo de inactividad $inactivo en Segundos (10 minutos)
        $inactive = 600; 
        if (!isset($_SESSION['timeout']))
        {
            $_SESSION['timeout'] = time() + $inactive; 
        }
        
        $session_life = time() - $_SESSION['timeout'];

        if ($session_life > $inactive)
        {  
            session_destroy(); 
            header("location:gestionar");
        }

        $_SESSION['timeout'] = time();
    }
}





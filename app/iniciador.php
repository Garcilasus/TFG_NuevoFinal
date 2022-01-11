<?php
//cargamos librerias

require_once 'config/configurar.php';


require_once 'librerias/DB.php';
require_once 'librerias/Controlador.php';
require_once 'librerias/Core.php';

//AUTOLOAD PHP

spl_autoload_register(function($nombreClase)
{
    require_once 'librerias/'.$nombreClase.'.php';
});
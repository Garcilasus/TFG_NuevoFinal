<?php

require_once RUTA_APP.'/modelos/Personal.php'; 
require_once RUTA_APP.'/librerias/DB.php';

function pintaPersonal()
{
    $arrayPersonal = DB::obtenerPersonal();
    $salida = "";
//    echo "<script>alert('".(count($arrayPersonal)-1)."');</script>";
    for ($i = 0; $i<count($arrayPersonal); $i++)
    {
        if ($i == (count($arrayPersonal)-2))
        {
            $salida.= "<div class='card col-md-4 col-6 col-sm-4 offset-0 offset-sm-2 offset-md-2 col-lg offset-lg-0'>";
            $salida.= "<img class='card-img-top offset-3 presentacion' src='img/".$arrayPersonal[$i]->getFoto()."' alt='foto de ".$arrayPersonal[$i]->getNombre()."'>";
            $salida.= "<div class='card-body'>";
            $salida.= "<h4 class='card-title centrado encabezado'>".$arrayPersonal[$i]->getNombre()."</h4>";
            $salida.= "<p class='card-text centrado'>".$arrayPersonal[$i]->getOcupacion()."</p>";
            $salida.= "</div>";
            $salida.= "</div>";
        }
        else if ($i == (count($arrayPersonal)-1))
        {
            $salida.= "<div class='card col-md-4 col-6 col-sm-4 offset-3 offset-sm-0 offset-md-0 col-lg offset-lg-0'>";
            $salida.= "<img class='card-img-top offset-3 presentacion' src='img/".$arrayPersonal[$i]->getFoto()."' alt='foto de ".$arrayPersonal[$i]->getNombre()."'>";
            $salida.= "<div class='card-body'>";
            $salida.= "<h4 class='card-title centrado encabezado'>".$arrayPersonal[$i]->getNombre()."</h4>";
            $salida.= "<p class='card-text centrado'>".$arrayPersonal[$i]->getOcupacion()."</p>";
            $salida.= "</div>";
            $salida.= "</div>";
        }
        else
        {
            $salida.= "<div class='card col-md-4 col-6 col-sm-4 col-lg offset-lg-0'>";
            $salida.= "<img class='card-img-top offset-3 presentacion' src='img/".$arrayPersonal[$i]->getFoto()."' alt='foto de ".$arrayPersonal[$i]->getNombre()."'>";
            $salida.= "<div class='card-body'>";
            $salida.= "<h4 class='card-title centrado encabezado'>".$arrayPersonal[$i]->getNombre()."</h4>";
            $salida.= "<p class='card-text centrado'>".$arrayPersonal[$i]->getOcupacion()."</p>";
            $salida.= "</div>";
            $salida.= "</div>";
        }
    }
    
    return $salida;
}

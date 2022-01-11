<?php
require_once RUTA_APP.'/modelos/Parking.php'; 
require_once RUTA_APP.'/librerias/DB.php';

function tablaParkings()
{
    $arrayParkings = DB::obtenerParkings();

    $salida = "<table class='rwd-table col-md-12'>";
    $salida .= "<thead>";
    $salida .= "<tr><th>Parking</th><th>Tipo</th><th>Ubicación</th></tr>";
    $salida .= "</thead>";
    $salida .= "<tbody>";
    foreach ($arrayParkings as $parking) 
    {
        if ($parking->getTipo() == 0)
        {
            $salida .= "<tr><td>".$parking->getNombre()."</td>";
            $salida .= "<td>Gratuito</td>";
            $salida .= "<td><a class='btn btn-outline-dark botones botonTabla' href='".$parking->getEnlace()."' target='_blank'><img class='col-md-12' src='img/free-tour-santander-parking-maps.png' alt='maps'></a></td></tr>";
        }
        else
        {
            $salida .= "<tr><td>".$parking->getNombre()."</td>";
            $salida .= "<td>De pago</td>";
            $salida .= "<td><a class='btn btn-outline-dark botones botonTabla' href='".$parking->getEnlace()."' target='_blank'><img class='col-md-12' src='img/free-tour-santander-parking-maps.png' alt='maps'></a></td></tr>";
        }
    }

    $salida .= "</tbody>";
    $salida .= "</table>";

    return $salida;
}
?>
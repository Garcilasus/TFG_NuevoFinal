<?php
//borrar fichero entero, esto se utiliza como mediador entre las paginas y las bases de datos
class Parking
{
    private $nombre;
    private $enlace;
    private $tipo;
    private $idParking;
    
    function __construct($row) 
    {
        $this->nombre = $row['nombre'];
        $this->enlace = $row['enlace'];
        $this->tipo = $row['tipo'];
        $this->idParking = $row['idParking'];
    }
    
    function getNombre()
    {
        return $this->nombre;
    }

    function getEnlace()
    {
        return $this->enlace;
    }

    function getTipo()
    {
        return $this->tipo;
    }

    function getIdParking()
    {
        return $this->idParking;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function setEnlace($enlace)
    {
        $this->enlace = $enlace;
    }

    function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    function setIdParking($idParking)
    {
        $this->idParking = $idParking;
    }
    
}


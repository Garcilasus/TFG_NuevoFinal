<?php

class Contactar
{
    private $idContacto;
    private $nombre;
    private $asunto;
    private $correo;
    private $mensaje;
    private $fecha;
    
    function __construct($row) 
    {
        $this->nombre = $row['idContacto'];
        $this->nombre = $row['nombre'];
        $this->enlace = $row['asunto'];
        $this->tipo = $row['correo'];
        $this->idParking = $row['mensaje'];
        $this->fecha = $row['fecha'];
    }
    
    function getIdContacto() {
        return $this->idContacto;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getAsunto() {
        return $this->asunto;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getMensaje() {
        return $this->mensaje;
    }
    function getFecha() {
        return $this->fecha;
    }

    function setIdContacto($idContacto) {
        $this->idContacto = $idContacto;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setAsunto($asunto) {
        $this->asunto = $asunto;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setMensaje($mensaje) {
        $this->mensaje = $mensaje;
    }
    function setFecha($fecha) {
        $this->fecha = $fecha;
    }


}


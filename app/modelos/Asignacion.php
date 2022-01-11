<?php

class Asignacion
{
    private $id;
    private $fecha;
    private $idGuia;
    private $publico;
    
    function __construct($row) {
        $this->id = $row['id'];
        $this->fecha = $row['fecha'];
        $this->idGuia = $row['idGuia'];
        $this->publico = $row['publico'];
    }
    
    function getId() {
        return $this->id;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getIdGuia() {
        return $this->idGuia;
    }
    
    function getPublico() {
        return $this->publico;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setIdGuia($idGuia) {
        $this->idGuia = $idGuia;
    }
    
    function setPublico($publico) {
        $this->publico = $publico;
    }

}
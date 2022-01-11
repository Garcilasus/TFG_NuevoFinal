<?php

class Personal {
    private $nombre;
    private $foto;
    private $idPersona;
    private $ocupacion;
    private $email;
    private $guia;
    
    function __construct($row) 
    {
        $this->nombre = $row['nombre'];
        $this->foto = $row['foto'];
        $this->idPersona = $row['idPersona'];
        $this->ocupacion = $row['ocupacion'];
        $this->email = $row['email'];
        $this->guia = $row['guia'];
    }
    
    function getNombre()
    {
        return $this->nombre;
    }

    function getFoto()
    {
        return $this->foto;
    }

    function getIdPersona()
    {
        return $this->idPersona;
    }

    function getOcupacion()
    {
        return $this->ocupacion;
    }
    
    function getEmail()
    {
        return $this->email;
    }

    function getGuia()
    {
        return $this->guia;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    function setFoto($foto)
    {
        $this->foto = $foto;
    }

    function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;
    }

    function setOcupacion($ocupacion)
    {
        $this->ocupacion = $ocupacion;
    }
    
    function setEmail($email)
    {
        $this->email = $email;
    }
    
    function setGuia($guia)
    {
        $this->guia = $guia;
    }
    
}

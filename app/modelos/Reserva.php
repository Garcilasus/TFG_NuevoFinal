<?php

class Reserva
{
    private $idReserva;
    private $nombre;
    private $apellidos;
    private $personas;
    private $fecha;
    private $identificador;
    private $telefono;
    private $email;
    private $asignado;
    private $impartido;
    
    function __construct($row) 
    {
        $this->idReserva = $row['idReserva'];
        $this->nombre = $row['nombre'];
        $this->apellidos = $row['apellidos'];
        $this->personas = $row['personas'];
        $this->fecha = $row['fecha'];
        $this->identificador = $row['identificador'];
        $this->telefono = $row['telefono'];
        $this->email = $row['email'];
        $this->asignado = $row['asignado'];
        $this->impartido = $row['impartido'];
    }
    
    function getIdReserva() {
        return $this->idReserva;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getPersonas() {
        return $this->personas;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getIdentificador() {
        return $this->identificador;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getEmail() {
        return $this->email;
    }

    function getAsignado() {
        return $this->asignado;
    }

    function getImpartido() {
        return $this->impartido;
    }

    function setIdReserva($idReserva) {
        $this->idReserva = $idReserva;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setPersonas($personas) {
        $this->personas = $personas;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setIdentificador($identificador) {
        $this->identificador = $identificador;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setAsignado($asignado) {
        $this->asignado = $asignado;
    }

    function setImpartido($impartido) {
        $this->impartido = $impartido;
    }


}
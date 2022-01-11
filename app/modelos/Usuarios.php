<?php

class Usuarios 
{
    private $id;
    private $usuario;
    private $password;
    private $privilegio;
    private $superUser;
    
    function __construct($row) 
    {
        $this->id = $row['id'];
        $this->usuario = $row['usuario'];
        $this->password = $row['password'];
        $this->privilegio = $row['privilegio'];
        $this->superUser = $row['superUser'];
    }
    
    function getId() {
        return $this->id;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getPassword() {
        return $this->password;
    }

    function getPrivilegio() {
        return $this->privilegio;
    }
    
     function getSuperUser() {
        return $this->superUser;
    }

    function setId($id) {
        $this->id = $id;
    }
    
    function setSuperUser($superuser)
    {
        $this->superUser = $superuser;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setPrivilegio($privilegio) {
        $this->privilegio = $privilegio;
    }


}

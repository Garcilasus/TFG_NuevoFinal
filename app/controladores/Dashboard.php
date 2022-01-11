<?php

class Dashboard extends Controlador {
    public function index()
    {
        $datos = [];
        
        $this->vista('paginas/dashboard', $datos);
    }
}


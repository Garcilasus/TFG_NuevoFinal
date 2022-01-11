<?php

class Blog extends Controlador {
    public function __construct() 
    {
//        $this->articuloModelo = $this->modelo('Articulo');
//        echo "controlador QUIENES cargado correctamente";
    }
    
    public function index()
    {
//        $articulos = $this->articuloModelo->obtenerArticulos(); //mismo nombre que clase Articulo
        $datos = [];
//                  'articulos'=> $articulos];
        
        $this->vista('paginas/blog', $datos);
    }
}


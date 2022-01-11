<?php
//primer controlador
class Index extends Controlador
{
    public function __construct() 
    {
//        $this->articuloModelo = $this->modelo('Articulo');
//        echo "controlador PAGINAS cargado correctamente";
    }
    
    public function index()
    {
//        $articulos = $this->articuloModelo->obtenerArticulos(); //mismo nombre que clase Articulo
        $datos = [];
//                  'articulos'=> $articulos];
        
        $this->vista('paginas/inicio', $datos);
    }
    

    
//    public function articulo()
//    {
////        $this->vista('paginas/articulo');
//    }
//    
//    public function actualizar($id)
//    {
//        echo $id; //localhost/freetoursantander/paginas/actualizar/jijiji mostraria jijiji
//    }
}


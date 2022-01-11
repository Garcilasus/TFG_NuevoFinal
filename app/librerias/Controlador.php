<?php

//clae controlador ppal que se encarga de poder cargar los modelos y las vistas

class Controlador 
{
    //cargar modelo
    public function modelo($modelo)
    {
        //carga
        require_once '../app/modelos/'. $modelo . '.php';
        //instanciar el modelo 
        return new $modelo();
    }
    
    public function vista($vista, $datos = [])
    {
        //comprueba si el archivo vista existe
        if (file_exists('../app/vistas/'. $vista . '.php'))
        {
            require_once '../app/vistas/'. $vista . '.php';
        }
        else
        {
            //si no existe
            die('La vista no existe');
        }
    }
}


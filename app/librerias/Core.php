<?php
/*
 * Trae o mapea la URL que se ingresa en el navegador
 * 
 * 1-controlador
 * 2-metodo
 * 3-parametro
 * 
 */
class Core 
{
    protected $controladorActual = "index";
    protected $metodoActual = "index";
    protected $parametros = [];
    
    public function __construct() 
    {
//        print_r($this->getUrl());
        $url = $this->getUrl();
        
        //busca en los controladores si el controlador existe
        if (file_exists("../app/controladores/". ucwords($url[0]).".php"))
        {
            //si existe se setea como controlador por defecto
            $this->controladorActual = ucwords($url[0]);
            
            //unset del indice
            unset($url[0]);
        }
        
        //requerir el controlador
        require_once '../app/controladores/'. $this->controladorActual . '.php';
        $this->controladorActual = new $this->controladorActual;
        
        //verificar la segunda parte de la url que seria el metodo
        
        if (isset($url[1]))
        {
            if (method_exists($this->controladorActual, $url[1])) 
            {
                $this->metodoActual = $url[1];
                unset($url[1]);
            }
        }
        //prueba que trae el metodo
//        echo $this->metodoActual;
        
        //obtener los posibles parametros
        $this->parametros = $url ? array_values($url) : [];
        
        //callback con parametros array
        call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
        
        
    }

    
    public function getUrl()
    {
        //echo $_GET['url'];
        if (isset($_GET['url']))
        {
            $url = rtrim($_GET['url'], '/'); //corta espacios hacia la derecha
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            
            return $url;
        }
    }
}

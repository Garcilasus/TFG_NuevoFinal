<?php

class Articulo
{
    private $titulo;
    private $foto;
    private $descripcion;
    private $cuerpo;
    private $idArticulo;
    private $categoria;
    private $subcategoria;
    private $fecha;
    
    function __construct($row) 
    {
        $this->titulo = $row['titulo'];
        $this->foto = $row['foto'];
        $this->descripcion = $row['descripcion'];
        $this->cuerpo = $row['cuerpo'];
        $this->idArticulo = $row['idArticulo'];
        $this->categoria = $row['categoria'];
        $this->subcategoria = $row['subcategoria'];
        $this->fecha = $row['fecha'];
    }
    
    //GETTERS
    
    function getTitulo()
    {
        return $this->titulo;
    }

    function getFoto()
    {
        return $this->foto;
    }

    function getDescripcion()
    {
        return $this->descripcion;
    }

    function getCuerpo()
    {
        return $this->cuerpo;
    }
    
    function getIdArticulo() 
    {
        return $this->idArticulo;
    }

    function getCategoria() 
    {
        return $this->categoria;
    }

    function getSubcategoria() 
    {
        return $this->subcategoria;
    }

    function getFecha() 
    {
        return $this->fecha;
    }
    
    //SETTERS
    
    function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    function setFoto($foto)
    {
        $this->foto = $foto;
    }

    function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    function setCuerpo($cuerpo)
    {
        $this->cuerpo = $cuerpo;
    }
    
    function setIdArticulo($idArticulo) 
    {
        $this->idArticulo = $idArticulo;
    }

    function setCategoria($categoria) 
    {
        $this->categoria = $categoria;
    }

    function setSubcategoria($subcategoria) 
    {
        $this->subcategoria = $subcategoria;
    }

    function setFecha($fecha) 
    {
        $this->fecha = $fecha;
    }


    
}


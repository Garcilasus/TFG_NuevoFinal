<?php

try
{
    
    error_reporting(0);
    define("DB_OPTIONS", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    $conexion = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NOMBRE , DB_USER, DB_PASSWORD,  DB_OPTIONS);
//    $conexion = new PDO("mysql:host=localhost;dbname=freetoursantander", "ftsantander", "JgyIG27gH86IplQU",  DB_OPTIONS);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex)
{
    echo $ex->getCode()."<br>";
    $mensaje = $ex->getMessage();
    echo "<script>console.log('$mensaje');</script>";
    echo "Error en la conexión: ". $mensaje . "<br>".DB_PASSWORD."<br>";
    exit();
}
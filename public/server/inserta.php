<?php

//require("../../app/librerias/conexion.php");

header('Access-Control-Allow-Origin: *');

$con = mysqli_connect('localhost', 'ftsantander', 'JgyIG27gH86IplQU', 'freetoursantander');
$con->set_charset("utf8mb4");

$idContacto = $_POST['idContacto'];
$nombre= $_POST['nombre'];
$asunto = $_POST['asunto'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];
$fecha = $_POST['fecha'];

if (empty($asunto))
{
    $asunto = "Sin asunto";
}
else
{
    $asunto = $_POST['asunto'];
}

$consulta = "INSERT INTO contacto (idContacto,nombre,asunto,correo,mensaje,fecha) VALUES ('" .$idContacto. "','" .$nombre. "','" .$asunto. "','" .$correo. "'," .$mensaje. ",'" .$fecha. "')";

//ENVIAR CORREO

use PHPMailer\PHPMailer\PHPMailer;

require_once './phpmailer/src/PHPMailer.php';
require_once './phpmailer/src/SMTP.php';
require_once './phpmailer/src/Exception.php';

$email = new PHPMailer();

$email->isSMTP();
$email->Host = "smtp.gmail.com";
$email->SMTPAuth = true;
$email->Username = "santanderfreetour@gmail.com";
$email->Password = "15#Asir1";
$email->Port = 465;
$email->SMTPSecure = "ssl";

//opciones de email

$email->isHTML(true);
$email->setFrom($correo, "Contacto de ".$nombre);
$email->addAddress("santanderfreetour@gmail.com");
$email->Subject = ("$correo ($asunto)");
$email->Body = $mensaje;

if ($email->send())
{
    $status = "success";
    $response = "Email enviado";
}
else
{
    $status = "Fallo";
    $response = "Algo está ocurriendo: ".$email->ErrorInfo;
}

$miArray = array("Consulta" => mysqli_query($con, $consulta), "status" => $status, "Respuesta" => $response);
exit(json_encode($miArray));

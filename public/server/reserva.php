<?php

header('Access-Control-Allow-Origin: *');

$con = mysqli_connect('localhost', 'ftsantander', 'JgyIG27gH86IplQU', 'freetoursantander');
$con->set_charset("utf8mb4");

$consulta = $con->prepare("INSERT INTO reservas (nombre,apellidos,personas,fecha,identificador,telefono,email) VALUES (?,?,?,?,?,?,?)");
$consulta->bind_param("ssissis", $nombre, $apellidos, $personas, $fecha, $identificador, $telefono, $email);

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$personas = $_POST['personas']; 
$fecha = $_POST['fecha'];
$identificador = date("dmYHis"). substr($nombre, 0,1). substr($apellidos,0, 1).$personas;
$telefono = explode("'", $_POST['telefono'])[1];
$email = $_POST['email'];


//ENVIAR CORREO
$fechaCorreo = implode("/",array_reverse(explode("-",$fecha)));

use PHPMailer\PHPMailer\PHPMailer;

require_once './phpmailer/src/PHPMailer.php';
require_once './phpmailer/src/SMTP.php';
require_once './phpmailer/src/Exception.php';

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "santanderfreetour@gmail.com";
$mail->Password = "15#Asir1";
$mail->Port = 465;
$mail->SMTPSecure = "ssl";

//opciones de email

$mail->isHTML(true);
$mail->setFrom("santanderfreetour@gmail.com", "Reserva Free Tour Santander");
$mail->addAddress($email);
$mail->Subject = ("Detalles de tu reserva");
$mail->Body = "<p>Estimad@ $nombre,</p>"
        . "<p>Su reserva se ha realizado con éxito. No olvides llevar calzado cómodo para el día indicado!</p>"
        . "<p>Detalles de tu reserva:</p>"
        . "<ul>"
        . "<li>Dia: ". $fechaCorreo ." a las 11:00 AM</li>"
        . "<li>Lugar: Plaza del Ayuntamiento <a href='https://goo.gl/maps/uv56p7WeSjXtBtML7' target='_blank'>¿cómo llegar?</a>"
        . "<li>Nombre: ".$nombre."</li>"
        . "<li>Apellidos: ".$apellidos."</li>"
        . "<li>Id de tu reserva: ".$identificador."</li>"
        . "<li>Asistentes totales: ". $personas."</li>"
        ."</ul>"
        ."<p>Si no pudiera acudir al paseo, agradeceríamos que cancelase su visita <a href='http://www.aglinformatica.es/danielg/reservas#cancelarLaReserva' target='_blank'>aquí</a>.</p>"
        ."<p>Gracias por depositar tu confianza en nosotros, nos vemos pronto!</p><br><br>"
        ."<p>El equipo de Free Tour Santander.</p>";

if ($mail->send())
{
    $status = "success";
    $response = "Email enviado";
}
else
{
    $status = "Fallo";
    $response = "Algo está ocurriendo: ".$mail->ErrorInfo;
}


$miArray = array("Consulta" => $consulta->execute(), "Status" => $status, "Respuesta" => $response);

exit(json_encode($miArray));

$con->close();

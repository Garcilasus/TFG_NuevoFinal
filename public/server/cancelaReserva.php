<?php

header('Access-Control-Allow-Origin: *');

$con = mysqli_connect('localhost', 'ftsantander', 'JgyIG27gH86IplQU', 'freetoursantander');
$con->set_charset("utf8mb4");

$consulta = $con->prepare("SELECT COUNT(idReserva) FROM reservas WHERE email=? AND identificador=?");
$consulta->bind_param("ss", $direccion, $id);

$direccion = strtolower($_POST['direccion']);
$id = strtoupper($_POST['identificador']);

$consulta->execute();
$resultado = $consulta->get_result();
$fila = $resultado->fetch_assoc();

//echo $fila["COUNT(idReserva)"];
use PHPMailer\PHPMailer\PHPMailer;

if ($fila["COUNT(idReserva)"] == 1)
{
    $comprobacion = true;
    $consulta2 = $con->prepare("DELETE FROM reservas WHERE email = ? AND identificador = ?");
    $consulta2->bind_param("ss", $direccion, $id);
    
    if ($consulta2->execute())
    {
        $borrado = true;
        
        //EMAIL
        
        require_once './phpmailer/src/PHPMailer.php';
        require_once './phpmailer/src/SMTP.php';
        require_once './phpmailer/src/Exception.php';
        
        $email = new PHPMailer();
        $email->isSMTP();
        $email->Host = "smtp.gmail.com";
        $email->SMTPAuth = true;
        $email->Username = "santanderfreetour@gmail.com";
        $email->Password = "@Password00";
        $email->Port = 465;
        $email->SMTPSecure = "ssl";
        $email->CharSet ="UTF-8";
        
        //OPCIONES
        
        $email->isHTML(true);
        $email->setFrom("santanderfreetour@gmail.com", "Cancelación Free Tour Santander");
        $email->addAddress($direccion);
        $email->Subject = ("Reserva cancelada");
        $email->Body = "<p>Hola,</p>"
                . "<p>Su reserva con el código $id ha sido cancelada con éxito. Agradecemos que te hayas tomado la molestia para avisarnos de que finalmente no puedes acudir.</p>"
                . "<p>Esperamos poder mostraros Santander en otro momento en el que se adapte mejor a vosotros.</p>"
                . "<p>Agradeciendo la confianza depositada, les mandamos los mejores deseos. 😊</p>"
                . "<br>"
                . "<p>Atentamente: el equipo de Free Tour Santander</p>";

        if ($email->send())
        {
            $status = "Success";
            $response = "Email enviado";
        }
        else
        {
            $status = "Fallo";
            $response = "Algo está ocurriendo: ".$email->ErrorInfo;
        }
        
    }
    else
    {
        $status = false;
        $response = false;
        $borrado = "Desastre";
    }
}
else
{
    $comprobacion = false;
    $borrado = false;
    $status = false;
    $response = false;
}

$miArray = array("Comprobacion" => $comprobacion, "Borrado" => $borrado, "Status" => $status, "Respuesta" => $response);
exit(json_encode($miArray));

$con->close();
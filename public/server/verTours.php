<?php

header('Access-Control-Allow-Origin: *');

//$con = mysqli_connect('localhost', 'danielg', 'dg_836', '2020p_danielg');
$con = mysqli_connect('localhost', 'ftsantander', 'JgyIG27gH86IplQU', 'freetoursantander');
$con->set_charset("utf8mb4");

$consulta = $con->prepare("SELECT nombre,apellidos,personas,telefono,email FROM reservas WHERE fecha=? AND asignado=? AND impartido=?");
$consulta->bind_param("sii", $fechuca, $asignado, $impartido);

$fechuca = $_POST['fechuca'];
$asignado = 1;
$impartido = $_POST['impartido'];
//echo "<script>alert('SELECT * FROM reservas WHERE fecha=$fechuca');</script>";
$consulta->execute();
$resultado = $consulta->get_result();
$fila = $resultado->fetch_all();

exit(json_encode($fila));

$con->close();
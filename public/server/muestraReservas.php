<?php

header('Access-Control-Allow-Origin: *');

//$con = mysqli_connect('localhost', 'danielg', 'dg_836', '2020p_danielg');
$con = mysqli_connect('localhost', 'ftsantander', 'JgyIG27gH86IplQU', 'freetoursantander');
$con->set_charset("utf8mb4");

$consulta = $con->prepare("SELECT idReserva, nombre, apellidos, personas, fecha, telefono FROM reservas WHERE fecha=? AND asignado=?");
$consulta->bind_param("si", $fechuca, $asignado);

$fechuca = $_POST['fechuca'];
$asignado = 0;
//echo "<script>alert('SELECT * FROM reservas WHERE fecha=$fechuca');</script>";
$consulta->execute();
$resultado = $consulta->get_result();
$fila = $resultado->fetch_all();

exit(json_encode($fila));

$con->close();
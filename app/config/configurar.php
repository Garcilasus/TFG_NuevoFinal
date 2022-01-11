<?php

//conexion a bd
/*
 * Ruta de la aplicacion 
 */
//configuracion de acceso a datos en la base de datos

define('DB_HOST', 'localhost');
define('DB_USER', 'ftsantander');
define('DB_PASSWORD', 'JgyIG27gH86IplQU');
define('DB_NOMBRE', 'freetoursantander');

//echo dirname(dirname(__FILE__));

define('RUTA_APP', dirname(dirname(__FILE__)));
//echo RUTA_APP;

//ruta URL ejemplo: http://localhost/freetoursantander/

define('RUTA_URL', 'http://localhost/FreeTourSantander');
define('NOMBRESITIO', 'Free Tour Santander');
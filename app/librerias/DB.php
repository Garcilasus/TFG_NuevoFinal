<?php

//require_once "../app/modelos/Parking.php";
require_once RUTA_APP."/modelos/Parking.php";
require_once RUTA_APP.'/modelos/Personal.php';
require_once RUTA_APP.'/modelos/Articulo.php';
require_once RUTA_APP.'/modelos/Usuarios.php';
require_once RUTA_APP.'/modelos/Reserva.php';
//require_once RUTA_APP.'/modelos/Contactar.php';
//clase para conectarse a la BD usando PDO
class DB 
{
    function ejecutaConsulta($sql)
    {
        require "conexion.php";
        $resultado = null;

        if (isset($conexion))
        {
            $resultado = $conexion->query($sql);
        }
        return $resultado;
    }

    /*
    *Funciones clase PARKING
    */

    public static function obtenerParkings()
    {
        $sql = "SELECT * FROM parking";
        $resultado = self::ejecutaConsulta($sql);

        $arrayParkings = array();

        while ($row = $resultado->fetch())
        {
            $parking = new Parking($row);
            array_push($arrayParkings, $parking);
        }

        return $arrayParkings;
    }
    
    public static function insertaParking($nombre, $enlace, $tipo)
     {
         require 'conexion.php';
         
         try
         {
             $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $consulta = $conexion->prepare('INSERT INTO parking (nombre, enlace, tipo) VALUES (:nombre, :enlace, :tipo)');
             $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);
             $consulta->bindParam(':enlace', $enlace, PDO::PARAM_STR);
             $consulta->bindParam(':tipo', $tipo, PDO::PARAM_INT);
             $consulta->execute();
             
             if ($consulta) //si se ejecuto correctamente
             {
//                 echo "Resultado satisfactorio INSERT!";
                 return true;
             }
         } 
         catch (Exception $ex) 
         {
             echo "Un error inesperado ha ocurrido: ".$ex->getMessage();
             $conexion->rollBack();
             return false;
         }
     }
    
    public static function actualizaParking($identificador, $nombre, $enlace, $tipo)
    {
        require 'conexion.php';
         try
         {
             $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
             $consulta = $conexion->prepare('UPDATE parking SET nombre=:nombre, enlace=:enlace, tipo=:tipo WHERE idParking=:idParking');
             $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);
             $consulta->bindParam(':enlace', $enlace, PDO::PARAM_STR);
             $consulta->bindParam(':tipo', $tipo, PDO::PARAM_INT);
             $consulta->bindParam(':idParking', $identificador, PDO::PARAM_INT);
             $consulta->execute();
             
             if ($consulta)
             {
                 return true;
             }
         } 
         catch (Exception $ex) 
         {
//             echo "Un error inesperado ha ocurrido: ".$ex->getMessage();
             $conexion->rollBack();
             return false;
         }
    }
    
    public static function eliminaParking($identificador)
    {
        require 'conexion.php';
         try
         {
             $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
             $consulta = $conexion->prepare('DELETE FROM parking WHERE idParking = :identificador');
             
             foreach ($identificador as $iden)
             {
                 $consulta->bindParam(':identificador', $iden, PDO::PARAM_INT);
                 $consulta->execute();
             }
             
             
             if ($consulta)
             {
                 return true;
             }
         } 
         catch (Exception $ex) 
         {
//             echo "Un error inesperado ha ocurrido: ".$ex->getMessage();
             $conexion->rollBack();
             return false;
         }
    }
    
    /*
     * Funciones clase PERSONAL (nosotros)
     */
    
    public static function obtenerPersonal()
    {
        $sql = "SELECT * FROM nosotros";
        $resultado = self::ejecutaConsulta($sql);
        
        $arrayPersonal = array();
        
        while ($row = $resultado->fetch())
        {
            $nosotros = new Personal($row);
            array_push($arrayPersonal, $nosotros);
        }
        
        return $arrayPersonal;
    }
    
    public static function obtenerGuias()
    {
        $sql = "SELECT * FROM nosotros WHERE guia=1";
        $resultado = self::ejecutaConsulta($sql);
        
        $arrayPersonal = array();
        
        while ($row = $resultado->fetch())
        {
            $nosotros = new Personal($row);
            array_push($arrayPersonal, $nosotros);
        }
        
        return $arrayPersonal;
    }
    
    public static function obtenerPersonaPorId($id)
    {
        require 'conexion.php';
        
        try
        {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = $conexion->prepare('SELECT * FROM nosotros WHERE idPersona=:idPersona');
            $consulta->bindParam(':idPersona', $id, PDO::PARAM_INT);
            $consulta->execute();
            
            $arrayPersona = array();
            
            while ($row = $consulta->fetch())
            {
                $persona = new Personal($row);
                array_push($arrayPersona, $persona);
            }
            
            return $arrayPersona;
        } 
        catch (Exception $ex) 
        {
            $mensaje = "Un error inesperado ha ocurrido: ".$ex->getMessage();
            return $mensaje;
        }
    }
    
    public static function eliminaPersonalPorId($arrayId)
    {
        require 'conexion.php';
        
        try
        {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = $conexion->prepare('DELETE FROM nosotros WHERE idPersona = :id');
            foreach ($arrayId as $id)
            {
                $consulta->bindParam(':id', $id, PDO::PARAM_INT);
                $consulta->execute();
            }
            
            
            if ($consulta)
            {
                return true;
            }
        } 
        catch (Exception $ex) 
        {
            $conexion->rollBack();
            return false;
        }
    }
    
    public static function cambiaGuiaNoGuia($id, $opcion)
    {
        require 'conexion.php';
        
         try
         {
             $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
             $consulta = $conexion->prepare('UPDATE nosotros SET guia=:guia WHERE idPersona=:id');
             $consulta->bindParam(':id', $id, PDO::PARAM_INT);
             $consulta->bindParam(':guia', $opcion, PDO::PARAM_INT);
             $consulta->execute();
             
             if ($consulta)
             {
                 return true;
             }
         } 
         catch (Exception $ex) 
         {
             echo "Un error inesperado ha ocurrido: ".$ex->getMessage();
             $conexion->rollBack();
             return false;
         }
    }
    
    public static function insertaNuevoPersonalConFoto($nombre, $ocupacion, $email, $guia, $nombreFoto)
    {
        require 'conexion.php';
        
         try
         {
             $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $consulta = $conexion->prepare('INSERT INTO nosotros (nombre, foto, ocupacion, email, guia) VALUES (:nombre, :foto, :ocupacion, :email, :guia)');
             $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);
             $consulta->bindParam(':foto', $nombreFoto, PDO::PARAM_STR);
             $consulta->bindParam(':ocupacion', $ocupacion, PDO::PARAM_STR);
             $consulta->bindParam(':email', $email, PDO::PARAM_STR);
             $consulta->bindParam(':guia', $guia, PDO::PARAM_INT);
             $consulta->execute();
             
             
             $carpetaTemporal = $_SERVER['DOCUMENT_ROOT']."/FreeTourSantander/public/img/tmp";
             $carpetaDestino = $_SERVER['DOCUMENT_ROOT']."/FreeTourSantander/public/img/";
//             $_FILES['fotoMiembro']['tmp_name'] = $_SERVER['DOCUMENT_ROOT']."/FreeTourSantander/public/img/tmp";
//             if ($consulta && move_uploaded_file($carpetaTemporal, $carpetaDestino."/".$nombreFoto)) //si se ejecuto correctamente
             if ($consulta && move_uploaded_file($_FILES['fotoMiembro']['tmp_name'], $carpetaDestino.$nombreFoto))
             {
                return true;
             }
         } 
         catch (Exception $ex) 
         {
             echo "Un error inesperado ha ocurrido: ".$ex->getMessage();
             $conexion->rollBack();
             return false;
         }
    }
    
    /*
     * Funciones clase ARTICULO
     */
    
    public static function obtenerArticulos($iniciar, $nArticulos)     
    {
        $sql = "SELECT * FROM articulo LIMIT $iniciar,$nArticulos";
        
        $resultado = self::ejecutaConsulta($sql);
        
        $arrayArticulos = array();
        
        while ($row = $resultado->fetch())
        {
            $articulos = new Articulo($row);
            array_push($arrayArticulos, $articulos);
        }
        
        return $arrayArticulos;
    }
    
    public static function cuentaArticulos()
    {
        $sql = "SELECT COUNT(idArticulo) FROM articulo";
        $resultado = self::ejecutaConsulta($sql)->fetch();
//        print_r($resultado);
        return intval($resultado[0]);
    }
    
    public static function obtenerDosUltimosArticulos()
    {
        $artsTotal = self::cuentaArticulos()-2;
        
        $sql = "SELECT * FROM articulo LIMIT $artsTotal,2";
        $resultado = self::ejecutaConsulta($sql);
        
        $arrayUltimos = array();
        
        while ($row = $resultado->fetch())
        {
            $articulos = new Articulo($row);
            array_push($arrayUltimos, $articulos);
        }
        
        return $arrayUltimos;
    }
    
    /*
     * Funciones clase USUARIOS
     */
    
    public static function obtenUsuarios()
    {
         $sql = "SELECT * FROM usuarios";
        $resultado = self::ejecutaConsulta($sql);
        
        $arrayUsuarios = array();
        
        while ($row = $resultado->fetch())
        {
            $usuarios = new Usuarios($row);
            array_push($arrayUsuarios, $usuarios);
        }
        
        return $arrayUsuarios;
    }
    
    public static function obtenContrasena($usuario)
    {
        $sql = "SELECT password FROM usuarios WHERE usuario='$usuario'";
        $contrasena = self::ejecutaConsulta($sql)->fetch();
        return $contrasena[0];
    }
    
    public static function obtenPrivilegio($usuario)
    {
        $sql = "SELECT privilegio FROM usuarios WHERE usuario='$usuario'";
        $privilegio = self::ejecutaConsulta($sql)->fetch();
        return $privilegio[0];
    }
    
    public static function obtenSuperUser($usuario)
    {
        $sql = "SELECT superUser FROM usuarios WHERE usuario='$usuario'";
        $superUser = self::ejecutaConsulta($sql)->fetch();
        return $superUser[0];
    }
    
    public static function actualizaContrasena($usuario, $contrasena)
    {
        require 'conexion.php';
        $opciones = Array('cost' => 11);
         try
         {
             $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
             $consulta = $conexion->prepare('UPDATE usuarios SET password=:contrasena WHERE usuario=:usuario');
             $consulta->bindParam(':usuario', $usuario, PDO::PARAM_STR);
             $consulta->bindParam(':contrasena', password_hash($contrasena, PASSWORD_DEFAULT, $opciones), PDO::PARAM_STR);
             $consulta->execute();
             
             if ($consulta)
             {
                 return true;
             }
         } 
         catch (Exception $ex) 
         {
//             echo "Un error inesperado ha ocurrido: ".$ex->getMessage();
             $conexion->rollBack();
             return false;
         }
    }
    
    public static function actualizaContrasenaPorId($identificador, $contrasena)
    {
        require 'conexion.php';
        $opciones = Array('cost' => 11);
         try
         {
             $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
             $consulta = $conexion->prepare('UPDATE usuarios SET password=:contrasena WHERE id=:id');
             $consulta->bindParam(':id', $identificador, PDO::PARAM_INT);
             $consulta->bindParam(':contrasena', password_hash($contrasena, PASSWORD_DEFAULT, $opciones), PDO::PARAM_STR);
             $consulta->execute();
             
             if ($consulta)
             {
                 return true;
             }
         } 
         catch (Exception $ex) 
         {
             echo "Un error inesperado ha ocurrido: ".$ex->getMessage();
             $conexion->rollBack();
             return false;
         }
    }
    
    public static function eliminaUsuarios($identificador)
    {
        require 'conexion.php';
         try
         {
             $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
             $consulta = $conexion->prepare('DELETE FROM usuarios WHERE id = :identificador');
             
             foreach ($identificador as $iden)
             {
                 if ($iden > 1)
                 {
                 $consulta->bindParam(':identificador', $iden, PDO::PARAM_INT);
                 $consulta->execute();
                 }
             }
             
             
             if ($consulta)
             {
                 return true;
             }
         } 
         catch (Exception $ex) 
         {
//             echo "Un error inesperado ha ocurrido: ".$ex->getMessage();
             $conexion->rollBack();
             return false;
         }
    }
    
    public static function insertaUsuario($usuario, $password, $privilegio)
    {
        require 'conexion.php';
        $opciones = Array('cost' => 11); 
         try
         {
             $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $consulta = $conexion->prepare('INSERT INTO usuarios (usuario, password, privilegio) VALUES (:usuario, :password, :privilegio)');
             $consulta->bindParam(':usuario', $usuario, PDO::PARAM_STR);
             $consulta->bindParam(':password', password_hash($password, PASSWORD_DEFAULT, $opciones), PDO::PARAM_STR);
             $consulta->bindParam(':privilegio', $privilegio, PDO::PARAM_STR);
             $consulta->execute();
             
             if ($consulta) //si se ejecuto correctamente
             {
//                 echo "Resultado satisfactorio INSERT!";
                 return true;
             }
         } 
         catch (Exception $ex) 
         {
             echo "Un error inesperado ha ocurrido: ".$ex->getMessage();
             $conexion->rollBack();
             return false;
         }
    }
    
    
    /*
     * Funciones de la clase RESERVA (reservas)
     */
    
    public static function eliminaReservasSinAsignar($identificador)
    {
        require 'conexion.php';
         try
         {
             $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
             $consulta = $conexion->prepare('DELETE FROM reservas WHERE idReserva = :identificador');
             
             foreach ($identificador as $iden)
             {
                 $consulta->bindParam(':identificador', $iden, PDO::PARAM_INT);
                 $consulta->execute();
             }
             
             
             if ($consulta)
             {
                 return true;
             }
         } 
         catch (Exception $ex) 
         {
//             echo "Un error inesperado ha ocurrido: ".$ex->getMessage();
             $conexion->rollBack();
             return false;
         }
    }
    
    public static function agregaReservaAlGuia($idReserva, $impartido, $fecha)
    {
        $asignado = 1;
        require 'conexion.php';
        try
        {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta1 = $conexion->prepare('UPDATE reservas SET asignado = :asignado, impartido = :impartido WHERE idReserva = :idReserva');
            
            $consulta1->bindParam(':asignado', $asignado, PDO::PARAM_INT);
            $consulta1->bindParam(':impartido', $impartido, PDO::PARAM_INT);
            
            foreach ($idReserva as $id)
            {
                $consulta1->bindParam(':idReserva', $id, PDO::PARAM_INT);
                $consulta1->execute();
            }
            
            $consulta2 = $conexion->prepare('INSERT INTO asignacion (fecha, idGuia, publico) VALUES (:fecha, :idGuia, :publico)');
            $consulta2->bindParam(':fecha', $fecha, PDO::PARAM_STR);
            $consulta2->bindParam(':idGuia', $impartido, PDO::PARAM_INT);
            $consulta2->bindParam(':publico', self::cuentaPublico($idReserva), PDO::PARAM_INT);
            
            
            $consulta2->execute();
            
            if ($consulta1 && $consulta2)
            {
                return true;
            }
        } 
        catch (Exception $ex) 
        {
            echo "Un error inesperado ha ocurrido: ".$ex->getMessage();
            $conexion->rollBack();
            return false;
        }
    }
    
    public static function cuentaPublico($combo)
    {
        $acum = 0;
        $arrayPersonas = array();
        foreach ($combo as $key)
        {
            $sql = "SELECT personas FROM reservas WHERE idReserva=$key";
            $resultado = self::ejecutaConsulta($sql);
            $var = $resultado->fetch();
            array_push($arrayPersonas, $var);
        }
        foreach ($arrayPersonas as $clave => $valor)
        {
            $acum += $valor[0];
        }
        
        return $acum;
    }
    
    public static function obtenerReservasFechaIdGuia($impartido, $fecha)
    {
        require 'conexion.php';
        
        try
        {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = $conexion->prepare('SELECT * FROM reservas WHERE impartido=:impartido AND fecha=:fecha');
            $consulta->bindParam(':impartido', $impartido, PDO::PARAM_INT);
            $consulta->bindParam(':fecha', $fecha, PDO::PARAM_STR);
            $consulta->execute();
            
            $arrayReservas = array();
            
            while ($row = $consulta->fetch())
            {
                $reservas = new Reserva($row);
                array_push($arrayReservas, $reservas);
            }
            
            return $arrayReservas;
        } 
        catch (Exception $ex) 
        {
            $mensaje = "Un error inesperado ha ocurrido: ".$ex->getMessage();
            return $mensaje;
        }
    }
    
    public static function eliminaTourAsignadoAlGuia($identificador, $fecha)
    {
        require 'conexion.php';
        
        $asignado = 0;
        $impartido2 = null;
        
        try
        {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            $consulta = $conexion->prepare('DELETE FROM asignacion WHERE idGuia = :identificador AND fecha = :fecha');
             
            
            $consulta->bindParam(':identificador', $identificador, PDO::PARAM_INT);
            $consulta->bindParam(':fecha', $fecha, PDO::PARAM_STR);
            
            $consulta->execute();
            
            $consulta2 = $conexion->prepare('UPDATE reservas SET asignado = :asignado, impartido = :impartido2 WHERE fecha = :fecha AND impartido = :impartido');
            $consulta2->bindParam(':asignado', $asignado, PDO::PARAM_INT);
            $consulta2->bindParam(':impartido2', $impartido2, PDO::PARAM_NULL);
            $consulta2->bindParam(':fecha', $fecha, PDO::PARAM_STR);
            $consulta2->bindParam(':impartido', $identificador, PDO::PARAM_INT);
            
            $consulta2->execute();
             
             
            if ($consulta && $consulta2)
            {
                return true;
            }
        } 
        catch (Exception $ex) 
        {
//             echo "Un error inesperado ha ocurrido: ".$ex->getMessage();
            $conexion->rollBack();
            return false;
        }
    }
        
}

//print_r(DB::obtenerReservasFechaIdGuia(3, "2021-01-30"));
//print_r(DB::obtenerPersonaPorId(3));

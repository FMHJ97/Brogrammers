<?php

require_once '../model/usuario.php';
require_once '../controller/conexion.php';

class UserController
{

    public static function insertar($usuario)
    {
        try {
            $conex = new Conexion();
            $conex->beginTransaction();
            $pass = password_hash($usuario->clave, PASSWORD_DEFAULT);
            $result = $conex->prepare("insert into usuario (clave,nombre,apellido1,apellido2,correo_electronico,fecha_nac,pais,codigo_postal,telefono,img_perfil,rol,newsletter) values (?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $result->bindParam(2,$pass);
            $result->bindParam(3,$usuario->nombre);
            $result->bindParam(4,$usuario->apellido1);
            if ($usuario->apellido2 !=null) {
                $result->bindParam(5,$usuario->apellido2);
            } else $result->bindParam(5,"");    
            $result->bindParam(6,$usuario->correo);
            $result->bindParam(7,$usuario->fecha_nac);
            $result->bindParam(8,$usuario->pais);
            $result->bindParam(9,$usuario->codigo_postal);
            $result->bindParam(10,$usuario->telefono);
            $result->bindParam(11,$usuario->img_perfil);
            $result->bindParam(12,$usuario->rol);
            $result->bindParam(13,$usuario->newsletter);
            $result->execute();
            if ($result->rowCount()) {
                $conex->commit();
                return true;
            } else {
                return false;
            }

        } catch (Exception $ex) {
            echo "you fucked up<br>";
            die("ERROR en la BD" . $ex->getMessage());
        }
    }

    public static function find($value)
    {
        try {
            $conex = new Conexion();

            $result = $conex->query("select * from usuario where username = '$value'");
            if ($result->rowCount()) {
                $fila = $result->fetch();
                $user = new Usuario($fila->id, $fila->clave, $fila->nombre, $fila->apellido1, $fila->apellido2, $fila->correo_electronico, $fila->fecha_nac, $fila->pais, $fila->codigo_postal, $fila->telefono, $fila->img_perfil, $fila->rol,$fila->newsletter);
            } else {
                $user = false;
            }

            return $user;
        } catch (Exception $ex) {
            die("ERROR en la BD" . $ex->getMessage());
        }
    }

    public static function validate($user, $pass)
    {
        if (password_verify($pass, $user->password)) {
            return true;
        } else {
            return false;
        }
    }
}

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
            $result = $conex->prepare("insert into usuario (clave,nombre,apellido1,apellido2,correo_electronico,fecha_nac,pais,codigo_postal,telefono,img_perfil,rol) values (?,?,?,?,?,?,?,?,?,?,?,?)");
            $result->bindParam(1,$pass);
            $result->bindParam(2,$usuario->nombre);
            $result->bindParam(3,$usuario->apellido1);
            if ($usuario->apellido2 !=null) {
                $result->bindParam(4,$usuario->apellido2);
            } else $result->bindParam(4,"");    
            $result->bindParam(5,$usuario->correo);
            $result->bindParam(6,$usuario->fecha_nac);
            $result->bindParam(7,$usuario->pais);
            $result->bindParam(8,$usuario->codigo_postal);
            $result->bindParam(9,$usuario->telefono);
            $result->bindParam(10,$usuario->img_perfil);
            $result->bindParam(11,$usuario->rol);
            $result->execute();
            if ($result->rowCount()) {
                $conex->commit();
                return true;
            } else {
                return false;
            }

        } catch (Exception $ex) {
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
                $user = new Usuario($fila->id, $fila->clave, $fila->nombre, $fila->apellido1, $fila->apellido2, $fila->correo_electronico, $fila->fecha_nac, $fila->pais, $fila->codigo_postal, $fila->telefono, $fila->img_perfil, $fila->rol);
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

    public static function getAll() {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from usuario");
            if ($result->rowCount()) {
                while ($fila = $result->fetch()) {
                    $users[] = new Usuario($fila->id, $fila->clave, $fila->nombre, $fila->apellido1, $fila->apellido2, $fila->correo_electronico, $fila->fecha_nac, $fila->pais, $fila->codigo_postal, $fila->telefono, $fila->img_perfil, $fila->rol);
                }
            } else {
                $users = false;
            }
            return $users;
        } catch (Exception $ex) {
            die("ERROR en la BD" . $ex->getMessage());
        }
    }
}

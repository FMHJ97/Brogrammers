<?php

require_once '../framework-php-bootstrap/model/usuario.php';
require_once '../framework-php-bootstrap/controller/conexion.php';

class UserController
{

    public static function insertar($usuario)
    {
        try {
            error_log("Test log entry!", 0); 
            $conex = new Conexion();
            $conex->beginTransaction();
            $pass = password_hash($usuario->clave, PASSWORD_DEFAULT);
            $result = $conex->prepare("insert into usuario (nombre,apellido1,apellido2,correo_electronico,clave,fecha_nac,pais,codigo_postal,telefono,img_perfil,rol) values (?,?,?,?,?,?,?,?,?,?,?)");
            
            $result->bindParam(1,$usuario->nombre);
            $result->bindParam(2,$usuario->apellido1);
            if ($usuario->apellido2 !=null) {
                $result->bindParam(3,$usuario->apellido2);
            } else $result->bindParam(3,"");    
            $result->bindParam(4,$usuario->correo);
            $result->bindParam(5,$pass);
            $result->bindParam(6,$usuario->fecha_nac);
            $result->bindParam(7,$usuario->pais);
            $result->bindParam(8,$usuario->codigo_postal);
            $result->bindParam(9,$usuario->telefono);
            $result->bindParam(10,$usuario->img_perfil);
            $result->bindParam(11,$usuario->rol);
            $result->execute();
            if ($result->rowCount()) {
                $conex->commit();
                $usuario->id=$conex->lastInsertId();
                return $usuario;
            } else {
                $conex->rollBack();
                throw new Exception("Failed to insert the user into the database.");

                return null;
            }

        } catch (Exception $ex) {
            error_log("Database Error: " . $ex->getMessage());
            $conex->rollBack();

            die("ERROR en la BD" . $ex->getMessage());
        }
    }

    public static function find($value)
    {
        try {
            $conex = new Conexion();

            $result = $conex->query("select * from usuario where correo_electronico = '$value'");
            if ($result->rowCount()) {
                $fila = $result->fetchObject();
                $user = new Usuario($fila->id, $fila->nombre, $fila->apellido1, $fila->apellido2, $fila->correo_electronico, $fila->clave, $fila->fecha_nac, $fila->pais, $fila->codigo_postal, $fila->telefono, $fila->img_perfil, $fila->rol);
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
        if (password_verify($pass, $user->clave)) {
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
                while ($fila = $result->fetchObject()) {
                    $users[] = new Usuario($fila->id, $fila->nombre, $fila->apellido1, $fila->apellido2, $fila->correo_electronico, $fila->clave, $fila->fecha_nac, $fila->pais, $fila->codigo_postal, $fila->telefono, $fila->img_perfil, $fila->rol);
                }
            } else {
                $users = false;
            }
            return $users;
        } catch (Exception $ex) {
            die("ERROR en la BD" . $ex->getMessage());
        }
    }

    public static function delete($id) {
        try {
            $conex = new Conexion();
            $result = $conex->query("delete from usuario where id='$id'");
            if ($result->rowCount()) {
                return true;
            } else
                return false;
        } catch (Exception $ex) {
            die("ERROR en la BD" . $ex->getLine());
        }
    
    }

    public static function modify($id, ){
        
    }
}
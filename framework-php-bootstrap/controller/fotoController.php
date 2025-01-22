<?php

require_once '../model/foto.php';
require_once '../controller/conexion.php';

class UserController
{

    public static function insertar($foto)
    {
        try {
            $conex = new Conexion();
            $conex->beginTransaction();
            $result = $conex->prepare("insert into foto_galeria (id_usuario,foto,fecha_subida) values (?,?,?)");
            $result->bindParam(1,$foto->id_usuario);
            $result->bindParam(2,$foto->img);
            $result->bindParam(3,$foto->fecha_subida);
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

            $result = $conex->query("select * from foto_galeria where id = '$value'");
            if ($result->rowCount()) {
                $fila = $result->fetch();
                $foto = new Foto($fila->id, $fila->id_usuario, $fila->foto, $fila->fecha_subida);
            } else {
                $foto = false;
            }

            return $foto;
        } catch (Exception $ex) {
            die("ERROR en la BD" . $ex->getMessage());
        }
    }

    public static function getAll() {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from foto_galeria");
            if ($result->rowCount()) {
                while ($fila = $result->fetch()) {
                    $fotos[] = new Foto($fila->id, $fila->id_usuario, $fila->foto, $fila->fecha_subida);
                }
            } else {
                $fotos = false;
            }
            return $fotos;
        } catch (Exception $ex) {
            die("ERROR en la BD" . $ex->getMessage());
        }
    }


}

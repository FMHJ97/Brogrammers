<?php

require_once '../model/producto.php';
require_once '../controller/conexion.php';

class ProductoController
{

    public static function insertar($producto)
    {
        try {
            $conex = new Conexion();
            $conex->beginTransaction();
            $result = $conex->prepare("insert into producto (nombre,descripcion,detalles,precio) values (?,?,?,?)");
            $result->bindParam(1,$producto->nombre);
            $result->bindParam(2,$producto->descripcion);
            $result->bindParam(3,$producto->detalles);
            $result->bindParam(4,$producto->precio);
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

            $result = $conex->query("select * from productos where id = '$value'");
            if ($result->rowCount()) {
                $fila = $result->fetch();
                $producto = new Producto($fila->id, $fila->nombre,$fila->descripcion, $fila->detalles, $fila->precio);
            } else {
                $producto = false;
            }

            return $producto;
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
                    $productos[] = new Producto($fila->id, $fila->id_usuario,$fila->nombre, $fila->foto, $fila->fecha_subida);
                }
            } else {
                $productos = false;
            }
            return $productos;
        } catch (Exception $ex) {
            die("ERROR en la BD" . $ex->getMessage());
        }
    }


}

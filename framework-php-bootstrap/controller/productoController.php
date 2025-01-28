<?php

require_once '../framework-php-bootstrap/model/producto.php';
require_once '../framework-php-bootstrap/controller/conexion.php';

class ProductoController
{

    /**
     * Undocumented function
     *
     * @param [type] $producto
     * @return void
     */
    public static function insertar($producto)
    {
        try {
            $conex = new Conexion();
            $conex->beginTransaction();
            $result = $conex->prepare("insert into producto (nombre,imagen,descripcion,precio,categoria) values (?,?,?,?,?)");
            $result->bindParam(1,$producto->nombre);
            $result->bindParam(1,$producto->imagen);
            $result->bindParam(2,$producto->descripcion);
            $result->bindParam(4,$producto->precio);
            $result->bindParam(5,$producto->categoria);
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

    /**
     * Undocumented function
     *
     * @param [type] $value
     * @return void
     */
    public static function find($value)
    {
        try {
            $conex = new Conexion();

            $result = $conex->query("select * from producto where id = '$value'");
            if ($result->rowCount()) {
                $fila = $result->fetchObject();
                $producto = new Producto($fila->id, $fila->nombre, $fila->imagen, $fila->descripcion, $fila->precio, $fila->categoria);
            } else {
                $producto = false;
            }

            return $producto;
        } catch (Exception $ex) {
            die("ERROR en la BD" . $ex->getMessage());
        }
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function findAll() {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from producto");
            if ($result->rowCount()) {
                while ($fila = $result->fetchObject()) {
                    $productos[] = new Producto($fila->id, $fila->nombre, $fila->imagen, $fila->descripcion, $fila->precio, $fila->categoria);
                }
            } else {
                $productos = false;
            }
            return $productos;
        } catch (Exception $ex) {
            die("ERROR en la BD" . $ex->getMessage());
        }
    }

    /**
     * Undocumented function
     *
     * @param [type] $category
     * @return void
     */
    public static function findByCategory($category) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from producto where categoria = '$category'");
            if ($result->rowCount()) {
                while ($fila = $result->fetchObject()) {
                    $productos[] = new Producto($fila->id, $fila->nombre, $fila->imagen, $fila->descripcion, $fila->precio, $fila->categoria);
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

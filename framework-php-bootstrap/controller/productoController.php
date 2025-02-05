<?php

require_once '../framework-php-bootstrap/model/producto.php';
require_once '../framework-php-bootstrap/controller/conexion.php';

class ProductoController
{
    public static function delete($id_producto)
{
    try {
        $conex = new Conexion();
        $conex->beginTransaction();

        // Asignamos el ID a una variable
        $id = $id_producto;

        $result = $conex->prepare("delete from producto where id = ?");
        $result->bindParam(1, $id);
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

public static function update($producto)
{
    try {
        $conex = new Conexion();
        $conex->beginTransaction();

        // Asignamos primero las propiedades del producto a variables
        $nombre = $producto->getNombre();
        $imagen = $producto->getImagen();
        $descripcion = $producto->getDescripcion();
        $precio = $producto->getPrecio();
        $categoria = $producto->getCategoria();
        $id = $producto->getId();

        $result = $conex->prepare("update producto set nombre = ?, imagen = ?, descripcion = ?, precio = ?, categoria = ? where id = ?");
        $result->bindParam(1, $nombre);
        $result->bindParam(2, $imagen);
        $result->bindParam(3, $descripcion);
        $result->bindParam(4, $precio);
        $result->bindParam(5, $categoria);
        $result->bindParam(6, $id);
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


    public static function insert($producto) {
        try {
            $conex = new Conexion();
            $conex->beginTransaction();
            $result = $conex->prepare("insert into producto (nombre, imagen, descripcion, precio, categoria) values (?, ?, ?, ?, ?)");
            
            // Asignamos primero los valores a variables
            $nombre = $producto->getNombre();
            $imagen = $producto->getImagen();
            $descripcion = $producto->getDescripcion();
            $precio = $producto->getPrecio();
            $categoria = $producto->getCategoria();
            
            // Ahora las variables son pasadas por referencia
            $result->bindParam(1, $nombre);
            $result->bindParam(2, $imagen);
            $result->bindParam(3, $descripcion);
            $result->bindParam(4, $precio);
            $result->bindParam(5, $categoria);
            
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


    public static function findAll()
    {
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
}

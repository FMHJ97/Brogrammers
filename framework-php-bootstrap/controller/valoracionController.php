<?php

require_once '../framework-php-bootstrap/model/valoracion.php';
require_once '../framework-php-bootstrap/controller/conexion.php';

class ValoracionController
{

    public static function update($valoracion)
    {
        try {
            $conex = new Conexion();
            $conex->beginTransaction();
            $result = $conex->prepare("update valoracion set valoracion = ?, titulo = ?, comentario = ? where id = ?");
            
            // Asignamos primero los valores a variables
            $puntuacion = $valoracion->getValoracion();
            $titulo = $valoracion->getTitulo();
            $comentario = $valoracion->getComentario();
            $id = $valoracion->getId();
            
            // Ahora las variables son pasadas por referencia
            $result->bindParam(1, $puntuacion);
            $result->bindParam(2, $titulo);
            $result->bindParam(3, $comentario);
            $result->bindParam(4, $id);
            
            $result->execute();
            if ($result->rowCount()) {
                $conex->commit();
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "<script>window.location.href='dificultades.php'</script>";

         //   die("ERROR en la BD" . $ex->getMessage());
        }
    }

    /*
    Elimina una valoración de la base de datos.
    */
    public static function delete($id)
    {
        try {
            $conex = new Conexion();
            $conex->beginTransaction();
            $result = $conex->prepare("delete from valoracion where id = ?");
            $result->bindParam(1, $id);
            $result->execute();
            
            if ($result->rowCount()) {
                $conex->commit();
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "<script>window.location.href='dificultades.php'</script>";

          //  die("ERROR en la BD" . $ex->getMessage());
        }
    }

    /*
    Inserta una valoración en la base de datos.
    */
    public static function insert($valoracion) {
        try {
            $conex = new Conexion();
            $conex->beginTransaction();
            $result = $conex->prepare("insert into valoracion (id, id_producto, id_usuario, fecha, valoracion, titulo, comentario) values (?, ?, ?, ?, ?, ?, ?)");
            
            // Asignamos primero los valores a variables
            $id = $valoracion->getId();
            $id_producto = $valoracion->getIdProducto();
            $id_usuario = $valoracion->getIdUsuario();
            $fecha = $valoracion->getFecha();
            $puntuacion = $valoracion->getValoracion();
            $titulo = $valoracion->getTitulo();
            $comentario = $valoracion->getComentario();
            
            // Ahora las variables son pasadas por referencia
            $result->bindParam(1, $id);
            $result->bindParam(2, $id_producto);
            $result->bindParam(3, $id_usuario);
            $result->bindParam(4, $fecha);
            $result->bindParam(5, $puntuacion);
            $result->bindParam(6, $titulo);
            $result->bindParam(7, $comentario);
            
            $result->execute();
            if ($result->rowCount()) {
                $conex->commit();
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "<script>window.location.href='dificultades.php'</script>";

        //    die("ERROR en la BD" . $ex->getMessage());
        }
    }

    public static function findById($id) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from valoracion where id = '$id'");
            if ($result->rowCount()) {
                $fila = $result->fetchObject();
                $valoracion = new Valoracion($fila->id, $fila->id_producto, $fila->id_usuario, $fila->fecha, $fila->valoracion, $fila->titulo, $fila->comentario);
            } else {
                $valoracion = false;
            }
            return $valoracion;
        } catch (Exception $ex) {
          //  die("ERROR en la BD" . $ex->getMessage());
            echo "<script>window.location.href='dificultades.php'</script>";

        }
    }

    /*
    Devuelve un array con todas las valoraciones de un producto.
    */
    public static function findByProducto($id_producto)
    {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from valoracion where id_producto = '$id_producto'");
            if ($result->rowCount()) {
                while ($fila = $result->fetchObject()) {
                    $valoraciones[] = new Valoracion($fila->id, $fila->id_producto, $fila->id_usuario, $fila->fecha, $fila->valoracion, $fila->titulo, $fila->comentario);
                }
            } else {
                $valoraciones = false;
            }

            return $valoraciones;
        } catch (Exception $ex) {
            echo "<script>window.location.href='dificultades.php'</script>";

         //   die("ERROR en la BD" . $ex->getMessage());
        }
    }

    /*
    Devuelve un array con todas las valoraciones de la base de datos.
    */
    public static function findAll()
    {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from valoracion");
            if ($result->rowCount()) {
                while ($fila = $result->fetchObject()) {
                    $valoraciones[] = new Valoracion($fila->id, $fila->id_producto, $fila->id_usuario, $fila->fecha, $fila->valoracion, $fila->titulo, $fila->comentario);
                }
            } else {
                $valoraciones = false;
            }
            return $valoraciones;
        } catch (Exception $ex) {
            echo "<script>window.location.href='dificultades.php'</script>";

         //   die("ERROR en la BD" . $ex->getMessage());
        }
    }

}

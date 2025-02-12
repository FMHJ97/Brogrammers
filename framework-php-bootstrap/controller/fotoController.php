<?php
header("Access-Control-Allow-Origin: *");
if (!defined('PROJECT_ROOT')) {
    define('PROJECT_ROOT', dirname(__FILE__) . '/../');
}

require_once PROJECT_ROOT . 'model/foto.php';
require_once PROJECT_ROOT . 'controller/conexion.php';

class FotoController
{

    public static function insertar($foto)
    {
        try {
            $conex = new Conexion();
            $conex->beginTransaction();
            $id_usuario = $foto->id_usuario;
            $nombre = $foto->nombre;
            $img = $foto->img;
            $fecha = $foto->fecha_subida;


            $result = $conex->prepare("insert into foto_galeria (id_usuario,nombre,foto,fecha_subida) values (?,?,?,?)");
            $result->bindParam(1, $id_usuario);
            $result->bindParam(2, $nombre);
            $result->bindParam(3, $img);
            $result->bindParam(4, $fecha);
            $result->execute();
            if ($result->rowCount()) {
                $conex->commit();
                return true;
            } else {
                $conex->rollBack();

                return false;
            }
        } catch (Exception $ex) {
            echo "<script>window.location.href='dificultades.php'</script>";
        }
    }

    public static function find($value)
    {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from foto_galeria where id = $value");
            if ($result->rowCount()) {
                $fila = $result->fetchObject();
                $foto = new Foto($fila->id, $fila->id_usuario, null, $fila->nombre, $fila->foto, $fila->fecha_subida);
            } else {
                $foto = false;
            }

            return $foto;
        } catch (Exception $ex) {
            echo "<script>window.location.href='dificultades.php'</script>";

           // die("ERROR en la BD" . $ex->getMessage());
        }
    }


    public static function delete($id)
    {
        try {
            $conex = new Conexion();
            $result = $conex->query("delete from foto_galeria where id='$id'");
            if ($result->rowCount()) {
                return true;
            } else
                return false;
        } catch (Exception $ex) {
            echo "<script>window.location.href='dificultades.php'</script>";

         //   die("ERROR en la BD" . $ex->getLine());
        }
    }

    public static function getAll()
    {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT foto_galeria.id as id,usuario.id as id_usuario,foto_galeria.nombre,foto,fecha_subida,usuario.correo_electronico FROM `foto_galeria` join usuario on usuario.id=foto_galeria.id_usuario ORDER BY `fecha_subida` DESC");

            $fotos = [];

            if ($result->rowCount()) {
                while ($fila = $result->fetchObject()) {
                    // Create a Foto object for each row
                    $foto = new Foto(
                        $fila->id,
                        $fila->id_usuario,
                        $fila->correo_electronico,
                        $fila->nombre,
                        $fila->foto,  // Assuming 'foto' is the binary image data
                        $fila->fecha_subida
                    );

                    $fotos[] = $foto;
                }
            }

            return $fotos;
        } catch (Exception $ex) {
            echo "<script>window.location.href='dificultades.php'</script>";

          //  die("ERROR en la BD: " . $ex->getMessage());
        }
    }

    public static function getAllByUsuario($email)
    {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT foto_galeria.id as id,usuario.id as id_usuario,foto_galeria.nombre,foto,fecha_subida,usuario.correo_electronico FROM `foto_galeria` join usuario on usuario.id=foto_galeria.id_usuario where correo_electronico like '%$email%' ORDER BY `fecha_subida` DESC");

            $fotos = [];

            if ($result->rowCount()) {
                while ($fila = $result->fetchObject()) {
                    // Create a Foto object for each row
                    $foto = new Foto(
                        $fila->id,
                        $fila->id_usuario,
                        $fila->correo_electronico,
                        $fila->nombre,
                        $fila->foto,  // Assuming 'foto' is the binary image data
                        $fila->fecha_subida
                    );

                    $fotos[] = $foto;
                }
            }

            return $fotos;
        } catch (Exception $ex) {
            echo "<script>window.location.href='dificultades.php'</script>";

        //    die("ERROR en la BD: " . $ex->getMessage());
        }
    }

    public static function getAllByFecha($date)
    {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT foto_galeria.id as id,usuario.id as id_usuario,foto_galeria.nombre,foto,fecha_subida,usuario.correo_electronico FROM `foto_galeria` join usuario on usuario.id=foto_galeria.id_usuario where fecha_subida like '%$date%' ORDER BY `fecha_subida` DESC");

            $fotos = [];

            if ($result->rowCount()) {
                while ($fila = $result->fetchObject()) {
                    // Create a Foto object for each row
                    $foto = new Foto(
                        $fila->id,
                        $fila->id_usuario,
                        $fila->correo_electronico,
                        $fila->nombre,
                        $fila->foto,  // Assuming 'foto' is the binary image data
                        $fila->fecha_subida
                    );

                    $fotos[] = $foto;
                }
            }

            return $fotos;
        } catch (Exception $ex) {
            echo "<script>window.location.href='dificultades.php'</script>";

           // die("ERROR en la BD: " . $ex->getMessage());
        }
    }

    public static function modificar($id, $text)
    {
        try {
            $conex = new Conexion();
            $conex->beginTransaction();

            $result = $conex->prepare("UPDATE foto_galeria SET nombre = ? WHERE id = ?");

            $result->bindParam(1, $text);
            $result->bindParam(2, $id);

            $result->execute();
            $conex->commit();

            return true;
        } catch (Exception $ex) {
            //error_log("Database Error: " . $ex->getMessage());
            $conex->rollBack();
            echo "<script>window.location.href='dificultades.php'</script>";

            return false;
        }
    }
}

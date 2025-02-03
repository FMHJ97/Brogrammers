<?php
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
            $id_usuario=$foto->id_usuario;
            $nombre=$foto->nombre;
            $img = $foto->img;
            $fecha=$foto->fecha_subida;


            $result = $conex->prepare("insert into foto_galeria (id_usuario,nombre,foto,fecha_subida) values (?,?,?,?)");
            $result->bindParam(1,$id_usuario);
            $result->bindParam(2,$nombre);
            $result->bindParam(3,$img);
            $result->bindParam(4,$fecha);
            $result->execute();
            if ($result->rowCount()) {
                $conex->commit();
                return true;
            } else {
                $conex->rollBack();
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
                $foto = new Foto($fila->id, $fila->id_usuario,$fila->nombre, $fila->foto, $fila->fecha_subida);
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
            $result = $conex->query("SELECT * FROM `foto_galeria` ORDER BY `fecha_subida` DESC");
            
            $fotos = [];
            
            if ($result->rowCount()) {
                while ($fila = $result->fetchObject() ) {
                    // Create a Foto object for each row
                    $foto = new Foto(
                        $fila->id,
                        $fila->id_usuario,
                        $fila->nombre,
                        $fila->foto,  // Assuming 'foto' is the binary image data
                        $fila->fecha_subida
                    );
    
                    $fotos[] = $foto;  
                }
            }
    
            return $fotos;
    
        } catch (Exception $ex) {
            die("ERROR en la BD: " . $ex->getMessage());
        }
    }
    


}
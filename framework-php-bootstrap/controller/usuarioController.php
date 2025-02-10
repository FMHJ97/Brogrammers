<?php

require_once '../framework-php-bootstrap/model/usuario.php';
require_once '../framework-php-bootstrap/controller/conexion.php';

class UserController
{

    public static function insertar($usuario)
    {
        try {
            $conex = new Conexion();
            $conex->beginTransaction();
            $pass = password_hash($usuario->clave, PASSWORD_DEFAULT);
            $result = $conex->prepare("insert into usuario (nombre,apellido1,apellido2,correo_electronico,clave,fecha_nac,pais,codigo_postal,telefono,img_perfil,rol) values (?,?,?,?,?,?,?,?,?,?,?)");

            $result->bindParam(1, $usuario->nombre);
            $result->bindParam(2, $usuario->apellido1);
            $result->bindParam(3, $usuario->apellido2);
            $result->bindParam(4, $usuario->correo);
            $result->bindParam(5, $pass);
            $result->bindParam(6, $usuario->fecha_nac);
            $result->bindParam(7, $usuario->pais);
            $result->bindParam(8, $usuario->codigo_postal);
            $result->bindParam(9, $usuario->telefono);
            $result->bindParam(10, $usuario->img_perfil);
            $result->bindParam(11, $usuario->rol);
            $result->execute();
            if ($result->rowCount()) {
                $conex->commit();
                // Buscamos en la base de datos el usuario que acabamos de insertar
                return $user = self::find($usuario->correo);
            } else {
                $conex->rollBack();
                throw new Exception("Failed to insert the user into the database.");

                return null;
            }
        } catch (Exception $ex) {
           // error_log("Database Error: " . $ex->getMessage());
            $conex->rollBack();
            echo "<script>window.location.href='dificultades.php'</script>";

          //  die("ERROR en la BD" . $ex->getMessage());
        }
    }

    public static function exists($value)
    {
        try {
            $conex = new Conexion();

            $result = $conex->query("select * from usuario where correo_electronico = '$value'");
            if ($result->rowCount()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "<script>window.location.href='dificultades.php'</script>";

       //     die("ERROR en la BD" . $ex->getMessage());
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
            echo "<script>window.location.href='dificultades.php'</script>";

            //header("location: dificultades.php");
           
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

    public static function getAll()
    {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from usuario  order by apellido1");
            if ($result->rowCount()) {
                while ($fila = $result->fetchObject()) {
                    $users[] = new Usuario($fila->id, $fila->nombre, $fila->apellido1, $fila->apellido2, $fila->correo_electronico, $fila->clave, $fila->fecha_nac, $fila->pais, $fila->codigo_postal, $fila->telefono, $fila->img_perfil, $fila->rol);
                }
            } else {
                $users = false;
            }
            return $users;
        } catch (Exception $ex) {
          //  die("ERROR en la BD" . $ex->getMessage());
            echo "<script>window.location.href='dificultades.php'</script>";

         //   header("location: dificultades.php");
        }
    }

    public static function getAllByRole($role)
    {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from usuario where rol='$role' order by apellido1");
            if ($result->rowCount()) {
                while ($fila = $result->fetchObject()) {
                    $users[] = new Usuario($fila->id, $fila->nombre, $fila->apellido1, $fila->apellido2, $fila->correo_electronico, $fila->clave, $fila->fecha_nac, $fila->pais, $fila->codigo_postal, $fila->telefono, $fila->img_perfil, $fila->rol);
                }
            } else {
                $users = false;
            }
            return $users;
        } catch (Exception $ex) {
           // die("ERROR en la BD" . $ex->getMessage());
            echo "<script>window.location.href='dificultades.php'</script>";

        }
    }

    public static function getAllByName($name)
    {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM usuario WHERE CONCAT(nombre, ' ', apellido1, ' ', apellido2) LIKE  '%$name%';");
            if ($result->rowCount()) {
                while ($fila = $result->fetchObject()) {
                    $users[] = new Usuario($fila->id, $fila->nombre, $fila->apellido1, $fila->apellido2, $fila->correo_electronico, $fila->clave, $fila->fecha_nac, $fila->pais, $fila->codigo_postal, $fila->telefono, $fila->img_perfil, $fila->rol);
                }
            } else {
                $users = false;
            }
            return $users;
        } catch (Exception $ex) {
           // die("ERROR en la BD" . $ex->getMessage());
            echo "<script>window.location.href='dificultades.php'</script>";

        }
    }

    public static function delete($id)
    {
        try {
            $conex = new Conexion();
            $result = $conex->query("delete from usuario where correo_electronico='$id'");
            if ($result->rowCount()) {
                return true;
            } else
                return false;
        } catch (Exception $ex) {
         //   die("ERROR en la BD" . $ex->getLine());
            echo "<script>window.location.href='dificultades.php'</script>";

        }
    }

    public static function modificar($usuario)
    {
        try {
            $conex = new Conexion();
            $conex->beginTransaction();
            $pass = password_hash($usuario->clave, PASSWORD_DEFAULT);
            $result = $conex->prepare("UPDATE usuario SET nombre = ?, apellido1 = ?, apellido2 = ?, 
                clave = ?, fecha_nac = ?, pais = ?, codigo_postal = ?, telefono = ?, 
                rol = ? WHERE correo_electronico = ?");

            $nombre = $usuario->nombre;
            $apellido1 = $usuario->apellido1;
            $apellido2 = $usuario->apellido2;
            $fecha_nac = $usuario->fecha_nac;
            $pais = $usuario->pais;
            $codigo_postal = $usuario->codigo_postal;
            $telefono = $usuario->telefono;
            $rol = $usuario->rol;
            $correo = $usuario->correo;

            $result->bindParam(1, $nombre);
            $result->bindParam(2, $apellido1);
            $result->bindParam(3, $apellido2);
            $result->bindParam(4, $pass);
            $result->bindParam(5, $fecha_nac);
            $result->bindParam(6, $pais);
            $result->bindParam(7, $codigo_postal);
            $result->bindParam(8, $telefono);
            $result->bindParam(9, $rol);
            $result->bindParam(10, $correo);

            $result->execute();
            if ($result->rowCount()) {
                $conex->commit();
                return true;
            } else {
                $conex->rollBack();
                throw new Exception("Failed to update the user in the database.");
            }
        } catch (Exception $ex) {
           // error_log("Database Error: " . $ex->getMessage());
            $conex->rollBack();

            echo "<script>window.location.href='dificultades.php'</script>";

        }
    }

    // Modificar2 a diferencia de modificar incluye la imagen de perfil del usuario
    public static function modificar2($usuario) {
        try {
            $conex = new Conexion();
            $conex->beginTransaction();
            $result = $conex->prepare("UPDATE usuario SET nombre = ?, apellido1 = ?, apellido2 = ?, 
                fecha_nac = ?, pais = ?, codigo_postal = ?, telefono = ?, img_perfil = ?,
                rol = ? WHERE correo_electronico = ?");

            $nombre = $usuario->nombre;
            $apellido1 = $usuario->apellido1;
            $apellido2 = $usuario->apellido2;
            $fecha_nac = $usuario->fecha_nac;
            $pais = $usuario->pais;
            $codigo_postal = $usuario->codigo_postal;
            $telefono = $usuario->telefono;
            $img_perfil = $usuario->img_perfil;
            $rol = $usuario->rol;
            $correo = $usuario->correo;

            $result->bindParam(1, $nombre);
            $result->bindParam(2, $apellido1);
            $result->bindParam(3, $apellido2);
            $result->bindParam(4, $fecha_nac);
            $result->bindParam(5, $pais);
            $result->bindParam(6, $codigo_postal);
            $result->bindParam(7, $telefono);
            $result->bindParam(8, $img_perfil);
            $result->bindParam(9, $rol);
            $result->bindParam(10, $correo);

            $result->execute();
            if ($result->rowCount()) {
                $conex->commit();
                return true;
            } else {
                $conex->rollBack();
                throw new Exception("Failed to update the user in the database.");
            }
        } catch (Exception $ex) {
            error_log("Database Error: " . $ex->getMessage());
            $conex->rollBack();
            echo "<script>window.location.href='dificultades.php'</script>";

            //header("location: dificultades.php");
        }
    }

    public static function getById($id) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from usuario where id = $id");
            if ($result->rowCount()) {
                $fila = $result->fetchObject();
                $user = new Usuario($fila->id, $fila->nombre, $fila->apellido1, $fila->apellido2, $fila->correo_electronico, $fila->clave, $fila->fecha_nac, $fila->pais, $fila->codigo_postal, $fila->telefono, $fila->img_perfil, $fila->rol);
            } else {
                $user = false;
            }
            return $user;
        } catch (Exception $ex) {
            //die("ERROR en la BD" . $ex->getMessage());
            echo "<script>window.location.href='dificultades.php'</script>";

        }
    }
}

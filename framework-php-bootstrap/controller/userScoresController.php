<?php

require_once '../framework-php-bootstrap/model/userScores.php';
require_once '../framework-php-bootstrap/controller/conexion.php';

class UserScoresController
{

    public static function getAllTH()
    {
        try {
            $conex = new Conexion();
            $result = $conex->query("select correo_electronico,juego,puntos from records_usuario join usuario on id_usuario = usuario.id where juego=2 order by puntos desc limit 10");
            if ($result->rowCount()) {
                while ($fila = $result->fetchObject()) {
                    $scores[] = new UserScore($fila->correo_electronico, $fila->juego, $fila->puntos);
                }
            } else {
                $scores = false;
            }
            return $scores;
        } catch (Exception $ex) {
            //   die("ERROR en la BD" . $ex->getMessage());
            echo "<script>window.location.href='dificultades.php'</script>";
        }
    }

    public static function getAllFMHJ()
    {
        try {
            $conex = new Conexion();
            $result = $conex->query("select correo_electronico,juego,puntos from records_usuario join usuario on id_usuario = usuario.id where juego=1 order by puntos desc limit 10");
            if ($result->rowCount()) {
                while ($fila = $result->fetchObject()) {
                    $scores[] = new UserScore($fila->correo_electronico, $fila->juego, $fila->puntos);
                }
            } else {
                $scores = false;
            }
            return $scores;
        } catch (Exception $ex) {
            //  die("ERROR en la BD" . $ex->getMessage());
            echo "<script>window.location.href='dificultades.php'</script>";
        }
    }

    public static function getAllJMPA()
    {
        try {
            $conex = new Conexion();
            $result = $conex->query("select correo_electronico,juego,puntos from records_usuario join usuario on id_usuario = usuario.id where juego=3 order by puntos desc limit 10");
            if ($result->rowCount()) {
                while ($fila = $result->fetchObject()) {
                    $scores[] = new UserScore($fila->correo_electronico, $fila->juego, $fila->puntos);
                }
            } else {
                $scores = false;
            }
            return $scores;
        } catch (Exception $ex) {
            //  die("ERROR en la BD" . $ex->getMessage());
            echo "<script>window.location.href='dificultades.php'</script>";
        }
    }

    public static function getAllFRM()
    {
        try {
            $conex = new Conexion();
            $result = $conex->query("select correo_electronico,juego,puntos from records_usuario join usuario on id_usuario = usuario.id where juego=4 order by puntos desc limit 10");
            if ($result->rowCount()) {
                while ($fila = $result->fetchObject()) {
                    $scores[] = new UserScore($fila->correo_electronico, $fila->juego, $fila->puntos);
                }
            } else {
                $scores = false;
            }
            return $scores;
        } catch (Exception $ex) {
            // die("ERROR en la BD" . $ex->getMessage());
            echo "<script>window.location.href='dificultades.php'</script>";
        }
    }
}

<?php

require_once '../framework-php-bootstrap/model/userScores.php';
require_once '../framework-php-bootstrap/controller/conexion.php';

class UserScoresController
{

    public static function getAll()
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
            die("ERROR en la BD" . $ex->getMessage());
            header("location: dificultades.php");
        }
    }
}

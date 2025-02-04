<?php

class Foto implements JsonSerializable {
    private $id;
    private $id_usuario;
    private $usuario;
    private $nombre;
    private $img;
    private $fecha_subida;

    public function jsonSerialize(): array {
        return [
            'id' => $this->id,
            'id_usuario' => $this->id_usuario,
            'usuario' => $this->usuario,
            'nombre' => $this->nombre,
            'img' => $this->img,
            'fecha_subida' => $this->fecha_subida
        ];
    }


    public function __construct($id, $idU,$usu=null, $nombre, $image, $fs)
    {
        $this->id = $id;
        $this->id_usuario = $idU;
        $this->usuario = $usu;
        $this->nombre = $nombre;
        $this->img = $image;
        $this->fecha_subida = $fs;
    }


    public function __get(string $name): mixed
    {
        return $this->$name;
    }

    public function __set(string $name, mixed $value): void
    {
        $this->$name = $value;
    }

    public function __toString()
    {
        return "Soy una foto";
    }
}

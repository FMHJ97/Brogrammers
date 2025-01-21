<?php

class Foto {

    private $id;
    private $id_usuario;
    private $img;
    private $fecha_subida;

    public function __construct($id,$idU,$image,$fs) {
        $this->id = $id;
        $this->id_usuario = $idU;
        $this->img = $image;
        $this->fecha_subida = $fs;
    }

    public function __get(string $name): mixed {
        return $this->$name;
    }

    public function __set(string $name, mixed $value): void {
        $this->$name = $value;
    }

    public function __toString()
    {
        return "Soy una foto";
    }
    
}

?>
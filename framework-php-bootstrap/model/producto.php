<?php

class Producto {

    private $id;
    private $nombre;
    private $imagen;
    private $descripcion;
    private $detalles;
    private $precio;
    private $categoria;

    public function __construct($id,$n,$img,$des,$det,$p,$cat) {
        $this->id = $id;
        $this->nombre=$n;
        $this->imagen=$img;
        $this->descripcion=$des;
        $this->detalles=$det;
        $this->precio=$p;
        $this->categoria=$cat;
    }

    public function __get(string $name): mixed {
        return $this->$name;
    }

    public function __set(string $name, mixed $value): void {
        $this->$name = $value;
    }

    public function __toString()
    {
        return "Soy un producto";
    }
    
}

?>
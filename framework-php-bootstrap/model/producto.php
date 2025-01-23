<?php

class Producto {

    private $id;
    private $nombre;
    private $descripcion;
    private $detalles;
    private $precio;

    public function __construct($id,$n,$des,$det,$p) {
        $this->id = $id;
        $this->nombre=$n;
        $this->descripcion=$des;
        $this->detalles=$det;
        $this->precio=$p;
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
<?php
class Producto {
    private $id;
    private $nombre;
    private $imagen;
    private $descripcion;
    private $precio;
    private $categoria;

    public function __construct($id,$n,$img,$des,$p,$cat) {
        $this->id = $id;
        $this->nombre = $n;
        $this->imagen = $img;
        $this->descripcion = $des;
        $this->precio = $p;
        $this->categoria = $cat;
    }

    public function __get(string $name): mixed
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        throw new Exception("Property '$name' does not exist or is inaccessible.");
    }

    public function __set(string $name, mixed $value): void
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        } else {
            throw new Exception("Property '$name' does not exist or is inaccessible.");
        }
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function __toString() {
        return "Soy un producto";
    }
}

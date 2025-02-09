<?php
class Valoracion {
    private $id;
    private $id_producto;
    private $id_usuario;
    private $fecha;
    private $valoracion;
    private $titulo;
    private $comentario;

    public function __construct($id, $id_producto, $id_usuario, $fecha, $valoracion, $titulo, $comentario) {
        $this->id = $id;
        $this->id_producto = $id_producto;
        $this->id_usuario = $id_usuario;
        $this->fecha = $fecha;
        $this->valoracion = $valoracion;
        $this->titulo = $titulo;
        $this->comentario = $comentario;
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

    public function getIdProducto() {
        return $this->id_producto;
    }

    public function setIdProducto($id_producto) {
        $this->id_producto = $id_producto;
    }

    public function getIdUsuario() {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getValoracion() {
        return $this->valoracion;
    }

    public function setValoracion($valoracion) {
        $this->valoracion = $valoracion;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getComentario() {
        return $this->comentario;
    }

    public function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    public function __toString() {
        return "Soy una valoración de un producto";
    }
}

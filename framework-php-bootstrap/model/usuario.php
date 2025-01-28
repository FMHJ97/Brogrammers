<?php

class Usuario
{


    private $id;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $correo;
    private $clave;
    private $fecha_nac;
    private $pais;
    private $codigo_postal;
    private $telefono;
    private $img_perfil;
    private $rol;

    public function __construct($id, $n, $a1, $a2, $co, $cl, $f, $p, $cp, $t, $i, $r)
    {
        $this->id = $id;
        $this->nombre = $n;
        $this->apellido1 = $a1;
        $this->apellido2 = $a2;
        $this->correo = $co;
        $this->clave = $cl;
        $this->fecha_nac = $f;
        $this->pais = $p;
        $this->codigo_postal = $cp;
        $this->telefono = $t;
        $this->img_perfil = $i;
        $this->rol = $r;
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

    public function __toString()
    {
        return "Soy usuario";
    }
}

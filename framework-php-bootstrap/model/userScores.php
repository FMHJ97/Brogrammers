<?php

class UserScore
{


    private $nombre;
    private $juego;
    private $puntos;

    public function __construct($n, $j,$p)
    {
        $this->nombre = $n;
        $this->juego = $j;
        $this->puntos = $p;
        
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

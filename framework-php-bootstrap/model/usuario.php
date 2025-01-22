<?php

class Usuario {

    private $id;
    private $username;
    private $clave;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $correo;
    private $fecha_nac;
    private $pais;
    private $codigo_postal;
    private $telefono;
    private $img_perfil;
    private $rol;

    public function __construct($id,$cl,$n,$a1,$a2,$co,$p,$cp,$t,$i,$r) {
        $this->id = $id;
        $this->clave = $cl;
        $this->nombre = $n;
        $this->apellido1 = $a1;
        $this->apellido2 = $a2;
        $this->correo = $co;
        $this->pais = $p;
        $this->codigo_postal = $cp;
        $this->telefono = $t;
        $this->img_perfil = $i;
        $this->rol = $r;
        $this->newsletter = $nl;
    }

    public function __get(string $name): mixed {
        return $this->$name;
    }

    public function __set(string $name, mixed $value): void {
        $this->$name = $value;
    }

    public function __toString()
    {
        return "Soy usuario";
    }
    
}

?>
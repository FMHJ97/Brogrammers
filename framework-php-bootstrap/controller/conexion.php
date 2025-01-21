<?php

class Conexion extends PDO {

    private $dsn = "mysql:host=localhost;dbname=brogrammers";
    private $user = "dwes";
    private $pass = "abc123.";
    private $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4", PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_CASE => PDO::CASE_LOWER);

    public function __construct() {
        parent::__construct($this->dsn, $this->user, $this->pass, $this->opciones);
    }

    public function __get(string $name): mixed {
        return $this->$name;
    }

    public function __set(string $name, mixed $value): void {
        $this->$name = $value;
    }
}

?>
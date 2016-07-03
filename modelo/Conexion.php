<?php

class Conexion {

    public $con;

    public function __construct() {
        $this->con = new mysqli("localhost", "root", "", "previcrim");
        if (!$this->con) {
            die("Error al conectar: " . mysqli_errno());
        }
    }

    public function ejecutar($sql) {
        return mysqli_query($this->con, $sql);
    }

    public function cerrar() {
        mysql_close($this->con);
    }

}

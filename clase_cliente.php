<?php

// Clase Cliente (básica)
class Cliente {
    private $nombre;
    private $apellido;
    private $dni;

    public function __construct($nombre, $apellido, $dni) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getDni() {
        return $this->dni;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    // Método toString de la clase Cliente
    public function __toString() {
        return "Nombre: " . $this->getNombre() . 
               ", Apellido: " . $this->getApellido() . 
               ", DNI: " . $this->getDni();
    }
}
?>
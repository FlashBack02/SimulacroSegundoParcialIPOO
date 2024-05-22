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

    // Métodos de la clase Cliente
    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getDni() {
        return $this->dni;
    }
}

// Clase base Moto
class Moto {
    protected $marca;
    protected $modelo;
    protected $precioBase;

    public function __construct($marca, $modelo, $precioBase) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->precioBase = $precioBase;
    }

    public function darPrecioVenta() {
        return $this->precioBase;
    }

    public function __toString() {
        return "Marca: $this->marca, Modelo: $this->modelo, Precio Base: $this->precioBase";
    }
}

// Clase MotoNacional
class MotoNacional extends Moto {
    private $descuento;

    public function __construct($marca, $modelo, $precioBase, $descuento = 0.15) {
        parent::__construct($marca, $modelo, $precioBase);
        $this->descuento = $descuento;
    }

    public function darPrecioVenta() {
        return $this->precioBase * (1 - $this->descuento);
    }

    public function __toString() {
        return parent::__toString() . ", Descuento: " . ($this->descuento * 100) . "%";
    }
}

// Clase MotoImportada
class MotoImportada extends Moto {
    private $paisOrigen;
    private $impuestos;

    public function __construct($marca, $modelo, $precioBase, $paisOrigen, $impuestos) {
        parent::__construct($marca, $modelo, $precioBase);
        $this->paisOrigen = $paisOrigen;
        $this->impuestos = $impuestos;
    }

    public function darPrecioVenta() {
        return $this->precioBase + $this->impuestos;
    }

    public function __toString() {
        return parent::__toString() . ", País de Origen: $this->paisOrigen, Impuestos: $this->impuestos";
    }
}

// Ejemplo de uso
$motoNacional = new MotoNacional("Honda", "CG150", 1000);
$motoImportada = new MotoImportada("Yamaha", "R1", 15000, "Japón", 3000);

echo $motoNacional . "\n";
echo "Precio de Venta: " . $motoNacional->darPrecioVenta() . "\n";

echo $motoImportada . "\n";
echo "Precio de Venta: " . $motoImportada->darPrecioVenta() . "\n";

?>
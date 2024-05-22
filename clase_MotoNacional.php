<?php

class MotoNacional extends Moto {
    private $descuento;

    public function __construct($codigo, $marca, $modelo, $precioBase, $anioFabricacion, $porIncAnual, $activo, $descuento = 0.15) {
        parent::__construct($codigo, $marca, $modelo, $precioBase, $anioFabricacion, $porIncAnual, $activo);
        $this->descuento = $descuento;
    }

    public function getDescuento() {
        return $this->descuento;
    }

    public function setDescuento($descuento) {
        $this->descuento = $descuento;
    }

    public function darPrecioVenta() {
        $precioVenta = parent::darPrecioVenta();
        if ($precioVenta >= 0) {
            $precioVenta *= (1 - $this->descuento);
        }
        return $precioVenta;
    }

    public function __toString() {
        return parent::__toString() . ", Descuento: " . ($this->getDescuento() * 100) . "%";
    }
}

?>
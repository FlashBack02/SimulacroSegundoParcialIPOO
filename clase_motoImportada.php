<?php

class MotoImportada extends Moto {
    private $paisOrigen;
    private $impuestos;

    public function __construct($codigo, $marca, $modelo, $precioBase, $anioFabricacion, $porIncAnual, $activo, $paisOrigen, $impuestos) {
        parent::__construct($codigo, $marca, $modelo, $precioBase, $anioFabricacion, $porIncAnual, $activo);
        $this->paisOrigen = $paisOrigen;
        $this->impuestos = $impuestos;
    }

    public function getPaisOrigen() {
        return $this->paisOrigen;
    }

    public function setPaisOrigen($paisOrigen) {
        $this->paisOrigen = $paisOrigen;
    }

    public function getImpuestos() {
        return $this->impuestos;
    }

    public function setImpuestos($impuestos) {
        $this->impuestos = $impuestos;
    }

    public function darPrecioVenta() {
        $precioVenta = parent::darPrecioVenta();
        if ($precioVenta >= 0) {
            $precioVenta += $this->impuestos;
        }
        return $precioVenta;
    }

    public function __toString() {
        return parent::__toString() . ", País de Origen: " . $this->getPaisOrigen() . ", Impuestos: " . $this->getImpuestos();
    }
}
?>
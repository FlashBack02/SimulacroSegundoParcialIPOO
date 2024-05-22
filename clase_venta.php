<?php

class Venta {
    private $fecha;
    private $cliente;
    private $colMotos;

    public function __construct($fecha, $cliente, $colMotos) {
        $this->fecha = $fecha;
        $this->cliente = $cliente;
        $this->colMotos = $colMotos;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function getColMotos() {
        return $this->colMotos;
    }

    public function setColMotos($colMotos) {
        $this->colMotos = $colMotos;
    }

    public function retornarTotalVentaNacional() {
        $total = 0;
        foreach ($this->colMotos as $moto) {
            if ($moto instanceof MotoNacional) {
                $total += $moto->darPrecioVenta();
            }
        }
        return $total;
    }

    public function retornarMotosImportadas() {
        $motosImportadas = [];
        foreach ($this->colMotos as $moto) {
            if ($moto instanceof MotoImportada) {
                $motosImportadas[] = $moto;
            }
        }
        return $motosImportadas;
    }

    public function __toString() {
        $motosStr = "";
        foreach ($this->colMotos as $moto) {
            $motosStr .= $moto->__toString() . "\n";
        }
        return "Fecha: $this->fecha, Cliente: {$this->cliente->__toString()}, Motos: \n$motosStr";
    }
}
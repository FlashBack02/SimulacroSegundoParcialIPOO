<?php
class Empresa {
    private $denominacion;
    private $direccion;
    private $colMotos;
    private $colClientes;
    private $colVentas;

    public function __construct($denominacion, $direccion, $colMotos, $colClientes, $colVentas) {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colMotos = $colMotos;
        $this->colClientes = $colClientes;
        $this->colVentas = $colVentas;
    }

    public function getDenominacion() {
        return $this->denominacion;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getColMotos() {
        return $this->colMotos;
    }

    public function getColClientes() {
        return $this->colClientes;
    }

    public function getColVentas() {
        return $this->colVentas;
    }

    public function setDenominacion($denominacion) {
        $this->denominacion = $denominacion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setColMotos($colMotos) {
        $this->colMotos = $colMotos;
    }

    public function setColClientes($colClientes) {
        $this->colClientes = $colClientes;
    }

    public function setColVentas($colVentas) {
        $this->colVentas = $colVentas;
    }

    public function registrarVenta($fecha, $cliente, $colCodigosMoto) {
        $motosVendidas = [];
        foreach ($colCodigosMoto as $codigo) {
            foreach ($this->colMotos as $moto) {
                if ($moto->getCodigo() == $codigo && $moto->getActivo()) {
                    $motosVendidas[] = $moto;
                    break;
                }
            }
        }
        if (count($motosVendidas) > 0) {
            $venta = new Venta($fecha, $cliente, $motosVendidas);
            $this->colVentas[] = $venta;
            return $venta;
        }
        return null;
    }

    public function __toString() {
        $str = "Empresa: $this->denominacion, Dirección: $this->direccion\n";
        $str .= "Motos:\n";
        foreach ($this->colMotos as $moto) {
            $str .= $moto->__toString() . "\n";
        }
        $str .= "Clientes:\n";
        foreach ($this->colClientes as $cliente) {
            $str .= $cliente->__toString() . "\n";
        }
        $str .= "Ventas:\n";
        foreach ($this->colVentas as $venta) {
            $str .= $venta->__toString() . "\n";
        }
        return $str;
    }
}
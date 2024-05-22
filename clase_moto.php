<?php

class Moto {
    protected $codigo;
    protected $marca;
    protected $modelo;
    protected $precioBase;
    protected $anioFabricacion;
    protected $porIncAnual;
    protected $activo;

    public function __construct($codigo, $marca, $modelo, $precioBase, $anioFabricacion, $porIncAnual, $activo) {
        $this->codigo = $codigo;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->precioBase = $precioBase;
        $this->anioFabricacion = $anioFabricacion;
        $this->porIncAnual = $porIncAnual;
        $this->activo = $activo;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getPrecioBase() {
        return $this->precioBase;
    }

    public function getAnioFabricacion() {
        return $this->anioFabricacion;
    }

    public function getPorIncAnual() {
        return $this->porIncAnual;
    }

    public function getActivo() {
        return $this->activo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function setPrecioBase($precioBase) {
        $this->precioBase = $precioBase;
    }

    public function setAnioFabricacion($anioFabricacion) {
        $this->anioFabricacion = $anioFabricacion;
    }

    public function setPorIncAnual($porIncAnual) {
        $this->porIncAnual = $porIncAnual;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

    public function darPrecioVenta() {
        $anioActual = date('Y');
        $antiguedad = $anioActual - $this->anioFabricacion;
        if ($this->activo) {
            $precioVenta = $this->precioBase * pow((1 + $this->porIncAnual), $antiguedad);
        } else {
            $precioVenta = -1;
        }
        return $precioVenta;
    }

    public function __toString() {
        return "Código: " . $this->getCodigo() . 
               ", Marca: " . $this->getMarca() . 
               ", Modelo: " . $this->getModelo() . 
               ", Precio Base: " . $this->getPrecioBase() . 
               ", Año Fabricación: " . $this->getAnioFabricacion() . 
               ", Incremento Anual: " . $this->getPorIncAnual() . 
               ", Activo: " . ($this->getActivo() ? "Sí" : "No");
    }
}
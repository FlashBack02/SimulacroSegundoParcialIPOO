<?php
include_once 'clase_moto.php';
include_once 'clase_motoImportada.php';
include_once 'clase_MotoNacional.php';
include_once 'clase_empresa.php';
include_once 'clase_cliente.php';
include_once 'clase_venta.php';


// Crear instancias de la clase Cliente
$objCliente1 = new Cliente("Juan", "Pérez", "12345678");
$objCliente2 = new Cliente("Ana", "García", "87654321");

// Crear instancias de la clase Moto
$obMoto11 = new MotoNacional("Benelli", "Imperiale 400", 2230000, 2022, 0.85, true, 0.10);
$obMoto12 = new MotoNacional("Zanella", "Zr 150 Ohc", 584000, 2021, 0.70, true, 0.10);
$obMoto13 = new MotoNacional("Zanella", "Patagonian Eagle 250", 999900, 2023, 0.55, false, 0.10);
$obMoto14 = new MotoImportada("Pitbike", "Enduro Motocross Apollo Aiii 190cc Plr", 12499900, 357687, 2020, 1.00, true, "Francia", 6244400);

// Crear instancia de la clase Empresa
$empresa = new Empresa("Alta Gama", "Av Argentina 123", [$obMoto11, $obMoto12, $obMoto13, $obMoto14], [$objCliente1, $objCliente2], []);

// Registrar ventas
$empresa->registrarVenta("15 de mayo",[11, 12, 13, 14], $objCliente2);
$empresa->registrarVenta("15 de mayo",[13, 14], $objCliente2);
$empresa->registrarVenta("15 de mayo",[14, 2], $objCliente2);

// Informar ventas importadas
$ventasImportadas = $empresa->informarVentasImportadas();
echo "Ventas Importadas:\n";
foreach ($ventasImportadas as $venta) {
    echo $venta->__toString() . "\n";
}

// Informar suma de ventas nacionales
$sumaVentasNacionales = $empresa->informarSumaVentasNacionales();
echo "Suma de Ventas Nacionales: $sumaVentasNacionales\n";

// Mostrar información de la empresa
echo $empresa;
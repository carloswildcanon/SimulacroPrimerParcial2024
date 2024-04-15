<?php
include_once("Cliente.php");
include_once("Moto.php");
include_once("Ventas.php");
include_once("Empresa.php");

$objCliente1=new Cliente("pedro","Garcia",true,"DNI",1234);
$objCliente2=new Cliente("lalo","chopin",true,"DNI",2345);
echo $objCliente1->__toString();
$objMoto1=new Moto(11,2230000,2022,"Benelli Imperiale 400",85,true);
$objMoto2=new Moto(12,584000,2021,"Zanella Zr 150 Ohc",75,true);
$objMoto3=new Moto(13,999900,2023,"Zanella Patagonian Eagle 250",55,false);
echo $objMoto3->__toString();

$objEmpresa=new Empresa("Alta gama", "AV Argenetina 123",[$objCliente1,$objCliente2],[$objMoto1,$objMoto2,$objMoto3],[]);//[$objCliente1.$objCliente2]
echo $objEmpresa->__toString();

echo "--------------PUNTO 5----------------------\n";
$arrayVentas=$objEmpresa->registrarVenta([11,12,13],$objCliente2);

print_r($arrayVentas);
echo "--------------PUNTO 6----------------------\n";
$arrayVentas=$objEmpresa->registrarVenta([0],$objCliente2);
print_r($arrayVentas);
echo "--------------PUNTO 7----------------------\n";
$arrayVentas=$objEmpresa->registrarVenta([2],$objCliente2);
print_r($arrayVentas);
echo "--------------PUNTO 8----------------------\n";
$ventasXClienta=$objEmpresa->retornarVentasXCliente("DNI",1234);
print_r($ventasXClienta);
echo "-------------PUNTO 9-----------------------\n";
$ventasXClienta=$objEmpresa->retornarVentasXCliente("DNI",2345);
print_r($ventasXClienta);
echo "------------PUNTO 10------------------------\n";
echo $objEmpresa->__toString();
?>

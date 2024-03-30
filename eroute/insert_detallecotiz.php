<?php
include '../conneroute.php';

$IdDocumento = $_GET["IdDocumento"];
$Linea  = $_GET["Linea"];
$Cantidad   = $_GET["Cantidad"];
$IdArticulo   = $_GET["IdArticulo"];
$Descripcion    = $_GET["Descripcion"];
$Precio = $_GET["Precio"];
$ITBM   = $_GET["itbm"];
$valor  = $_GET["valor"];
$descuento  = $_GET["descuento"];
$bodega = $_GET["bodega"];
$company    = $_GET["company"];
$sucursal   = $_GET["sucursal"];
$idmecanico = $_GET["idmecanico"];
$fechainicio    = $_GET["fechainicio"];
$fechafin   = $_GET["fechafin"];
$procesada  = $_GET["procesada"];
$cantcajas  = $_GET["cantcajas"];
$cantidadtotal  = $_GET["cantidadtotal"];
$cantxcaja  = $_GET["cantxcaja"];
$ifpromo    = $_GET["ifpromo"];
$idpromo    = $_GET["idpromo"];


$sql = "INSERT INTO cotiz (IdDocumento, Linea, Cantidad,IdArticulo,Descripcion,Precio,ITBM,valor,descuento,bodega,company,sucursal,idmecanico,fechainicio,fechafin,procesada,cantcajas,cantidadtotal,cantxcaja,ifpromo,idpromo)
VALUES ('$IdDocumento', '$Linea', '$Cantidad','$IdArticulo','$Descripcion','$Precio','$ITBM','$valor','$descuento','$bodega','$company','$sucursal','$idmecanico','$fechainicio','$fechainicio','$fechafin','$procesada','$cantcajas','$cantidadtotal','$cantxcaja','$ifpromo','$idpromo')";

if ($db->query($sql) === TRUE) {
    echo "ok";
  } else {
    echo "Error: " . $sql . "<br>" . $db->error;
  }
?>

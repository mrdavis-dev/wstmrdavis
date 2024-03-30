<?php
include '../conneroute.php';

//$IdDocumento = $_GET[""];
$IdCliente = $_GET["IdCliente"];
$Fecha = $_GET["Fecha"];
$ESTADO = $_GET["ESTADO"];
$Subtotal = $_GET["Subtotal"];
$Descuento = $_GET["Descuento"];
$ITBM = $_GET["ITBM"];
$Total = $_GET["Total"];
$Pago = $_GET["Pago"];
$Nombre = $_GET["Nombre"];
$VENDEDOR = $_GET["VENDEDOR"];
$tipo = $_GET["tipo"];
$estado2 = $_GET["estado2"];
$exento = $_GET["exento"];
// $caja = $_GET["caja"];
// $hora = $_GET["hora"];
$bloqueada = $_GET["bloqueada"];
$observacion = $_GET["observacion"];
$company = $_GET["company"];
$sucursal = $_GET["sucursal"];
$docrelacionado = $_GET["docrelacionado"];
$usuario = $_GET["usuario"];

if($IdCliente != ''){
    $sql = "INSERT INTO cotiz (IdDocumento,IdCliente, Fecha,ESTADO,Subtotal,Descuento,ITBM,Total,Pago,Nombre,VENDEDOR,tipo,estado2,exento,company,sucursal)
    VALUES ((SELECT MAX( IdDocumento ) FROM cotiz c) + 1 ,'$IdCliente', '$Fecha', '$ESTADO', '$Subtotal', '$Descuento','$ITBM','$Total','$Pago','$Nombre','$VENDEDOR','$tipo','$estado2','$exento','$company','$sucursal')";

    if ($db->query($sql) === TRUE) {
        echo json_encode('ok');
      } else {
        echo json_encode('Error');
      }
}else{
    echo json_encode("Error");
}



// $IdCliente = $_GET["IdCliente"];
// $Fecha = $_GET["Fecha"];
// $ESTADO = $_GET["ESTADO"];
// $Subtotal = $_GET["Subtotal"];
// $Descuento = $_GET["Descuento"];
// $ITBM = $_GET["ITBM"];
// $Total = $_GET["Total"];
// $Pago = $_GET["Pago"];
// $Nombre = $_GET["Nombre"];
// $VENDEDOR = $_GET["VENDEDOR"];
// $tipo = $_GET["tipo"];
// $estado2 = $_GET["estado2"];
// $exento = $_GET["exento"];
// $caja = $_GET["caja"];
// $hora = $_GET["hora"];
// $bloqueada = $_GET["bloqueada"];
// $observacion = $_GET["observacion"];
// $company = $_GET["company"];
// $sucursal = $_GET["sucursal"];
// $docrelacionado = $_GET["docrelacionado"];
// $usuario = $_GET["usuario"];


// $sql = "INSERT INTO cotiz (IdDocumento,IdCliente, Fecha,ESTADO,Subtotal,Descuento,ITBM,Total,Pago,Nombre,VENDEDOR,tipo,estado2,exento,caja,hora,bloqueada,observacion,company,sucursal,docrelacionado,usuario)
// VALUES ((SELECT MAX( IdDocumento ) FROM cotiz c) + 1 ,'$IdCliente', '$Fecha', '$ESTADO', '$Subtotal', '$Descuento','$ITBM','$Total','$Pago','$Nombre','$VENDEDOR','$tipo','$estado2','$exento','$caja','$hora','$bloqueada','$observacion','$company','$sucursal','$docrelacionado','$usuario')";
?>

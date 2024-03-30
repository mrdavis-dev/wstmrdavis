
<?php 
//facturacion opcion 1
include 'conn.php';

$desde = $_GET["fechadesde"];
$anio = substr($desde,0,4);
$mes = substr($desde,4,2);
$dia = substr($desde,6,2);
$fechadesde = $anio."-".$mes."-".$dia;
$contrato = $_GET["contrato"];
$hasta = $_GET["fechahasta"];
$anio = substr($hasta,0,4);
$mes = substr($hasta,4,2);
$dia = substr($hasta,6,2);
$fechahasta = $anio."-".$mes."-".$dia;
$tipocli = $_GET["tipocli"];
$tipocontrato = substr($tipocli,0,1);

// $sql = "SELECT sum(db)-sum(cr) saldo FROM transacciones WHERE idcontrato = '$contrato' and fecha between '$desde' and '$fechahasta' order by fecha";
$sql = "SELECT
'0' NumDoc, 'S.Inicial' tipotransaccion, DATE_ADD('$desde', INTERVAL -1 DAY) Fecha, FORMAT( IFNULL(sum(IFNULL(db,0)) - sum(IFNULL(cr,0)),2), 2) saldo
FROM
transacciones
WHERE
tipo_cli='$tipocontrato' AND idcontrato='$contrato' AND DATE(fecha) < '$desde'

UNION

SELECT
num_doc NumDoc, tipotransaccion, date(fecha) Fecha, FORMAT(IFNULL(db,0) - IFNULL(cr,0), 2) monto
FROM
transacciones
WHERE
tipo_cli='$tipocontrato' AND idcontrato='$contrato' AND DATE(fecha) BETWEEN '$desde' AND '$fechahasta'

UNION

SELECT
'0' NumDoc, 'SALDO' tipotransaccion, '$fechahasta' Fecha, FORMAT( sum(IFNULL(db,0)) - sum(IFNULL(cr,0)), 2) saldoTotal
FROM
transacciones
WHERE
tipo_cli='$tipocontrato' AND idcontrato='$contrato';";

$result = $db->query($sql);
if ($result->num_rows > 0) {
    $datos = array();
    foreach ($result as $row) {
        $datos[] = $row;
    }
    echo json_encode($datos);
    // while ($row = $result->fetch_assoc()) {
    //     $datos[] = $row;
    //     echo json_encode($datos);
    // }
} else if (empty($idcontrato)) {
    echo json_encode("error");
}
?>
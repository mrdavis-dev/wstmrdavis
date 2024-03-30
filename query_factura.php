<?php
include 'conn.php';

$idcontrato = $_GET["id"];
$tipocontrato = $_GET["tipo"];
$tipocontrato=substr($tipocontrato,0,1);

$sql = "SELECT tipo_cli, sum(db)-sum(cr) saldo FROM transacciones WHERE idcontrato = '$idcontrato' and tipo_cli = '$tipocontrato'";

$result = $db->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $datos = $row['saldo'];
        echo json_encode($datos);
    }
} else if (empty($idcontrato)) {
    echo json_encode("error");
}
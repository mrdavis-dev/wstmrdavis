<?php

include("conn.php");

$nombrecon = $_GET["b"];
$tipocontrato = $_GET["t"];
$tipocontrato = substr($tipocontrato,0,1);


$sql = "SELECT idcontrato, nombre FROM contratos where (tipocliente = '$tipocontrato' and (nombre like '%" . $nombrecon . "%'))";

$result = $db->query($sql);
if ($result->num_rows > 0) {
    $datos = array();
    foreach ($result as $row) {
        $datos[] = $row;
    }
    echo json_encode($datos);
} else if(empty($tipocontrato)){
    echo json_encode('Error');
    // echo '<script>console.log("error")</script>';
}

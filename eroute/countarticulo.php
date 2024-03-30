<?php
header('Content-Type: application/json');
include '../conneroute.php';

$sql = "SELECT count(*) as cuantos FROM articulos";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    $capacidad = mysqli_num_rows($result);
    $datos_articulos = array();

    foreach ($result as $row) {
        $datos_articulos[] = $row;
        }
        //print_r($datos_articulos);
       echo json_encode($datos_articulos);
    }

?>
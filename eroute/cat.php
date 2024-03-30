<?php
header('Content-Type: application/json; charset=utf-8');

include '../conneroute.php';


if(isset($_GET["ini"]) and isset($_GET["final"])){

    $ini = $_GET["ini"];
    $final = $_GET["final"];

$sql = "SELECT * FROM cat order by idCategoria limit $ini,$final";

$result = $db->query($sql);
if ($result->num_rows > 0) {
    $datos_articulos = array();

    foreach ($result as $row) {
        $row = array_map("utf8_encode",$row);
        $datos_articulos[] = $row;

        }
        //print_r($datos_articulos);
       echo json_encode($datos_articulos, 10000);
    }
}

?>
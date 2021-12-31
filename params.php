<?php

include("conn.php");

$res = $db->query("SELECT nombre FROM cobradores");

$datos = array();

foreach ($res as $row){
    $datos[]=$row;
}
echo json_encode($datos);

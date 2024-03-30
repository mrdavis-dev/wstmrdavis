<?php

include('conn.php');

$user = $_GET["user"];
//$user = "admin";

$sql = "SELECT * FROM permisos p
inner join users u 
on p.username = u.username where u.username = '$user' and codmodulo = 'saldomobile'";

$result = $db->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo json_encode($row["permiso_a"]);
    }
} else {
    echo json_encode("no valido");
}
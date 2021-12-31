<?php

include("conn.php");

$user = $_GET['username'];
$pass = $_GET['password'];

$sql = "SELECT username, password FROM users WHERE username = '$user' AND password = '$pass'";
// $sql = "SELECT nombre, apellido FROM cobradores WHERE nombre = '$user' AND apellido = '$pass'";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo json_encode("ok");
        // echo 'ok';
    }
} else {
    echo json_encode('contraseña o usuario incorrecto');
    // echo '<script>console.log("error")</script>';
}

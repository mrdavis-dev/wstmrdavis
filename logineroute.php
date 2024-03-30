<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'conneroute.php';

$user = $_GET['username'];
$pass = $_GET['password'];
$dispositivo = $_GET['uid'];

// $user = "admin";
// $pass = "admin";
// $dispositivo = "123";


$sql = "SELECT ifnull(caja,0) caja from dispositivos WHERE id_dispositivo  = '$dispositivo'";

$result = $db->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $caja = $row['caja'];
        //echo $caja;
        if (empty($caja)) {
            echo json_encode("Pendiente de registro");
        } else {
            $qcaja = "SELECT ifnull(caja,0) cajanum from cajas where caja = '$caja'";
            $resultcaja = $db->query($qcaja);
            if ($resultcaja->num_rows > 0) {
                while ($row = $resultcaja->fetch_assoc()) {

                    $sql = "SELECT * FROM permisos p inner join users u on p.username = u.Usuario where u.Usuario = '$user' and Clave = '$pass'
                    and codmodulo = 'appmovil' and permiso_a = 'si'";
                    $result = $db->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo json_encode("ok, ".$caja.", ".$row["permiso_l"].", ".$row["permiso_e"].", ".$row["permiso_b"].", ".$row["permiso_m"].", ".$row["permiso_a"].", ".$row["permiso_i"]);
                        }
                    } else {
                        echo json_encode('contraseña o usuario incorrecto');
                    }
                }
            }else{
                echo json_encode("Pendiente de registro");
            }
        }
    }
} else {
    $q = "INSERT into dispositivos (id_dispositivo) values ('$dispositivo')";
    if (mysqli_query($db, $q)) {
        echo json_encode("dispositivo agregado");
    } else {
        echo json_encode("Error: " . $sql . "<br>" . mysqli_error($db));
    }
}
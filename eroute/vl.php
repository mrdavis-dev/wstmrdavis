<?php
define('DB_SERVER', 'e-bsp.com');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '37395');
define('DB_DATABASE', 'ebsp_moviles');

$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

//$licencia = $_GET["txtlicencia"];
$codigo = $_GET["txtcodigo"];
$iddevice = $_GET["uid"];

$query = "INSERT INTO devices_ebsp (device, numcli, fecha_reg) VALUES ('$iddevice', '$codigo', now())";
$result = $db->query($query);

if ($result) {
    $qsearch = "SELECT * FROM config_ebsp WHERE num_cli = '$codigo'";
    $result2 = $db->query($qsearch);
    if ($result2->num_rows > 0) {
        $qdevice = "SELECT count(devices_ebsp.numcli) as countdevice, config_ebsp.* FROM devices_ebsp INNER JOIN config_ebsp ON devices_ebsp.numcli = config_ebsp.num_cli
        where devices_ebsp.numcli = '.$codigo.'";

        $rqdevice = $db->query($qdevice);
        if ($rqdevice->num_rows > 0) {
            while ($rowd = $rqdevice->fetch_assoc()) {
                if ($rowd["countdevice"] <= $rowd["max-device"]) {
                    echo json_encode("Error: sl-ebsp");
                } else {
                    echo json_encode("Verificado!");
                }
            }

        }

    }

} else {
    echo json_encode("sin registro");
}
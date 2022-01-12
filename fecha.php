<?php

include 'conn.php';

$sqlfecha = "SELECT NOW() fecha";
$result = $db->query($sqlfecha);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo json_encode($row['fecha']);
        // echo 'ok';
    }
} else {
    echo json_encode('error');
    // echo '<script>console.log("error")</script>';
}

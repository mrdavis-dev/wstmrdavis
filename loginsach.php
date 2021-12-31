<?php
include 'conn.php';

$usuario = $_POST['user'];
$password = $_POST['pass'];
// $options = array("cost" => 4);
// $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);

$consulta = $db->prepare("SELECT * FROM users WHERE username=? AND password=?");
$consulta->bind_param('ss',$usuario,$password);
$consulta->execute();

$result = $consulta->get_result();
if($res = $result->fetch_assoc()){
    echo json_encode($res,JSON_UNESCAPED_UNICODE);
}

$consulta->close();
$db->close();
?>
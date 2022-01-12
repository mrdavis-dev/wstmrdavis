<?php
echo 'ebsp app';
// include("conn.php");

// $usuario = $_POST['user'];
// $password = $_POST['pass'];
// // $options = array("cost" => 4);
// // $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);

// $consulta = $link->prepare("SELECT * FROM users WHERE username=? AND password=?");
// $consulta->bind_param('ss',$usuario,$password);
// $consulta->execute();

// $result = $consulta->get_result();
// if($res = $result->fetch_assoc()){
//     echo json_encode($res,JSON_UNESCAPED_UNICODE);
// }

// $consulta->close();
// $link->close();
// $user = $_GET['username'];
// $pass = $_GET['password'];

// $sql = "SELECT username, password FROM users WHERE username = '$user' AND password = '$pass'";
// // $sql = "SELECT nombre, apellido FROM cobradores WHERE nombre = '$user' AND apellido = '$pass'";
// $result = $db->query($sql);
// if ($result->num_rows > 0) {
//     // output data of each row
//     while ($row = $result->fetch_assoc()) {
//         echo json_encode("ok");
//         // echo 'ok';
//     }
// } else {
//     echo json_encode('contraseña o usuario incorrecto');
//     // echo '<script>console.log("error")</script>';
// }

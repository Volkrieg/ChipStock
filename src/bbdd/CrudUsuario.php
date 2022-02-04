<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba api</title>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $bd = "TiendaBBDD";

    $conexion = new mysqli($servername, $username, $password, $bd);

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['iduser'])) {
            header("HTTP/1.1 200 GET");
            $iduser = $_GET['iduser'];
            $orden = "SELECT * FROM users WHERE iduser=$iduser";
            $res = $conexion->query($orden);
            $res_string = $res->fetch_all();
            echo json_encode($res_string);
        }
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        header("HTTP/1.1 200 POST");
        $user  = $_POST['user'];
        $pass  = PASSWORD_HASH($_POST['contrasena'],PASSWORD_DEFAULT);
        $email  = $_POST['email'];
        $saldo  = $_POST['saldo'];
        $nombre  = $_POST['nombre'];
        $apellido  = $_POST['apellido'];
        $rol  = $_POST['rol'];
        $orden = "INSERT INTO users(user,pass,email,saldo,nombre,apellido,rol) VALUES('$user','$pass','$email',$saldo,'$nombre','$apellido','$rol')";
        $conexion->query($orden);
        echo json_encode($conexion->insert_id);
    } elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        header("HTTP/1.1 200 PUT");
        $iduser = $_GET['iduser'];
        $user  = $_GET['user'];
        $pass  = PASSWORD_HASH($_GET['contrasena'],PASSWORD_DEFAULT);
        $email  = $_GET['email'];
        $saldo  = $_GET['saldo'];
        $nombre  = $_GET['nombre'];
        $apellido  = $_GET['apellido'];
        $rol  = $_GET['rol'];
        $orden = "UPDATE users SET users='$user',pass='$pass',saldo=$saldo,email='$email',nombre='$nombre',apellido='$apellido', rol='$rol' WHERE iduser=$iduser";
        $conexion->query($orden);
        $orden = "SELECT * FROM users WHERE iduser='$iduser'";
        $res = $conexion->query($orden);
        echo json_encode($res->fetch_all());
    } elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        header("HTTP/1.1 200 DELETE");
        $iduser = $_GET['iduser'];
        $orden = "DELETE FROM users WHERE iduser=$iduser";
        $conexion->query($orden);
    } else {
        header("HTTP/1.1 400 INVALID REQUEST");
    }




    ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <form method = 'POST'>
        <label>Usuario:</label>
        <input type = 'text' name = 'user'>
        <label>Contraseña:</label>
        <input type = 'text' name = 'contrasena'>
        <label>Email:</label>
        <input type = 'text' name = 'email'>
        <label>Saldo:</label>
        <input type = 'text' name = 'saldo'>
        <br>
        <label>Nombre:</label>
        <input type = 'text' name = 'nombre'>
        <label>Apellido:</label>
        <input type = 'text' name = 'apellido'>
        <label>Rol:</label>
        <input type = 'text' name = 'rol'>
        <input type = 'submit' value = 'Insertar'>
    </form>
<body>
    <?php

    $url = 'http://localhost/Api/ChipStock/src/bbdd/CrudUsuario.php';
    $user  = $_POST['user'];
    $pass  = $_POST['contrasena'];
    $email  = $_POST['email'];
    $saldo  = $_POST['saldo'];
    $nombre  = $_POST['nombre'];
    $apellido  = $_POST['apellido'];
    $rol  = $_POST['rol'];

    $data = array('user' => $user, 'contrasena' => $pass, 'email' => $email, 'saldo' => $saldo, 'nombre' => $nombre, 'apellido' => $apellido, 'rol' => $rol);

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */
    }

    var_dump($result);

    ?>
</body>

</html>
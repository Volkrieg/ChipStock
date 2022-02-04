<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<h2>Insertar</h2>
<form method='POST'>
    <label>Usuario:</label>
    <input type='text' name='user'>
    <label>Contraseña:</label>
    <input type='password' name='contrasena'>
    <label>Email:</label>
    <input type='email' name='email'>
    <label>Saldo:</label>
    <input type='text' name='saldo'>
    <br>
    <label>Nombre:</label>
    <input type='text' name='nombre'>
    <label>Apellido:</label>
    <input type='text' name='apellido'>
    <label>Rol:</label>
    <input type='text' name='rol'>
    <input type='submit' value='Insertar'>
</form>
<h2>Mostrar</h2>
<form method='POST'>
    <label>Id del usuario:</label>
    <input type='number' name='iduser'>
    <input type='submit' value='Mostrar'>
</form>

<body>

    <?php
    // if (!empty($_POST['user']) && !empty($_POST['contrasena']) && !empty($_POST['saldo']) && !empty($_POST['email']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['rol']))
    //     $url = 'http://localhost/Api/ChipStock/src/bbdd/CrudUsuario.php';
    // $user  = $_POST['user'];
    // $pass  = $_POST['contrasena'];
    // $email  = $_POST['email'];
    // $saldo  = $_POST['saldo'];
    // $nombre  = $_POST['nombre'];
    // $apellido  = $_POST['apellido'];
    // $rol  = $_POST['rol'];

    // $data = array('user' => $user, 'contrasena' => $pass, 'email' => $email, 'saldo' => $saldo, 'nombre' => $nombre, 'apellido' => $apellido, 'rol' => $rol);

    // $options = array(
    //     'http' => array(
    //         'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
    //         'method'  => 'POST',
    //         'content' => http_build_query($data)
    //     )
    // );


    // $context  = stream_context_create($options);
    // $result = file_get_contents($url, false, $context);
    // if ($result === FALSE) {
    //     /* Handle error */
    // }



    function eliminarComillas($cadena)
    {
        $salida = "";
        for ($i = 0; $i < strlen($cadena); $i++) {
            if ($cadena[$i] != '"' && $cadena[$i] != "[" && $cadena[$i] != "]")
                $salida .= $cadena[$i];
        }
        return $salida;
    }

    if (!empty($_POST['iduser']))
        $iduser  = $_POST['iduser'];
    $url = 'http://localhost/Api/ChipStock/src/bbdd/CrudUsuario.php?iduser=' . $iduser;

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'GET',
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    $array = explode(',', $result);


    $user = eliminarComillas($array[2]);
    $email = eliminarComillas($array[4]);
    $name = eliminarComillas($array[5]);
    $surname = eliminarComillas($array[6]);
    $role = eliminarComillas($array[7]);
    $balance = eliminarComillas($array[8]);


    echo "Usuario: " . $user . " Email: " . $email . " Nombre: " . $name . " " . $surname . " Rol: " . $role . " Saldo: " . $balance;
    ?>
</body>

</html>
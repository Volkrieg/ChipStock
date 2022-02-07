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
<h2>Actualizar</h2>
<form method='POST'>
    <label>Id usuario:</label>
    <input type='text' name='iduserUPD'>
    <label>Usuario:</label>
    <input type='text' name='userUPD'>
    <label>Contraseña:</label>
    <input type='password' name='contrasenaUPD'>
    <label>Email:</label>
    <input type='email' name='emailUPD'>
    <label>Saldo:</label>
    <input type='text' name='saldoUPD'>
    <br>
    <label>Nombre:</label>
    <input type='text' name='nombreUPD'>
    <label>Apellido:</label>
    <input type='text' name='apellidoUPD'>
    <label>Rol:</label>
    <input type='text' name='rolUPD'>
    <input type='submit' value='Actualizar campos'>
</form>

<body>

    <?php


    function eliminarComillas($cadena)
    {
        $salida = "";
        for ($i = 0; $i < strlen($cadena); $i++) {
            if ($cadena[$i] != '"' && $cadena[$i] != "[" && $cadena[$i] != "]")
                $salida .= $cadena[$i];
        }
        return $salida;
    }

    function insertarUsuario()
    {


        if (!empty($_POST['user']) && !empty($_POST['contrasena']) && !empty($_POST['saldo']) && !empty($_POST['email']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['rol']))
            $url = 'http://localhost/GIT/ChipStock/src/bbdd/CrudUsuario.php';
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
        if ($result === FALSE) {
            /* Handle error */
        }
    }
    function mostrarUsuario()
    {

        if (!empty($_POST['iduser']))
            $iduser  = $_POST['iduser'];
        $url = 'http://localhost/GIT/ChipStock/src/bbdd/CrudUsuario.php?iduser=' . $iduser;

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
    }

    function actualizarUsuario()
    {

        if (!empty($_POST['iduserUPD']) && !empty($_POST['userUPD']) && !empty($_POST['contrasenaUPD']) && !empty($_POST['saldoUPD']) && !empty($_POST['emailUPD']) && !empty($_POST['nombreUPD']) && !empty($_POST['apellidoUPD']) && !empty($_POST['rolUPD']))

        $iduser = $_POST['iduserUPD'];
        $user  = $_POST['userUPD'];
        $pass  = $_POST['contrasenaUPD'];
        $email  = $_POST['emailUPD'];
        $saldo  = $_POST['saldoUPD'];
        $nombre  = $_POST['nombreUPD'];
        $apellido  = $_POST['apellidoUPD'];
        $rol  = $_POST['rolUPD'];
        $url = 'http://localhost/GIT/ChipStock/src/bbdd/CrudUsuario.php';
        $data = array('iduser' => $iduser, 'user' => $user, 'contrasena' => $pass, 'email' => $email, 'saldo' => $saldo, 'nombre' => $nombre, 'apellido' => $apellido, 'rol' => $rol);


        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'PUT',
                'content' => $data
            )
        );


        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) {
            /* Handle error */
        }
    }

    actualizarUsuario();
    ?>
</body>

</html>
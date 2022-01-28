<?php ob_start(); ?>

<?php

error_reporting(0);

session_start();

// Obtengo los datos cargados en el formulario de login.
$user = $_POST['user'];
$passw = $_POST['pass'];

// Datos para conectar a la base de datos.
$servername = "localhost";
$username = "root";
$password = "";
$bbdd = "TiendaBBDD";

// Crear conexión con la base de datos.
$conexion = new mysqli($servername, $username, $password, $bbdd);

$sql = "SELECT pass FROM users WHERE user = '$user'";

$orden = $conexion->query($sql);

//Se realiza un fetch para comprobar la contraseña

while ($columna = $orden->fetch_assoc()) {

    if (!empty($_POST['pass'])) {

        if (password_verify($_POST['pass'], $columna['pass'])) {

            $_SESSION['user'] = $_POST['user'];

            if (isset($_SESSION['user'])) {
                header("location:http://localhost/workspace-ES/Chipstock/index.html");
                ob_end_flush();
            }
        } else {
            echo "Contraseña incorrecta";
        }
    }
}
?>
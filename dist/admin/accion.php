<?php
// incluimos la conexión a MySQL

include_once('dbcon.php');

// variables para insertar datos a mysqli
$usuario = strip_tags(trim($_POST["usuario"]));
$usuario = str_replace(array("\r", "\n"), array(" ", " "), $usuario);
$rol = filter_var(trim($_POST["rol"]), FILTER_SANITIZE_STRING);
$saldo = filter_var(trim($_POST["saldo"]), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
$nombre = filter_var(trim($_POST["nombre"]), FILTER_SANITIZE_STRING);
$apellido = filter_var(trim($_POST["apellido"]), FILTER_SANITIZE_STRING);
$pass = trim(md5($_POST['pass']));

$query = "INSERT INTO users (usuario, rol, saldo, email, nombre, apellido, pass) 
VALUES('$usuario', '$rol','$saldo' '$email', '$nombre', '$apellido', '$pass')";

if ($con->query($query)) {
    return true;
} else {
    return false;
}

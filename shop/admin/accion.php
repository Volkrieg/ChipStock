<?php
// incluimos la conexión a MySQL

include_once('dbcon.php');

// variables para insertar datos a mysqli
$usuario = strip_tags(trim($_POST["usuario"]));
$usuario = str_replace(array("\r", "\n"), array(" ", " "), $usuario);
$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
$rol = filter_var(trim($_POST["rol"]), FILTER_SANITIZE_STRING);
$saldo = filter_var(trim($_POST["saldo"]), FILTER_SANITIZE_NUMBER_INT);
$password = trim(md5($_POST['password']));

$query = "INSERT INTO users (user, email, rol, saldo, pass) 
	VALUES('$usuario', '$email', '$rol', '$saldo', '$password')";
echo $query;
if ($con->query($query)) {
    return true;
} else {
    return false;
}
